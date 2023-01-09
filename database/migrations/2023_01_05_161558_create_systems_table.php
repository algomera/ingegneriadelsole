<?php

	use App\Models\Customer;
	use Illuminate\Database\Migrations\Migration;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Support\Facades\Schema;

	return new class extends Migration {
		/**
		 * Run the migrations.
		 *
		 * @return void
		 */
		public function up() {
			Schema::create('systems', function (Blueprint $table) {
				$table->id();
				$table->foreignIdFor(Customer::class, 'customer_id');
				$table->string('name');
				$table->float('power');
				$table->string('censimp');
				$table->string('pod');
				$table->enum('connection', [
					'cessione_totale',
					'cessione_parziale',
					'scambio_sul_posto',
					'vendita_seu'
				]);
				$table->float('tension');
				$table->string('street');
				$table->string('city');
				$table->string('province');
				$table->date('connection_date');
				$table->enum('incentive', [
					'1',
					'2',
					'3',
					'4',
					'5',
					'altro',
					'nessuno'
				]);
				$table->enum('sale', [
					'gse',
					'trader'
				]);
				$table->string('company_code');
				// ADM
				$table->boolean('adm')->default(false);
				$table->boolean('proxy_compilation')->default(false);
				$table->boolean('proxy_subscription')->default(false);
				$table->boolean('declaration')->default(false);
				$table->boolean('register_request')->default(false);
				$table->boolean('triennial_verification')->default(false);
				// Arera
				$table->boolean('arera')->default(false);
				$table->boolean('proxy_arera')->default(false);
				$table->boolean('contribution')->default(false);
				$table->boolean('investigation')->default(false);
				$table->boolean('unbundling_support')->default(false);
				// GSE
				$table->boolean('gse')->default(false);
				$table->boolean('fuel_mix')->default(false);
				$table->boolean('antimafia')->default(false);
				$table->boolean('invoices')->default(false);
				$table->boolean('seu')->default(false);
				$table->boolean('siad')->default(false);
				$table->boolean('checks')->default(false);
				// TERNA
				$table->boolean('terna')->default(false);
				$table->boolean('g_stat')->default(false);
				// E-DISTRIBUZIONE
				$table->boolean('e_distribuzione')->default(false);
				$table->boolean('new_concessions')->default(false);
				$table->boolean('adjustments')->default(false);
				$table->boolean('reconciliation')->default(false);
				$table->boolean('maintenance')->default(false);
				$table->boolean('ceo_management')->default(false);
				$table->timestamps();
			});
		}

		/**
		 * Reverse the migrations.
		 *
		 * @return void
		 */
		public function down() {
			Schema::dropIfExists('systems');
		}
	};
