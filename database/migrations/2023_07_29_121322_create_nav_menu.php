<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNavMenu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nav_menu', function (Blueprint $table) {
            $table->id();
            $table->string('title',500)->nullable(false)->unique();
            $table->string('url',500)->nullable(false)->default("#");
            $table->string('url_target',45)->nullable(false);
            $table->enum('nav_type', ['top', 'footer','mobile'])->nullable(false);
            $table->integer('position')->nullable(false);
            $table->enum('view_in_list', ['yes', 'no'])->default('no')->nullable(false);
            $table->tinyInteger('status')->default('1')->nullable(false);
            $table->integer('parent_id')->nullable(true);
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
        Schema::dropIfExists('nav_menu');
    }
}
