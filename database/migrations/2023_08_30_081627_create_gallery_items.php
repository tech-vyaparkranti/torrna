<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalleryItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('gallery_items', function (Blueprint $table) {
            $table->id();
            $table->string('local_image',500)->nullable();
            $table->string('image_link',500)->nullable();
            $table->string('alternate_text',500)->default("image");
            $table->string('local_video',500)->nullable();
            $table->string('video_link',500)->nullable();
            $table->string('title',500)->nullable();
            $table->string('description',500)->nullable();
            $table->string('filter_category',50)->nullable(false)->index('filter_category_name');
            $table->string('position',500)->nullable();
            $table->enum('view_status',['hidden','visible'])->nullable(false)->default("visible");
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
        Schema::dropIfExists('gallery_items');
    }
}
