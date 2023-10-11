<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Product;
use App\Models\User;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
//use Illuminate\Foundation\Auth\User;

class ProductControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    // public function test_example(): void
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    protected function setUp(): void
    {
        parent::setUp();
    
        // Retrieve the user from the database by their email
        $user = User::where('email', 'admin@gmail.com')->first();
    
        // Log in as the retrieved user
        $this->actingAs($user);
    }
    

    //use RefreshDatabase;

    public function testStoreFunctionCreatesProductForApiRequest()
    {
        $user = User::where('email', 'admin@gmail.com')->first();

    // Ensure the admin user is logged in
        $this->actingAs($user);

        $image = UploadedFile::fake()->image('test.jpg');

        
        $response = $this->postJson('/product_add', [
            '_token' => csrf_token(),
            'product_id' => '1',
            'supplier_id' => '1',
            'product_name' => 'Test product',
            'category' => 'Active wear',
            'price' => '500',
            'image' => $image,
            'brand' => 'Test',
            'description' => 'This is a test',
            'size' => 'XL',
            'stock' => '69',
            'color' => 'Black',
            'region' => 'WEST',
            'location' => 'Colombo',
            
        ]);

        
        $response->assertStatus(201); 
        $response->assertJson([
            'message' => 'Product created successfully',
        ]);
    }

    public function testStoreFunctionCreatesProductForWebRequest()
    {
        $user = User::where('email', 'admin@gmail.com')->first();

        // Ensure the admin user is logged in
        $this->actingAs($user);

        $image = UploadedFile::fake()->image('test.jpg');
       
        $response = $this->post('/product_add', [
            'product_id' => '2',
            'supplier_id' => '1',
            'product_name' => 'Test product',
            'category' => 'Active wear',
            'price' => '500',
           'image' => $image,
            'brand' => 'Test',
            'description' => 'This is a test',
            'size' => 'XL',
            'stock' => '69',
            'color' => 'Black',
            'region' => 'WEST',
            'location' => 'Colombo',
        ]);

        
        $response->assertStatus(302); 
        $response->assertSessionHas('status', 'success'); 
    }

    public function testIndexFunctionReturnsProductListForApiRequest()
    {
        $user = User::where('email', 'admin@gmail.com')->first();
    
        // Ensure the admin user is logged in
        $this->actingAs($user);
    
        // Make an API request to the product list endpoint
        $response = $this->get('/api/v1.0/product_manage');
    
        $response->assertStatus(200);
         // 200 is the success status code
         
        $response->assertJsonStructure([
            'message',
            'data' => [
                '*' => [ // '*' to indicate that 'data' is an array of objects
                    'product_id',
                    'product_name',
                    'supplier_id',
                    'category',
                    'brand',
                    'description',
                    'location',
                    'color',
                    'size',
                    'stock',
                    'price',
                    
                ],
            ],
        ]);
    }
    

    public function testIndexFunctionReturnsProductListForWeb()
    {
        $user = User::where('email', 'admin@gmail.com')->first();

        // Ensure the admin user is logged in
        $this->actingAs($user);

        // Make a web request to the product list page
        $response = $this->get('/product_manage');

        $response->assertStatus(200); //  200 is the success status code
        $response->assertViewIs('product_manage'); // 'product_manage' is the view name
        $response->assertViewHas('product'); //  'product' is the variable passed to the view
    }

    // public function testUpdateFunctionUpdatesProductForApiRequest()
    // {
    //     $user = User::where('email', 'admin@gmail.com')->first();

    //     // Ensure the admin user is logged in
    //     $this->actingAs($user);

    //     // Create a new product or retrieve an existing one
    //     $product = Product::firstOrCreate(['product_id' => 1], [
    //         'supplier_id' => 1,
    //         'product_name' => 'Initial Product Name',
    //         'image' => 'initial_image.jpg',
    //         'category' => 'Initial Category',
    //         'brand' => 'Initial Brand',
    //         'description' => 'Initial Description',
    //         'size' => 'Initial Size',
    //         'color' => 'Initial Color',
    //         'price' => '100',
    //         'stock' => '69',
    //     ]);

    //     // Make a PUT request to update the product
    //     $response = $this->putJson('/api/v1.0/product_manage/' . $product->product_id, [
    //         '_token' => csrf_token(),
    //         'supplier_id' => 1,
    //         'product_name' => 'Updated Product Name',
    //         'image' => 'updated_image.jpg',
    //         'category' => 'Updated Category',
    //         'brand' => 'Updated Brand',
    //         'description' => 'Updated Description',
    //         'size' => 'Updated Size',
    //         'color' => 'Updated Color',
    //         'price' => '200',
    //         'stock' => '69',
    //     ]);

    //     // Assert the response status code
    //     $response->assertStatus(200); // 200 is the success status code

    //     // Assert the response JSON structure
    //     $response->assertJsonStructure([
    //         'message',
    //         'data' => [
    //             'product_id',
    //             'supplier_id',
    //             'product_name',
    //             'image',
    //             'category',
    //             'brand',
    //             'description',
    //             'size',
    //             'color',
    //             'price',
    //             'stock',
    //         ],
    //     ]);

    //     // Assert that the product details were updated in the database
    //     $this->assertDatabaseHas('products', [
    //         'product_id' => $product->product_id,
    //         'supplier_id' => 2, // Updated supplier_id
    //         'product_name' => 'This Updated Product Name', // Updated product_name
    //         'image' => 'This_updated_image.jpg', // Updated image
    //         'category' => 'This Updated Category', // Updated category
    //         'brand' => 'This Updated Brand', // Updated brand
    //         'description' => 'This Updated Description', // Updated description
    //         'size' => 'This Updated Size', // Updated size
    //         'color' => 'This Updated Color', // Updated color
    //         'price' => '300',
    //         'stock' => '89', // Updated price
    //     ]);
    // }

    public function testUpdateFunctionUpdatesProductForApiRequest()
    {
        $user = User::where('email', 'admin@gmail.com')->first();

        // Ensure the admin user is logged in
        $this->actingAs($user);

        // Retrieve an existing product with product_id 1 from the database
        $product = Product::where('product_id', 1)->firstOrFail();

        // Make a PUT request to update the product
        $response = $this->putJson('/api/v1.0/product_manage/' . $product->product_id, [
            '_token' => csrf_token(),
            'supplier_id' => 1,
            'product_name' => 'Updated Product Name',
            'image' => 'updated_image.jpg',
            'category' => 'Updated Category',
            'brand' => 'Updated Brand',
            'description' => 'Updated Description',
            'size' => 'Updated Size',
            'color' => 'Updated Color',
            'price' => '200',
            'stock' => '69',
        ]);

        // Assert the response status code
        $response->assertStatus(200); // 200 is the success status code

        // Assert the response JSON structure
        $response->assertJsonStructure([
            'message',
            'data' => [
                'product_id',
                'supplier_id',
                'product_name',
                'image',
                'category',
                'brand',
                'description',
                'size',
                'color',
                'price',
                'stock',
            ],
        ]);

        // Assert that the product details were updated in the database
        $this->assertDatabaseHas('products', [
            'product_id' => $product->product_id,
            'supplier_id' => 1, // Updated supplier_id
            'product_name' => 'Updated Product Name', // Updated product_name
            'image' => 'updated_image.jpg', // Updated image
            'category' => 'Updated Category', // Updated category
            'brand' => 'Updated Brand', // Updated brand
            'description' => 'Updated Description', // Updated description
            'size' => 'Updated Size', // Updated size
            'color' => 'Updated Color', // Updated color
            'price' => '200',
            'stock' => '69', // Updated price
        ]);
    }

    public function testUpdateFunctionUpdatesProductForWebRequest()
    {
        $user = User::where('email', 'admin@gmail.com')->first();

        // Ensure the admin user is logged in
        $this->actingAs($user);

        // Retrieve an existing product with product_id 1 from the database
        $product = Product::where('product_id', 1)->firstOrFail();

        // Make a POST request to update the product
        $response = $this->post('/product_manage/' . $product->product_id, [
            '_token' => csrf_token(),
            'supplier_id' => 1,
            'product_name' => 'Updated Product Name',
            'image' => 'updated_image.jpg',
            'category' => 'Updated Category',
            'brand' => 'Updated Brand',
            'description' => 'Updated Description',
            'size' => 'Updated Size',
            'color' => 'Updated Color',
            'price' => '200',
            'stock' => '69',
        ]);

        // Assert the response status code for a successful update (you can adjust this)
        $response->assertStatus(302); // Assuming a redirect is used for success

        // Assert that the product details were updated in the database
        $this->assertDatabaseHas('products', [
            'product_id' => $product->product_id,
            'supplier_id' => 1, // Updated supplier_id
            'product_name' => 'Updated Product Name', // Updated product_name
            'image' => 'updated_image.jpg', // Updated image
            'category' => 'Updated Category', // Updated category
            'brand' => 'Updated Brand', // Updated brand
            'description' => 'Updated Description', // Updated description
            'size' => 'Updated Size', // Updated size
            'color' => 'Updated Color', // Updated color
            'price' => '200',
            'stock' => '69', // Updated price
        ]);
    }

    // public function testDeactivateProduct()
    // {
    //     $user = User::where('email', 'admin@gmail.com')->first();

    //     // Ensure the admin user is logged in
    //     $this->actingAs($user);

    //     // Create a new product or retrieve an existing one
    //     $product = Product::where('product_id', 1)->firstOrFail();
    //     $product = Product::firstOrCreate(['product_id' => 1], [
    //         'supplier_id' => 1,
    //         'product_name' => 'Test Product',
    //         'image' => 'test_image.jpg',
    //         'category' => 'Test Category',
    //         'brand' => 'Test Brand',
    //         'description' => 'Test Description',
    //         'size' => 'Test Size',
    //         'color' => 'Test Color',
    //         'price' => '100',
    //         'stock' => '50',
    //         'status' => 'ACTIVE', // Ensure the product starts as ACTIVE
    //     ]);

    //     // Make a POST request to deactivate the product
    //     $response = $this->post('/deactivate_product/' . $product->product_id);

    //     // Assert the response status code
    //     $response->assertStatus(302); // Assuming a redirect is used for success

    //     // Assert that the product's status was updated in the database
    //     $this->assertDatabaseHas('products', [
    //         'product_id' => $product->product_id,
    //         'status' => 'INACTIVE', // Expect the status to be INACTIVE after deactivation
    //     ]);
    // }
    // public function testDeactivateProduct()
    // {
    //     $user = User::where('email', 'admin@gmail.com')->first();
    
    //     // Ensure the admin user is logged in
    //     $this->actingAs($user);
    
    //     // Find an existing product in the database, assuming there's a product with ID 1
    //     // $product = Product::find(1);
    //     $product = Product::where('product_id', 1)->firstOrFail();
    
    //     // Make a GET request to deactivate the product
    //     $response = $this->get('/deactivate_product/' . $product->id);
    
    //     // Assert the response status code
    //     $response->assertStatus(302); // Assuming a redirect is used for success
    
    //     // Refresh the product from the database
    //     $product->refresh();
    
    //     // Assert that the product's status was updated in the database
    //     $this->assertEquals('INACTIVE', $product->status);
    // }
    
    






}
