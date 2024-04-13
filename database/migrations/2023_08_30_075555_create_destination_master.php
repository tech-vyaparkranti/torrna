<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDestinationMaster extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destination_master', function (Blueprint $table) {
            $table->id();
            $table->string('destination_name',500)->unique()->nullable(false);
            $table->string('destination_image',500)->nullable(true);
            $table->string('destination_details',500)->nullable(true);
            $table->tinyInteger('status')->default('1')->nullable(false);
            $table->integer('sorting_number')->nullable(false)->default("1")->index("sorting_number_index");
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
        Schema::dropIfExists('destination_master');
    }
}
