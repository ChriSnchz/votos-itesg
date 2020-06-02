<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEleccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eleccions', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('fecha_inicio')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('fecha_fin')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->longText('descripcion')->nullable();
            $table->boolean('estatus')->default(1)->nullable();
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
        Schema::dropIfExists('eleccions');
    }
}
