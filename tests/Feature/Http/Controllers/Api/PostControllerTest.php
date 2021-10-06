<?php

namespace Tests\Feature\Http\Controllers\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_store()
    {
        $this->withoutExceptionHandling();

        $response = $this -> json('POST', '/api/posts',[
        'title' => 'post de prueba numero 1'
        ]);

        $response->assertJsonStructure(['id', 'title', 'created_at', 'updated_at'])
        ->assertJson(['title' => 'post de prueba numero 1'])
        ->assertStatus(201);//ok, creado un recurso
        $this->assertDatabaseHas('posts', ['title' => 'post de prueba numero 1']);
    }
}
