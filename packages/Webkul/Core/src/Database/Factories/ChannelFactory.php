<?php

namespace Webkul\Core\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Webkul\Core\Models\Channel;
use Webkul\Core\Models\Currency;
use Webkul\Core\Models\Locale;

class ChannelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Channel::class;

    /**
     * Configure the model factory.
     */
    public function configure(): static
    {
        return $this->hasAttached(Currency::inRandomOrder()->limit(1)->get())
            ->hasAttached(Locale::inRandomOrder()->limit(1)->get())
            ->hasTranslations();
    }

    /**
     * Define the model's default state.
     *
     * @throws \JsonException
     */
    public function definition(): array
    {
        return [
            'code'              => $code = $this->faker->unique()->word(),
            'root_category_id'  => 1,
        ];
    }
}
