<?php

namespace App\Http\Controllers;

/**
 * @OA\Info(
 *     title="Bilkis E-commerce API",
 *     version="1.0.0",
 *     description="Comprehensive API documentation for Bilkis e-commerce platform. This API provides complete functionality for managing an online store including user authentication, product catalog, shopping cart, order processing, and address management.",
 *     @OA\Contact(
 *         email="bilqisshally@gmail.com",
 *         name="Bilkis Development Team"
 *     ),
 *     @OA\License(
 *         name="MIT",
 *         url="https://opensource.org/licenses/MIT"
 *     )
 * )
 * 
 * @OA\Server(
 *     url="http://localhost:8000",
 *     description="Local development server"
 * )
 * 
 * @OA\Server(
 *     url="https://api.bilkis.com",
 *     description="Production server"
 * )
 * 
 * @OA\SecurityScheme(
 *     securityScheme="sanctum",
 *     type="http",
 *     scheme="bearer",
 *     bearerFormat="token",
 *     description="Laravel Sanctum token authentication. Include the token in the Authorization header as 'Bearer {token}'"
 * )
 * 
 * @OA\Tag(
 *     name="Authentication",
 *     description="User registration, login, logout, and token management"
 * )
 * 
 * @OA\Tag(
 *     name="Categories",
 *     description="Product category CRUD operations. Categories organize products and support hierarchical structure."
 * )
 * 
 * @OA\Tag(
 *     name="Products", 
 *     description="Product catalog management including search, filtering, and detailed product information"
 * )
 * 
 * @OA\Tag(
 *     name="Shopping Cart",
 *     description="Shopping cart functionality including add/remove items, quantity management, and cart operations"
 * )
 * 
 * @OA\Tag(
 *     name="Orders",
 *     description="Order management system covering order creation, status tracking, and order history"
 * )
 * 
 * @OA\Tag(
 *     name="Order Details",
 *     description="Order line items management and order analytics"
 * )
 * 
 * @OA\Tag(
 *     name="User Addresses",
 *     description="User shipping address management including default address selection"
 * )
 * 
 * @OA\Tag(
 *     name="User Management",
 *     description="User profile and account management operations"
 * )
 */
class SwaggerController extends Controller
{
    // This controller is only for OpenAPI documentation annotations
}