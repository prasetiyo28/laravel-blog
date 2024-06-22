<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\BlogPost;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BlogPost>
 */
class BlogPostFactory extends Factory
{

    protected $model = BlogPost::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->sentence;
        $blogPostId = BlogPost::factory()->create()->id;
        $userId = User::factory()->create()->id;
        $slug = str_slug($title);
    
        return [
            'title' => $title,
            'content' => $this->faker->paragraph,
            'slug' => $slug,
            'user_id' => $userId,
            'blog_posts_id' => $blogPostId,
        ];
    }
}
