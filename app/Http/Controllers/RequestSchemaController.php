<?php

namespace App\Http\Controllers;

/**
 * @OA\Schema(
 *     schema="CreateCategoryRequest",
 *     type="object",
 *     title="Create Category Request",
 *     description="Request body for creating a new category",
 *     required={"name"},
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         description="Category name (unique)",
 *         example="Electronics",
 *         maxLength=255
 *     )
 * )
 * 
 * @OA\Schema(
 *     schema="UpdateCategoryRequest",
 *     type="object",
 *     title="Update Category Request",
 *     description="Request body for updating a category",
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         description="Category name (unique)",
 *         example="Consumer Electronics",
 *         maxLength=255
 *     )
 * )
 * 
 * @OA\Schema(
 *     schema="CreateProductRequest",
 *     type="object",
 *     title="Create Product Request",
 *     description="Request body for creating a new product",
 *     required={"name", "price", "category_id"},
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         description="Product name",
 *         example="iPhone 15 Pro",
 *         maxLength=255
 *     ),
 *     @OA\Property(
 *         property="description",
 *         type="string",
 *         nullable=true,
 *         description="Product description",
 *         example="Latest iPhone with pro features and advanced camera system"
 *     ),
 *     @OA\Property(
 *         property="image_url",
 *         type="string",
 *         nullable=true,
 *         description="Product image URL",
 *         example="https://example.com/images/iphone15pro.jpg"
 *     ),
 *     @OA\Property(
 *         property="price",
 *         type="number",
 *         format="float",
 *         description="Product price",
 *         example=1199.99,
 *         minimum=0
 *     ),
 *     @OA\Property(
 *         property="category_id",
 *         type="integer",
 *         description="Category ID this product belongs to",
 *         example=1
 *     )
 * )
 * 
 * @OA\Schema(
 *     schema="UpdateProductRequest",
 *     type="object",
 *     title="Update Product Request",
 *     description="Request body for updating a product",
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         description="Product name",
 *         example="iPhone 15 Pro Max",
 *         maxLength=255
 *     ),
 *     @OA\Property(
 *         property="description",
 *         type="string",
 *         nullable=true,
 *         description="Product description"
 *     ),
 *     @OA\Property(
 *         property="image_url",
 *         type="string",
 *         nullable=true,
 *         description="Product image URL"
 *     ),
 *     @OA\Property(
 *         property="price",
 *         type="number",
 *         format="float",
 *         description="Product price",
 *         minimum=0
 *     ),
 *     @OA\Property(
 *         property="category_id",
 *         type="integer",
 *         description="Category ID this product belongs to"
 *     )
 * )
 * 
 * @OA\Schema(
 *     schema="AddToCartRequest",
 *     type="object",
 *     title="Add to Cart Request",
 *     description="Request body for adding items to cart",
 *     required={"product_id", "quantity"},
 *     @OA\Property(
 *         property="product_id",
 *         type="integer",
 *         description="Product ID to add to cart",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="quantity",
 *         type="integer",
 *         description="Quantity to add",
 *         example=2,
 *         minimum=1,
 *         maximum=999
 *     )
 * )
 * 
 * @OA\Schema(
 *     schema="UpdateCartRequest",
 *     type="object",
 *     title="Update Cart Request",
 *     description="Request body for updating cart item quantity",
 *     @OA\Property(
 *         property="quantity",
 *         type="integer",
 *         description="New quantity",
 *         example=3,
 *         minimum=1,
 *         maximum=999
 *     )
 * )
 * 
 * @OA\Schema(
 *     schema="CreateOrderRequest",
 *     type="object",
 *     title="Create Order Request",
 *     description="Request body for creating a new order",
 *     @OA\Property(
 *         property="shipping_address_id",
 *         type="integer",
 *         nullable=true,
 *         description="Shipping address ID",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="payment_proof",
 *         type="string",
 *         nullable=true,
 *         description="Payment proof file path or URL",
 *         example="/uploads/payment_proof_123.jpg"
 *     )
 * )
 * 
 * @OA\Schema(
 *     schema="UpdateOrderRequest",
 *     type="object",
 *     title="Update Order Request",
 *     description="Request body for updating an order",
 *     @OA\Property(
 *         property="shipping_address_id",
 *         type="integer",
 *         nullable=true,
 *         description="Shipping address ID"
 *     ),
 *     @OA\Property(
 *         property="payment_proof",
 *         type="string",
 *         nullable=true,
 *         description="Payment proof file path or URL"
 *     ),
 *     @OA\Property(
 *         property="status",
 *         type="string",
 *         enum={"pending", "processing", "shipped", "delivered", "cancelled"},
 *         description="Order status"
 *     )
 * )
 * 
 * @OA\Schema(
 *     schema="CreateUserAddressRequest",
 *     type="object",
 *     title="Create User Address Request",
 *     description="Request body for creating a new user address",
 *     required={"label", "recipient_name", "phone", "address_line_1", "city", "state", "postal_code", "country"},
 *     @OA\Property(
 *         property="label",
 *         type="string",
 *         description="Address label/name",
 *         example="Home",
 *         maxLength=255
 *     ),
 *     @OA\Property(
 *         property="recipient_name",
 *         type="string",
 *         description="Name of the recipient",
 *         example="John Doe",
 *         maxLength=255
 *     ),
 *     @OA\Property(
 *         property="phone",
 *         type="string",
 *         description="Phone number for delivery",
 *         example="+1234567890",
 *         maxLength=20
 *     ),
 *     @OA\Property(
 *         property="address_line_1",
 *         type="string",
 *         description="Primary address line",
 *         example="123 Main Street",
 *         maxLength=255
 *     ),
 *     @OA\Property(
 *         property="address_line_2",
 *         type="string",
 *         nullable=true,
 *         description="Secondary address line",
 *         example="Apartment 4B",
 *         maxLength=255
 *     ),
 *     @OA\Property(
 *         property="city",
 *         type="string",
 *         description="City name",
 *         example="New York",
 *         maxLength=100
 *     ),
 *     @OA\Property(
 *         property="state",
 *         type="string",
 *         description="State/Province",
 *         example="NY",
 *         maxLength=100
 *     ),
 *     @OA\Property(
 *         property="postal_code",
 *         type="string",
 *         description="Postal/ZIP code",
 *         example="10001",
 *         maxLength=20
 *     ),
 *     @OA\Property(
 *         property="country",
 *         type="string",
 *         description="Country name",
 *         example="USA",
 *         maxLength=100
 *     ),
 *     @OA\Property(
 *         property="is_default",
 *         type="boolean",
 *         description="Whether this should be the default address",
 *         example=false
 *     )
 * )
 * 
 * @OA\Schema(
 *     schema="UpdateUserAddressRequest",
 *     type="object",
 *     title="Update User Address Request",
 *     description="Request body for updating a user address",
 *     @OA\Property(
 *         property="label",
 *         type="string",
 *         description="Address label/name",
 *         maxLength=255
 *     ),
 *     @OA\Property(
 *         property="recipient_name",
 *         type="string",
 *         description="Name of the recipient",
 *         maxLength=255
 *     ),
 *     @OA\Property(
 *         property="phone",
 *         type="string",
 *         description="Phone number for delivery",
 *         maxLength=20
 *     ),
 *     @OA\Property(
 *         property="address_line_1",
 *         type="string",
 *         description="Primary address line",
 *         maxLength=255
 *     ),
 *     @OA\Property(
 *         property="address_line_2",
 *         type="string",
 *         nullable=true,
 *         description="Secondary address line",
 *         maxLength=255
 *     ),
 *     @OA\Property(
 *         property="city",
 *         type="string",
 *         description="City name",
 *         maxLength=100
 *     ),
 *     @OA\Property(
 *         property="state",
 *         type="string",
 *         description="State/Province",
 *         maxLength=100
 *     ),
 *     @OA\Property(
 *         property="postal_code",
 *         type="string",
 *         description="Postal/ZIP code",
 *         maxLength=20
 *     ),
 *     @OA\Property(
 *         property="country",
 *         type="string",
 *         description="Country name",
 *         maxLength=100
 *     ),
 *     @OA\Property(
 *         property="is_default",
 *         type="boolean",
 *         description="Whether this should be the default address"
 *     )
 * )
 */
class RequestSchemaController extends Controller
{
    // This controller is only for OpenAPI request schema definitions
}