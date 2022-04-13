<?php

namespace Tests\Functional;

use Illuminate\Http\Response;
use Tests\TestCase;

class ProductFTest extends TestCase
{
    public function testGetProducts()
    {
        $this->json('get', '/api/products')
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                'status',
                'message',
                'data',
            ]);
    }

    public function testGetProductsByName()
    {
        $this->json('get', '/api/products', [
            'name' => 'Teste de produto'
        ])
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                'status',
                'message',
                'data',
            ]);
    }

    public function testSaveProduct()
    {
        $this->json('post', '/api/products', [
            "name" => "Teste de produto",
            "category_id" => 1,
            "description" => "Teste de descrição de produto"
        ])
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                'status',
                'message',
                'data',
            ]);
    }

    public function testSaveProductError()
    {
        $this->json('post', '/api/products', [

        ])
            ->assertStatus(Response::HTTP_BAD_REQUEST)
            ->assertJsonStructure([
                'status',
                'message',
                'data',
            ]);
    }
}
