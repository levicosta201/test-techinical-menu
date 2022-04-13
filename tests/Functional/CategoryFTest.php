<?php

namespace Tests\Functional;

use Illuminate\Http\Response;
use Tests\TestCase;

class CategoryFTest extends TestCase
{
    public function testGetCategorys()
    {
        $this->json('get', '/api/categories')
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                'status',
                'message',
                'data',
            ]);
    }

    public function testGetCategorysByName()
    {
        $this->json('get', '/api/categories', [
            'name' => 'Teste de produto'
        ])
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                'status',
                'message',
                'data',
            ]);
    }

    public function testSaveCategory()
    {
        $this->json('post', '/api/categories', [
            'name' => 'Teste de produto',
        ])
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                'status',
                'message',
                'data',
            ]);
    }

    public function testSaveCategoryError()
    {
        $this->json('post', '/api/categories', [

        ])
            ->assertStatus(Response::HTTP_BAD_REQUEST)
            ->assertJsonStructure([
                'status',
                'message',
                'data',
            ]);
    }
}
