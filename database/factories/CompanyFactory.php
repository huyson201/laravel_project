<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

    /**
     * list of all company's names
     *
     * @var array
     */
    private $companies = [
        'Walmart',
        'Amazon',
        'Apple',
        'CVS Health',
        'UnitedHealth Group',
        'Berkshire Hathaway',
        'McKesson',
        'Alphabet',
        'AT&T',
        'Cigna',
        'Microsoft',
        'Cardinal Health',
        'Home Depot',
        'JPMorgan Chase'
    ];
    public function definition()
    {
        return [
            //
            'company_name'      => $this->companies[rand(0, count($this->companies) - 1)],
            'company_web'       => 'website123.com',
            'company_address'   => $this->faker->address,
            'company_code'      => $this->faker->numerify('#######'),
            'company_phone'     => $this->faker->phoneNumber,
        ];
    }
}
