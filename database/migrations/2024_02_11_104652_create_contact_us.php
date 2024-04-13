<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactUs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_us', function (Blueprint $table) {
            $table->id();
            $table->string('first_name',50)->nullable(false);
            $table->string('last_name',50)->nullable(false);
            $table->string('email',100)->nullable(false)->index("email_index");
            $table->string('phone_number',20)->nullable(false)->index("phone_number");
            $table->text('message')->nullable(false);
            $table->string('ip_address',50)->nullable(false)->index("ip_index");
            $table->string('user_agent',255)->nullable(false);
            $table->tinyInteger('status')->default('1')->nullable(false);
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
        Schema::dropIfExists('contact_us');
    }
}
