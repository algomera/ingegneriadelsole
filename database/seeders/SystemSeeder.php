<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\MOne;
use App\Models\MTwo;
use App\Models\System;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    System::create([
			'customer_id' => Customer::all()->shuffle()->first()->id,
			'name' => fake()->regexify('[A-Za-z0-9]{20}'),
			'power' => fake()->randomNumber(2),
			'censimp' => fake()->randomNumber(2),
			'pod' => fake()->randomNumber(2),
			'connection' => fake()->randomElement(array_keys(config('general.system.connections'))),
			'tension' => fake()->randomNumber(2),
			'street' => fake()->streetAddress,
			'city' => fake()->city,
			'province' => fake()->country,
			'connection_date' => fake()->date,
			'incentive' => fake()->randomElement(array_keys(config('general.system.incentives'))),
			'sale' => fake()->randomElement(array_keys(config('general.system.sales'))),
			'company_code' => fake()->regexify('[A-Za-z0-9]{7}'),
			'adm' => true
	    ]);

		MOne::create([
			'system_id' => 1,
			'brand' => fake()->company,
			'number' => fake()->randomNumber(6),
			'k' => fake()->randomNumber(4),
			'phone' => fake()->phoneNumber
		]);

	    MTwo::create([
		    'system_id' => 1,
		    'brand' => fake()->company,
		    'number' => fake()->randomNumber(6),
		    'k' => fake()->randomNumber(4),
		    'phone' => fake()->phoneNumber
	    ]);

	    MTwo::create([
		    'system_id' => 1,
		    'brand' => fake()->company,
		    'number' => fake()->randomNumber(6),
		    'k' => fake()->randomNumber(4),
		    'phone' => fake()->phoneNumber
	    ]);
    }
}
