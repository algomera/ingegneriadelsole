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
			Schema::create('m_ones', function (Blueprint $table) {
				$table->id();
				$table->foreignIdFor(System::class, 'system_id');
				$table->string('brand');
				$table->string('number');
				$table->string('k');
				$table->string('phone');
				$table->boolean('telemetering')->default(false);
				$table->string('operator')->nullable();
				$table->enum('customer', [
					'gse',
					'e_distribuzione',
					'nessun_dato'
				])->default('nessun_dato');
				$table->timestamps();
			});
		}

		/**
		 * Reverse the migrations.
		 *
		 * @return void
		 */
		public function down() {
			Schema::dropIfExists('m_ones');
		}
	};
