<?php

namespace Database\Factories;

use App\Models\Jenis;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Surat>
 */
class SuratFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $jenis_id = Jenis::all()->random()->id;
        return [
            'jenis_id' => $jenis_id,
            'tipe' => $this->faker->randomElement(['Surat Masuk', 'Surat Keluar']),
            'no_surat' => $this->faker->numberBetween(1, 100),
            'tgl_surat' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'hal' => $this->faker->word(),
            'dari_ke' => $this->faker->city(),
        ];
    }
}
