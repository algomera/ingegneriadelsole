<?php

	namespace Database\Seeders;

	use App\Models\User;
	use Illuminate\Database\Console\Seeds\WithoutModelEvents;
	use Illuminate\Database\Seeder;

	class UserSeeder extends Seeder
	{
		/**
		 * Run the database seeds.
		 *
		 * @return void
		 */
		public function run() {
			// Admin
			$admin = User::create([
				'name'     => 'Administrator',
				'email'    => 'admin@example.test',
				'password' => bcrypt('password')
			]);
			$admin->assignRole('admin');
			// Operator
			$operator = User::create([
				'name'     => 'Operator',
				'email'    => 'operator@example.test',
				'password' => bcrypt('password')
			]);
			$operator->assignRole('operator');
		}
	}
