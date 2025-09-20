<?php

namespace App\Http\Controllers;

/**
 * @OA\Schema(
 *     schema="User",
 *     type="object",
 *     title="User",
 *     description="User model",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         description="User ID",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         description="User's full name",
 *         example="John Doe"
 *     ),
 *     @OA\Property(
 *         property="email",
 *         type="string",
 *         format="email",
 *         description="User's email address",
 *         example="john@example.com"
 *     ),
 *     @OA\Property(
 *         property="roles",
 *         type="string",
 *         nullable=true,
 *         description="User roles",
 *         example="customer"
 *     ),
 *     @OA\Property(
 *         property="email_verified_at",
 *         type="string",
 *         format="date-time",
 *         nullable=true,
 *         description="Email verification timestamp",
 *         example="2025-09-19T10:00:00.000000Z"
 *     ),
 *     @OA\Property(
 *         property="created_at",
 *         type="string",
 *         format="date-time",
 *         description="Creation timestamp",
 *         example="2025-09-19T10:00:00.000000Z"
 *     ),
 *     @OA\Property(
 *         property="updated_at",
 *         type="string",
 *         format="date-time",
 *         description="Last update timestamp",
 *         example="2025-09-19T10:00:00.000000Z"
 *     )
 * )
 * 
 * @OA\Schema(
 *     schema="Category",
 *     type="object",
 *     title="Category",
 *     description="Product category model",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         description="Category ID",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         description="Category name",
 *         example="Electronics"
 *     ),
 *     @OA\Property(
 *         property="slug",
 *         type="string",
 *         description="Category slug (auto-generated)",
 *         example="electronics"
 *     ),
 *     @OA\Property(
 *         property="products_count",
 *         type="integer",
 *         description="Number of products in this category (when loaded)",
 *         example=25
 *     ),
 *     @OA\Property(
 *         property="created_at",
 *         type="string",
 *         format="date-time",
 *         description="Creation timestamp",
 *         example="2025-09-19T10:00:00.000000Z"
 *     ),
 *     @OA\Property(
 *         property="updated_at",
 *         type="string",
 *         format="date-time",
 *         description="Last update timestamp",
 *         example="2025-09-19T10:00:00.000000Z"
 *     )
 * )
 * 
 * @OA\Schema(
 *     schema="Product",
 *     type="object",
 *     title="Product",
 *     description="Product model",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         description="Product ID",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         description="Product name",
 *         example="iPhone 15"
 *     ),
 *     @OA\Property(
 *         property="slug",
 *         type="string",
 *         description="Product slug (auto-generated)",
 *         example="iphone-15"
 *     ),
 *     @OA\Property(
 *         property="description",
 *         type="string",
 *         nullable=true,
 *         description="Product description",
 *         example="Latest iPhone model with advanced features"
 *     ),
 *     @OA\Property(
 *         property="image_url",
 *         type="string",
 *         nullable=true,
 *         description="Product image URL",
 *         example="https://example.com/images/iphone15.jpg"
 *     ),
 *     @OA\Property(
 *         property="price",
 *         type="number",
 *         format="float",
 *         description="Product price",
 *         example=999.99
 *     ),
 *     @OA\Property(
 *         property="category_id",
 *         type="integer",
 *         description="Category ID this product belongs to",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="created_at",
 *         type="string",
 *         format="date-time",
 *         description="Creation timestamp",
 *         example="2025-09-19T10:00:00.000000Z"
 *     ),
 *     @OA\Property(
 *         property="updated_at",
 *         type="string",
 *         format="date-time",
 *         description="Last update timestamp",
 *         example="2025-09-19T10:00:00.000000Z"
 *     ),
 *     @OA\Property(
 *         property="category",
 *         ref="#/components/schemas/Category",
 *         description="Category relationship (when loaded)"
 *     )
 * )
 * 
 * @OA\Schema(
 *     schema="Cart",
 *     type="object", 
 *     title="Cart",
 *     description="Shopping cart item model",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         description="Cart item ID",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="user_id",
 *         type="integer",
 *         description="User ID who owns this cart item",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="product_id",
 *         type="integer",
 *         description="Product ID in the cart",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="quantity",
 *         type="integer",
 *         description="Quantity of the product",
 *         example=2
 *     ),
 *     @OA\Property(
 *         property="created_at",
 *         type="string",
 *         format="date-time",
 *         description="Creation timestamp",
 *         example="2025-09-19T10:00:00.000000Z"
 *     ),
 *     @OA\Property(
 *         property="updated_at",
 *         type="string",
 *         format="date-time",
 *         description="Last update timestamp",
 *         example="2025-09-19T10:00:00.000000Z"
 *     ),
 *     @OA\Property(
 *         property="product",
 *         ref="#/components/schemas/Product",
 *         description="Product relationship (when loaded)"
 *     ),
 *     @OA\Property(
 *         property="user",
 *         ref="#/components/schemas/User",
 *         description="User relationship (when loaded)"
 *     )
 * )
 * 
 * @OA\Schema(
 *     schema="Order",
 *     type="object",
 *     title="Order", 
 *     description="Customer order model",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         description="Order ID",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="user_id",
 *         type="integer",
 *         description="User ID who placed the order",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="shipping_address_id",
 *         type="integer",
 *         nullable=true,
 *         description="Shipping address ID",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="total_price",
 *         type="number",
 *         format="float",
 *         description="Total order amount",
 *         example=1999.98
 *     ),
 *     @OA\Property(
 *         property="payment_proof",
 *         type="string",
 *         nullable=true,
 *         description="Payment proof file path or URL",
 *         example="/uploads/payment_proof_123.jpg"
 *     ),
 *     @OA\Property(
 *         property="status",
 *         type="string",
 *         enum={"pending", "processing", "shipped", "delivered", "cancelled"},
 *         description="Order status",
 *         example="pending"
 *     ),
 *     @OA\Property(
 *         property="created_at",
 *         type="string",
 *         format="date-time",
 *         description="Creation timestamp",
 *         example="2025-09-19T10:00:00.000000Z"
 *     ),
 *     @OA\Property(
 *         property="updated_at",
 *         type="string",
 *         format="date-time",
 *         description="Last update timestamp",
 *         example="2025-09-19T10:00:00.000000Z"
 *     ),
 *     @OA\Property(
 *         property="user",
 *         ref="#/components/schemas/User",
 *         description="User relationship (when loaded)"
 *     ),
 *     @OA\Property(
 *         property="shippingAddress",
 *         ref="#/components/schemas/UserAddress",
 *         description="Shipping address relationship (when loaded)"
 *     ),
 *     @OA\Property(
 *         property="orderDetails",
 *         type="array",
 *         @OA\Items(ref="#/components/schemas/OrderDetail"),
 *         description="Order details relationship (when loaded)"
 *     )
 * )
 * 
 * @OA\Schema(
 *     schema="OrderDetail",
 *     type="object",
 *     title="OrderDetail",
 *     description="Order line item model",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         description="Order detail ID",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="order_id",
 *         type="integer",
 *         description="Order ID this detail belongs to",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="product_id",
 *         type="integer",
 *         description="Product ID in the order",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="quantity",
 *         type="integer",
 *         description="Quantity ordered",
 *         example=2
 *     ),
 *     @OA\Property(
 *         property="price",
 *         type="number",
 *         format="float",
 *         description="Price per unit at time of order",
 *         example=999.99
 *     ),
 *     @OA\Property(
 *         property="created_at",
 *         type="string",
 *         format="date-time",
 *         description="Creation timestamp",
 *         example="2025-09-19T10:00:00.000000Z"
 *     ),
 *     @OA\Property(
 *         property="updated_at",
 *         type="string",
 *         format="date-time",
 *         description="Last update timestamp",
 *         example="2025-09-19T10:00:00.000000Z"
 *     ),
 *     @OA\Property(
 *         property="product",
 *         ref="#/components/schemas/Product",
 *         description="Product relationship (when loaded)"
 *     ),
 *     @OA\Property(
 *         property="order",
 *         ref="#/components/schemas/Order",
 *         description="Order relationship (when loaded)"
 *     )
 * )
 * 
 * @OA\Schema(
 *     schema="UserAddress",
 *     type="object",
 *     title="UserAddress",
 *     description="User shipping address model",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         description="Address ID",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="user_id",
 *         type="integer",
 *         description="User ID this address belongs to",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="label",
 *         type="string",
 *         description="Address label/name",
 *         example="Home"
 *     ),
 *     @OA\Property(
 *         property="recipient_name",
 *         type="string",
 *         description="Name of the recipient",
 *         example="John Doe"
 *     ),
 *     @OA\Property(
 *         property="phone",
 *         type="string",
 *         description="Phone number for delivery",
 *         example="+1234567890"
 *     ),
 *     @OA\Property(
 *         property="address_line_1",
 *         type="string",
 *         description="Primary address line",
 *         example="123 Main Street"
 *     ),
 *     @OA\Property(
 *         property="address_line_2",
 *         type="string",
 *         nullable=true,
 *         description="Secondary address line",
 *         example="Apartment 4B"
 *     ),
 *     @OA\Property(
 *         property="city",
 *         type="string",
 *         description="City name",
 *         example="New York"
 *     ),
 *     @OA\Property(
 *         property="state",
 *         type="string",
 *         description="State/Province",
 *         example="NY"
 *     ),
 *     @OA\Property(
 *         property="postal_code",
 *         type="string",
 *         description="Postal/ZIP code",
 *         example="10001"
 *     ),
 *     @OA\Property(
 *         property="country",
 *         type="string",
 *         description="Country name",
 *         example="USA"
 *     ),
 *     @OA\Property(
 *         property="is_default",
 *         type="boolean",
 *         description="Whether this is the default address",
 *         example=true
 *     ),
 *     @OA\Property(
 *         property="created_at",
 *         type="string",
 *         format="date-time",
 *         description="Creation timestamp",
 *         example="2025-09-19T10:00:00.000000Z"
 *     ),
 *     @OA\Property(
 *         property="updated_at",
 *         type="string",
 *         format="date-time",
 *         description="Last update timestamp",
 *         example="2025-09-19T10:00:00.000000Z"
 *     ),
 *     @OA\Property(
 *         property="user",
 *         ref="#/components/schemas/User",
 *         description="User relationship (when loaded)"
 *     )
 * )
 * 
 * @OA\Schema(
 *     schema="ValidationError",
 *     type="object",
 *     title="ValidationError",
 *     description="Validation error response",
 *     @OA\Property(
 *         property="code",
 *         type="integer",
 *         description="HTTP status code",
 *         example=422
 *     ),
 *     @OA\Property(
 *         property="status",
 *         type="string",
 *         description="Response status",
 *         example="error"
 *     ),
 *     @OA\Property(
 *         property="message",
 *         type="string",
 *         description="Error message",
 *         example="The given data was invalid."
 *     ),
 *     @OA\Property(
 *         property="errors",
 *         type="object",
 *         description="Validation errors by field",
 *         additionalProperties={
 *             "type": "array",
 *             "items": {"type": "string"}
 *         },
 *         example={"name": {"The name field is required."}}
 *     )
 * )
 * 
 * @OA\Schema(
 *     schema="ErrorResponse",
 *     type="object",
 *     title="ErrorResponse", 
 *     description="General error response",
 *     @OA\Property(
 *         property="code",
 *         type="integer",
 *         description="HTTP status code",
 *         example=404
 *     ),
 *     @OA\Property(
 *         property="status",
 *         type="string",
 *         description="Response status",
 *         example="error"
 *     ),
 *     @OA\Property(
 *         property="message",
 *         type="string",
 *         description="Error message",
 *         example="Resource not found"
 *     )
 * )
 * 
 * @OA\Schema(
 *     schema="SuccessResponse",
 *     type="object",
 *     title="SuccessResponse",
 *     description="Standard success response",
 *     @OA\Property(
 *         property="code",
 *         type="integer",
 *         description="HTTP status code",
 *         example=200
 *     ),
 *     @OA\Property(
 *         property="status",
 *         type="string",
 *         description="Response status",
 *         example="success"
 *     ),
 *     @OA\Property(
 *         property="message",
 *         type="string",
 *         description="Success message",
 *         example="Operation completed successfully"
 *     ),
 *     @OA\Property(
 *         property="data",
 *         description="Response data (varies by endpoint)"
 *     )
 * )
 * 
 * @OA\Schema(
 *     schema="PaginatedResponse",
 *     type="object",
 *     title="PaginatedResponse",
 *     description="Paginated response wrapper",
 *     @OA\Property(
 *         property="code",
 *         type="integer",
 *         description="HTTP status code",
 *         example=200
 *     ),
 *     @OA\Property(
 *         property="status",
 *         type="string",
 *         description="Response status",
 *         example="success"
 *     ),
 *     @OA\Property(
 *         property="message",
 *         type="string",
 *         description="Success message",
 *         example="Data retrieved successfully"
 *     ),
 *     @OA\Property(
 *         property="data",
 *         type="object",
 *         description="Paginated data",
 *         @OA\Property(
 *             property="data",
 *             type="array",
 *             description="Array of data items",
 *             @OA\Items(type="object")
 *         ),
 *         @OA\Property(
 *             property="current_page",
 *             type="integer",
 *             description="Current page number",
 *             example=1
 *         ),
 *         @OA\Property(
 *             property="last_page",
 *             type="integer",
 *             description="Last page number",
 *             example=5
 *         ),
 *         @OA\Property(
 *             property="per_page",
 *             type="integer",
 *             description="Items per page",
 *             example=15
 *         ),
 *         @OA\Property(
 *             property="total",
 *             type="integer",
 *             description="Total number of items",
 *             example=75
 *         ),
 *         @OA\Property(
 *             property="from",
 *             type="integer",
 *             description="Starting item number",
 *             example=1
 *         ),
 *         @OA\Property(
 *             property="to",
 *             type="integer",
 *             description="Ending item number",
 *             example=15
 *         )
 *     )
 * )
 */
class SchemaController extends Controller
{
    // This controller is only for OpenAPI schema definitions
}