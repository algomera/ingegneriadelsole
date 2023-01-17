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
        Schema::create('areras', function (Blueprint $table) {
            $table->id();
	        $table->foreignIdFor(System::class, 'system_id');
	        $table->enum('contribution', [
		        'non_eseguita',
		        'in_lavorazione',
		        'eseguita',
		        'inviata'
	        ]);
	        $table->enum('investigation', [
		        'non_eseguita',
		        'in_lavorazione',
		        'eseguita',
		        'inviata'
	        ]);
	        $table->enum('unbundling', [
		        'non_eseguita',
		        'in_lavorazione',
		        'eseguita',
		        'inviata'
	        ]);
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
        Schema::dropIfExists('areras');
    }
};
