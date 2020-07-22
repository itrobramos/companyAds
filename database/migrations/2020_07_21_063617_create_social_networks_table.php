<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialNetworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_networks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('companyId')->unsigned();
            $table->bigInteger('socialNetworkTypeId')->unsigned();
            $table->string('URL');
            $table->boolean('active')->default(1);
            $table->timestamps();
        });

        Schema::table('social_networks', function (Blueprint $table){
            $table->foreign('companyId')->references('id')->on('companies')->onDelete('cascade');
        });

        
        Schema::table('social_networks', function (Blueprint $table){
            $table->foreign('socialNetworkTypeId')->references('id')->on('social_network_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('social_networks');
    }
}
