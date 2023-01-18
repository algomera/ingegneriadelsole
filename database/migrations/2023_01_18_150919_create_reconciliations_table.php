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
			Schema::create('reconciliations', function (Blueprint $table) {
				$table->id();
				$table->foreignIdFor(System::class, 'system_id');
				$table->enum('reconciliation', [
					'non_eseguita',
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
			Schema::dropIfExists('reconciliations');
		}
	};
