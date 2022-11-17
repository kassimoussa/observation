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
            $table->string('subimtby')->nullable();
            $table->string('obs_nv1')->nullable();
            $table->string('obs_nv2')->nullable();
            $table->string('obs_nv3')->nullable();
            $table->string('avis_nv2')->nullable();
            $table->string('avis_nv3')->nullable();
            $table->string('status')->nullable();
            $table->timestamp('date_ajout')->nullable();
            $table->timestamp('date_nv2')->nullable();
            $table->timestamp('date_nv3')->nullable();
            $table->timestamp('date_dc')->nullable();
            $table->timestamp('date_dg')->nullable();
            $table->timestamp('date_dsi')->nullable();
            $table->timestamp('date_clos')->nullable();
            $table->string('assignedto')->nullable();
            $table->string('nivo')->nullable();
            $table->string('trans')->nullable();
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
