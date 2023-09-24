<?php

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
        Schema::create('programs', function (Blueprint $table) {
            $table->id('id_programs');
            $table->string('program_name', 50);
            $table->text('description_main');
            $table->string('id_levels');
            $table->string('image');
            $table->text('description_sma')->nullable();
            $table->text('description_smp')->nullable();
            $table->text('description_sd')->nullable();
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
        Schema::dropIfExists('programs');
    }
};
