<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    use ApiResponse;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $perPage = $request->get('per_page', 15);
        $search = $request->get('search');
        $categoryId = $request->get('category_id');

        $query = Product::with('category');

        // Apply search filter
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Apply category filter
        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        $products = $query->paginate($perPage);
        $resource = ProductResource::collection($products);

        return $this->paginatedResponse($resource, 'Products retrieved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request): JsonResponse
    {
        $validated = $request->validated();
        $product = Product::create($validated);
        $product->load('category');

        return $this->successResponse(
            new ProductResource($product),
            'Product created successfully.',
            Response::HTTP_CREATED
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product): JsonResponse
    {
        $product->load('category');

        return $this->successResponse(
            new ProductResource($product),
            'Product retrieved successfully.'
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product): JsonResponse
    {
        $validated = $request->validated();
        $product->update($validated);
        $product->load('category');

        return $this->successResponse(
            new ProductResource($product),
            'Product updated successfully.'
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): JsonResponse
    {
        // Check if product is in any carts or orders
        if ($product->cartItems()->exists() || $product->orderDetails()->exists()) {
            return $this->errorResponse(
                'Cannot delete product that is in carts or orders.',
                Response::HTTP_CONFLICT
            );
        }

        $product->delete();

        return $this->successResponse(
            null,
            'Product deleted successfully.'
        );
    }
}