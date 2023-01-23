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
				// Informazioni generali
				'customer_general_informations_read',
				'customer_general_informations_update',
				// Informazioni di contatto
				'customer_contact_informations_read',
				'customer_contact_informations_update',
				// Referente
				'customer_referent_read',
				'customer_referent_update',
				// Sede Legale
				'customer_headquarter_read',
				'customer_headquarter_update',
				// Rappresentante Legale
				'customer_legal_representative_read',
				'customer_legal_representative_update',
				// Credenziali
				'customer_credentials_create',
				'customer_credentials_read',
				'customer_credentials_update',
				'customer_credentials_delete',
				// Notes
				'customer_notes_read',
				'customer_notes_update',
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
