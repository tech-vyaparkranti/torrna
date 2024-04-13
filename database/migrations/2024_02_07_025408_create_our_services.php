<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOurServices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('our_services', function (Blueprint $table) {
            $table->id();
            $table->string('service_name',500)->nullable(false)->unique("unique_service_names");
            $table->string('service_details',500)->nullable(false);
            $table->string('service_icon',100)->nullable(false);
            $table->integer('position')->nullable(false);
            $table->tinyInteger('status')->default('1')->nullable(false);
            $table->bigInteger("created_by")->nullable(true);
            $table->bigInteger("updated_by")->nullable(true);
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
        Schema::dropIfExists('our_services');
    }
}
