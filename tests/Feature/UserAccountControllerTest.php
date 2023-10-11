<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


use App\Models\User;
// use Illuminate\Foundation\Auth\User;
use App\Http\Controllers\CustomerUserAccountController;
use Illuminate\Http\Request;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

class UserAccountControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    // public function testaccessLandingPage(): void
    // {
    //     $response = $this->get('/main');

    //     $response->assertStatus(200);
    // }


    

    // public function testUserDuplication(): void
    // {
    //    $testuser = User::make([
    //     'name' => 'Test user1',
    //     'email' => 'testuser@gmail.com'
    //    ]);

    //    $testuser2 = User::make([
    //     'name' => 'Test user2',
    //     'email' => 'testuser2@gmail.com'
    //    ]);

    //    $this->assertTrue($testuser->email != $testuser2->email);
    // }



    // public function testDeleteUser()
    // {
    //     $user = User::factory()->count(1)->make();

    //     $user = User::first();

    //     if($user){
    //         $user-> delete();
    //     }
    //     $this->assertTrue(true);
    // }
    

    // public function testUserRetrieval()
    // {
    //     $user = User::factory()->create();

    //     $retrievedUser = User::find($user->id);

    //     $this->assertInstanceOf(User::class, $retrievedUser);
    //     $this->assertEquals($user->name, $retrievedUser->name);
    //     $this->assertEquals($user->email, $retrievedUser->email);
    // }

     
    // public function testUserCannotLoginWithIncorrectCredentials()
    // {
    //     // Bypass the authentication middleware for this test
    //     $this->withoutMiddleware();
    
    //     // Make a POST request to the login route with incorrect credentials
    //     $response = $this->post('/login', [
    //         'email' => 'usertest2@example.com',
    //         'password' => 'incorrectpassword',
    //     ]);
    
    //     // Assert that the login attempt fails and the user is not authenticated
    //     $response->assertSessionHasErrors('email'); // Use 'email' as the error key
    //     $this->assertGuest();
    // }
    
     
}
