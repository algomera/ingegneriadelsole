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
			Schema::create('gses', function (Blueprint $table) {
				$table->id();
				$table->foreignIdFor(System::class, 'system_id');
				$table->enum('fuel_mix', [
					'da_eseguire',
					'in_lavorazione',
					'eseguita',
					'inviata'
				])->nullable();
				$table->enum('antimafia', [
					'da_rinnovare',
					'da_eseguire',
					'in_lavorazione',
					'eseguita',
					'inviata'
				])->nullable();
				$table->enum('invoice_january', [
					'eseguita',
					'non_eseguita'
				])->nullable();
				$table->enum('invoice_february', [
					'eseguita',
					'non_eseguita'
				])->nullable();
				$table->enum('invoice_march', [
					'eseguita',
					'non_eseguita'
				])->nullable();
				$table->enum('invoice_april', [
					'eseguita',
					'non_eseguita'
				])->nullable();
				$table->enum('invoice_may', [
					'eseguita',
					'non_eseguita'
				])->nullable();
				$table->enum('invoice_june', [
					'eseguita',
					'non_eseguita'
				])->nullable();
				$table->enum('invoice_july', [
					'eseguita',
					'non_eseguita'
				])->nullable();
				$table->enum('invoice_august', [
					'eseguita',
					'non_eseguita'
				])->nullable();
				$table->enum('invoice_september', [
					'eseguita',
					'non_eseguita'
				])->nullable();
				$table->enum('invoice_october', [
					'eseguita',
					'non_eseguita'
				])->nullable();
				$table->enum('invoice_november', [
					'eseguita',
					'non_eseguita'
				])->nullable();
				$table->enum('invoice_december', [
					'eseguita',
					'non_eseguita'
				])->nullable();
				$table->enum('seu', [
					'da_eseguire',
					'in_lavorazione',
					'eseguita',
					'inviata'
				])->nullable();
				$table->timestamps();
			});
		}

		/**
		 * Reverse the migrations.
		 *
		 * @return void
		 */
		public function down() {
			Schema::dropIfExists('gses');
		}
	};
