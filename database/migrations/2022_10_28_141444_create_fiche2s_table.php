<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFiche2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fiche2s', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_time')->nullable();
            $table->string('nom_client')->nullable();
            $table->string('adresse_client')->nullable();
            $table->string('num_compte')->nullable();
            $table->string('type')->nullable();
            $table->string('service')->nullable();
            $table->string('num_facture')->nullable();
            $table->bigInteger('mont_facture')->nullable();
            $table->text('obs_nv1')->nullable();
            $table->text('obs_nv2')->nullable();
            $table->text('obs_nv3')->nullable();
            $table->string('submitedby')->nullable();
            $table->string('avis_nv2')->nullable();
            $table->string('avis_nv3')->nullable();
            $table->string('status')->nullable();
            $table->timestamp('date_ajout')->nullable();
            $table->timestamp('date_nv2')->nullable();
            $table->timestamp('date_nv3')->nullable();
            $table->timestamp('date_dc')->nullable();
            $table->timestamp('date_clos')->nullable();
            $table->string('assignedto')->nullable();
            $table->string('nivo')->default(1);
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
        Schema::dropIfExists('fiche2s');
    }
}
