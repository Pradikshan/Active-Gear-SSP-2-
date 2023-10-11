<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


use App\Models\Supplier;
use App\Http\Controllers\SupplierController;
use Illuminate\Http\Request;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Auth\User;

class SupplierControllerTest extends TestCase
{


    protected function setUp(): void
    {
        parent::setUp();
        $user = User::where('email', 'admin@gmail.com')->first();
        $this->actingAs($user);
    }
    

   

    // public function testStoreFunctionCreatesSupplierForApiRequest()
    // {
    //     $user = User::where('email', 'admin@gmail.com')->first();
    //     $this->actingAs($user);

        
    //     $response = $this->postJson('/supplier_add', [
    //         '_token' => csrf_token(),
    //         'supplier_id' => 7,
    //         'company_name' => 'Test company',
    //         'company_address' => 'Test address',
    //         'email_address' => 'test@gmail.com',
    //         'telephone_no' => '0770889008',
            
    //     ]);

        
    //     $response->assertStatus(201); 
    //     $response->assertJson([
    //         'message' => 'Supplier created successfully',
    //     ]);
    // }

    // public function testStoreFunctionCreatesSupplierForWebRequest()
    // {
    //     $user = User::where('email', 'admin@gmail.com')->first();
    //     $this->actingAs($user);
       
    //     $response = $this->post('/supplier_add', [
    //         'supplier_id' => 8,
    //         'company_name' => 'Test company',
    //         'company_address' => 'Test address',
    //         'email_address' => 'test@gmail.com',
    //         'telephone_no' => '0770889008',
    //     ]);

        
    //     $response->assertStatus(302); 
    //     $response->assertSessionHas('status', 'success'); 
    // }
}
