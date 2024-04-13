<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestimonials extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('client_name',500)->nullable(false);
            $table->string('client_image',500)->default(null);
            $table->string('client_email',200)->index("client_email")->nullable(true)->default(null);
            $table->integer('item_priority')->nullable(false);
            $table->enum('approval_status',["under_review","approved","discarded"])->nullable(false)->default("under_review");
            $table->longText('review_text')->nullable(false);
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
        Schema::dropIfExists('testimonials');
    }
}
