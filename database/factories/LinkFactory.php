<?php

namespace Database\Factories;

use App\Models\Link;
use Illuminate\Database\Eloquent\Factories\Factory;

class LinkFactory extends Factory
{
    /** 
     * The name of factory's corresponding model.
     * 
     * @var string
    */
    protected $model = Link::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name_link' => $this->faker->name(),
            'url_link' => $this->faker->url(),
            'image' => $this->faker->image()
        ];
    }
}
