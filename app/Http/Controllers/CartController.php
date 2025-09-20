<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Http\Resources\CartResource;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CartController extends Controller
{
    use ApiResponse;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $perPage = $request->get('per_page', 15);
        $user = $request->user();

        // Only show cart items for the authenticated user
        $carts = Cart::with(['product.category'])
            ->where('user_id', $user->id)
            ->paginate($perPage);

        $resource = CartResource::collection($carts);

        return $this->paginatedResponse($resource, 'Cart items retrieved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCartRequest $request): JsonResponse
    {
        $validated = $request->validated();
        $user = $request->user();

        // Ensure we use the authenticated user's ID, not from request
        $validated['user_id'] = $user->id;

        // Check if the product is already in the user's cart
        $existingCart = Cart::where('user_id', $user->id)
            ->where('product_id', $validated['product_id'])
            ->first();

        if ($existingCart) {
            // Update quantity instead of creating new record
            $existingCart->increment('quantity', $validated['quantity']);
            $existingCart->load(['product.category']);

            return $this->successResponse(
                new CartResource($existingCart),
                'Product quantity updated in cart.',
                Response::HTTP_OK
            );
        }

        $cart = Cart::create($validated);
        $cart->load(['product.category']);

        return $this->successResponse(
            new CartResource($cart),
            'Product added to cart successfully.',
            Response::HTTP_CREATED
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart): JsonResponse
    {
        $cart->load(['user', 'product.category']);

        return $this->successResponse(
            new CartResource($cart),
            'Cart item retrieved successfully.'
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCartRequest $request, Cart $cart): JsonResponse
    {
        $validated = $request->validated();
        $cart->update($validated);
        $cart->load(['user', 'product.category']);

        return $this->successResponse(
            new CartResource($cart),
            'Cart item updated successfully.'
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart): JsonResponse
    {
        $cart->delete();

        return $this->successResponse(
            null,
            'Cart item removed successfully.'
        );
    }

    /**
     * Get cart items for a specific user.
     * @uses \App\Http\Middleware\AuthCookie
     */
    public function getUserCart(Request $request): JsonResponse
    {
        $user = $request->user();

        $carts = Cart::where('user_id', $user->id)
            ->with(['product.category'])
            ->get();

        $resource = CartResource::collection($carts);
        $totalItems = $carts->sum('quantity');
        $totalPrice = $carts->sum(function ($cart) {
            return $cart->quantity * $cart->product->price;
        });

        return $this->successResponse([
            'items' => $resource,
            'summary' => [
                'total_items' => $totalItems,
                'total_price' => $totalPrice,
                'items_count' => $carts->count()
            ]
        ], 'User cart retrieved successfully.');
    }

    /**
     * Clear all cart items for a user.
     * @uses \App\Http\Middleware\AuthCookie
     */
    public function clearUserCart(Request $request): JsonResponse
    {
        $user = $request->user();

        $deletedCount = Cart::where('user_id', $user->id)->delete();

        return $this->successResponse(
            ['deleted_items' => $deletedCount],
            'Cart cleared successfully.'
        );
    }
}
