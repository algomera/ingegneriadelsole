<?php

	use App\Models\Credential;
	use App\Models\Group;
	use App\Models\Headquarter;
	use App\Models\LegalRepresentative;
	use App\Models\Referent;
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
			Schema::create('customers', function (Blueprint $table) {
				$table->id();
				$table->string('name');
				$table->foreignIdFor(Group::class, 'group_id')->nullable();
				$table->boolean('agent');
				$table->enum('type', [
					'private',
					'company'
				]);
				$table->foreignIdFor(Referent::class, 'referent_id')->nullable();
				$table->string('pec')->nullable();
				$table->string('notification_email')->nullable();
				$table->string('vat_number')->nullable();
				$table->string('fiscal_code')->nullable();
				$table->foreignIdFor(Headquarter::class, 'headquarter_id')->nullable();
				$table->foreignIdFor(LegalRepresentative::class, 'legal_representative_id')->nullable();
				$table->text('note')->nullable();
				$table->timestamps();
			});
		}

		/**
		 * Reverse the migrations.
		 *
		 * @return void
		 */
		public function down() {
			Schema::dropIfExists('customers');
		}
	};
