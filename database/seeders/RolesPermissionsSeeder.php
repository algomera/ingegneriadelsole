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
			$admin = Role::create([
				'name'  => 'admin',
				'label' => 'Amministratore'
			]);
			$operator = Role::create([
				'name'  => 'operator',
				'label' => 'Operatore'
			]);
			$permissions = [
				//// Dashboard
				'dashboard_access',
				//// Anagrafiche
				'customer_access',
				'customer_create',
				'customer_read',
				'customer_update',
				// 'customer_delete',
				/// Steps
				// Credenziali
				'customer_credentials_create',
				'customer_credentials_read',
				'customer_credentials_update',
				'customer_credentials_delete',
				/// Impianti
				'system_create',
//				'system_read',
				'system_update',
				'system_delete',
				// M1
				'mone_create',
//				'mone_read',
				'mone_update',
				'mone_delete',
				// M2
				'mtwo_create',
//				'mtwo_read',
				'mtwo_update',
				'mtwo_delete',
				//// Gruppi di appartenenza
				'group_access',
				'group_create',
				'group_read',
				'group_update',
				'group_delete',
				//// Utenti
				'user_access',
				'user_create',
				'user_read',
				'user_update',
				'user_delete'
			];
			foreach ($permissions as $permission) {
				Permission::create([
					'name' => $permission
				]);
			}
			// Operator
			$operator->givePermissionTo([
				// Dashboard
				'dashboard_access',
				// Anagrafiche
				'customer_access',
				'customer_read',
			]);
		}
	}
