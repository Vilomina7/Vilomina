<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /** 
     * The name of factory's corresponding model.
     * 
     * @var string
    */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(mt_rand(2,6)),
            'slug' => $this->faker->slug(),
            'image' => 'hotdog.jpg',
            // 'description' => '<p>' . implode('</p><p>', $this->faker->paragraphs(mt_rand(1,5))) . '</p>',
            'description' => collect($this->faker->paragraphs(mt_rand(1,5)))
                            ->map(fn($p) => "<p>$p</p>")
                            ->implode(''),
            'original_price' => '60.000',
            'promo_price' => '30.000',
            'lokasi' => $this->faker->address(),
            'syarat_ketentuan' => $this->faker->sentence(),
            'promo_id' => mt_rand(1,2),
            'user_id' => mt_rand(1,3)
            // 'link_id' => mt_rand(1,5),
            // 'keyword_id' => mt_rand(1,2)
        ];
    }
}
