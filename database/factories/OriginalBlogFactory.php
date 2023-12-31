<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\OriginalBlog;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OriginalBlog>
 */
class OriginalBlogFactory extends Factory
{
    protected $model = OriginalBlog::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this ->faker->word(),
            'content' =>$this ->faker->realText()
        ];
    }
}
