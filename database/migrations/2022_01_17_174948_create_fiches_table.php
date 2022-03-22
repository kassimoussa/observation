<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fiches', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_time')->nullable();
            $table->string('nom_client')->nullable();
            $table->string('adresse_client')->nullable();
            $table->string('num_compte')->nullable();
            $table->string('type')->nullable();
            $table->string('service')->nullable();
            $table->string('num_facture')->nullable();
            $table->bigInteger('mont_facture')->nullable();
            $table->string('obs_cs_facturation')->nullable();
            $table->string('obs_cd_si')->nullable();
            $table->string('subimtby')->nullable();
            $table->string('status')->nullable();
            $table->timestamp('date_ajout')->nullable();
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
        Schema::dropIfExists('fiches');
    }
}
