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
			Schema::create('credentials', function (Blueprint $table) {
				$table->id();
				$table->foreignIdFor(Customer::class, 'customer_id');
				$table->enum('type', [
					'e-distribuzione',
					'terna',
					'gse',
					'altro'
				]);
				$table->string('service')->nullable();
				$table->string('username');
				$table->string('password');
				$table->timestamps();
			});
		}

		/**
		 * Reverse the migrations.
		 *
		 * @return void
		 */
		public function down() {
			Schema::dropIfExists('credentials');
		}
	};
