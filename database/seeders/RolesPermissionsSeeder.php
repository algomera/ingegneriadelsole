<?php

	namespace Database\Seeders;

	use Illuminate\Database\Console\Seeds\WithoutModelEvents;
	use Illuminate\Database\Seeder;
	use Spatie\Permission\Models\Permission;
	use Spatie\Permission\Models\Role;

	class RolesPermissionsSeeder extends Seeder
	{
		/**
		 * Run the database seeds.
		 *
		 * @return void
		 */
		public function run() {
			// ROLES
			$operator = Role::create([
				'name'  => 'operator',
				'label' => 'Operatore'
			]);
			$permissions = [
				'prova',
			];
			foreach ($permissions as $permission) {
				Permission::create([
					'name' => $permission
				]);
			}

			$operator->givePermissionTo([
				'prova'
			]);
		}
	}
