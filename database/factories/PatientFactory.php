<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{   
    protected $model = Patient::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_balita' => $this->faker->name,
            'tanggal_lahir' => $this->faker->dateTimeBetween('-5 years', '-1 day'),
            'jenis_kelamin' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'alamat' => $this->faker->address,
            'nama_wali' => $this->faker->name,
            'telepon_wali' => $this->faker->phoneNumber,
            'email_wali' => $this->faker->safeEmail,
            'tinggi_badan_lahir' => $this->faker->randomFloat(2, 45, 60),
            'berat_badan_lahir' => $this->faker->randomFloat(2, 2.5, 4.5),
            'lingkar_kepala' => $this->faker->randomFloat(2, 30, 40),
            'created_at' => $this->faker->dateTimeBetween('2024-01-01', '2024-12-31'),
            'updated_at' => now(),
        ];
    }
}