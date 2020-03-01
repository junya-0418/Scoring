<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\AdminAuth;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BlogTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /**
     * @test
     */
    public function testShowBlogLists()
    {
        $response = $this->get('/blog/lists');

        $response->assertStatus(200)->assertSee('test1');
    }

    /**
     * @test
     */
    public function testShowBlogForm() {

        $response = $this->withoutMiddleware()->get('/blog/form');

        $response->assertStatus(200);

    }
}
