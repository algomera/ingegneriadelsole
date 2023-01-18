<?php

	use App\Models\System;
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
			Schema::create('e_distribuziones', function (Blueprint $table) {
				$table->id();
				$table->foreignIdFor(System::class, 'system_id');
				$table->enum('documents', [
					'non_completi',
					'in_preparazione',
					'completi',
				])->nullable();
				$table->enum('question', [
					'non_eseguita',
					'in_lavorazione',
					'eseguita',
					'inviata',
				])->nullable();
				$table->enum('quotation', [
					'da_ricevere',
					'ricevuto',
					'accettato',
				])->nullable();
				$table->enum('start_of_process', [
					'non_eseguita',
					'in_lavorazione',
					'eseguita',
					'inviata',
				])->nullable();
				$table->enum('end_of_process', [
					'non_eseguita',
					'in_lavorazione',
					'eseguita',
					'inviata',
				])->nullable();
				$table->enum('start_of_work', [
					'non_eseguita',
					'in_lavorazione',
					'eseguita',
					'inviata',
				])->nullable();
				$table->enum('end_of_work', [
					'non_eseguita',
					'in_lavorazione',
					'eseguita',
					'inviata',
				])->nullable();
				$table->enum('censimp', [
					'non_eseguita',
					'registrata',
					'validata',
					'upnr',
				])->nullable();
				$table->enum('rde', [
					'non_eseguita',
					'in_lavorazione',
					'eseguita',
					'inviata',
				])->nullable();
				$table->enum('measurement_card', [
					'non_applicabile',
					'non_eseguita',
					'in_lavorazione',
					'eseguita',
					'inviata',
				])->nullable();
				$table->enum('activation', [
					'non_eseguita',
					'eseguita',
				])->nullable();
				$table->enum('gse', [
					'non_eseguita',
					'in_lavorazione',
					'eseguita',
					'inviata',
				])->nullable();
				$table->enum('connection', [
					'cessione_parziale',
					'ssp',
					'cessione_totale',
				])->nullable();
				$table->enum('system_type', [
					'normale',
					'bonus',
					'sconto_fattura',
				])->nullable();
				$table->text('connections_note')->nullable();
				$table->date('spi_execution_date');
				$table->date('spi_expiration_date');
				$table->date('spg_execution_date');
				$table->date('spg_expiration_date');
				$table->date('ground_verification_execution_date');
				$table->date('ground_verification_expiration_date');
				$table->text('adjustments_note')->nullable();
				$table->timestamps();
			});
		}

		/**
		 * Reverse the migrations.
		 *
		 * @return void
		 */
		public function down() {
			Schema::dropIfExists('e_distribuziones');
		}
	};
