<?php

namespace Tests\Feature;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Product;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_get_list_of_all_products() 
    {   
        $user =  User::factory()->create([]);;
        $products = Product::factory(2)->create([]);
       
        $response = $this->actingAs($user)->get('/products');

        $response->assertStatus(200);
        $this->assertCount(2, Product::all());
    }

   

}
