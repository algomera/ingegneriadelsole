<?php

	use App\Models\System;
	use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adms', function (Blueprint $table) {
            $table->id();
	        $table->foreignIdFor(System::class, 'system_id');
			$table->enum('declaration', [
				'da_eseguire',
				'in_lavorazione',
				'eseguita',
				'inviata'
			]);
			$table->enum('register', [
				'da_richiedere',
				'non_applicabile',
				'richiesto',
				'ritirato',
			]);
			$table->date('verification_execution_date');
			$table->date('verification_expiration_date');
			$table->text('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adms');
    }
};
