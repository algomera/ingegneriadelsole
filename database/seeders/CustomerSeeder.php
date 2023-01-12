<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Group;
use App\Models\Headquarter;
use App\Models\LegalRepresentative;
use App\Models\Referent;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$group = Group::create([
			'name' => 'Gruppo 1'
		]);
		$referent = Referent::create([
			'first_name' => fake()->firstName,
			'last_name' => fake()->lastName,
			'email' => fake()->email,
			'phone' => fake()->phoneNumber
		]);
		$headquarter = Headquarter::create([
			'street' => fake()->streetAddress,
			'city' => fake()->city,
			'province' => fake()->country
		]);
		$legal_representative = LegalRepresentative::create([
			'first_name' => fake()->firstName,
			'last_name' => fake()->lastName,
			'fiscal_code' => 'SRMFBA90R12A465L',
			'street' => fake()->streetAddress,
			'city' => fake()->city,
			'province' => fake()->country
		]);
        Customer::create([
			'name' => fake()->company,
			'group_id' => $group->id,
			'agent' => fake()->boolean,
			'type' => fake()->randomElement(['private', 'company']),
			'referent_id' => $referent->id,
			'pec' => fake()->email,
			'notification_email' => fake()->email,
			'vat_number' => '0000000000000',
			'fiscal_code' => 'SRMFBA90R12A465L',
			'headquarter_id' => $headquarter->id,
			'legal_representative_id' => $legal_representative->id
        ]);
    }
}
