<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\BlogPost;

class BlogPostApiTest extends TestCase
{
   
    /** @test */
    public function it_can_fetch_posts_with_default_limit_and_offset()
    {
        // Arrange: Create some posts
        BlogPost::factory()->count(10)->create();

        // Act: Make a GET request to the API endpoint
        $response = $this->getJson('/api/posts');

        // Assert: Check the response status and structure
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'success',
            'data' => [
                '*' => ['id', 'title', 'content', 'created_at', 'updated_at'],
            ],
            'limit',
            'offset',
            'total',
        ]);
        $response->assertJson([
            'limit' => 10,
            'offset' => 0,
            'total' => 15,
        ]);
        $this->assertCount(10, $response->json('data'));
    }

}
