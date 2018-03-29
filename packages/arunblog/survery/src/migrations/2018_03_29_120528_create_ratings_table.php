<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->increments('rating_id');
            $table->string('created_by',40)->nullable(true)->default(NULL);
            $table->string('updated_by',40)->nullable(true)->default(NULL);
            $table->timestamp('created_at')->nullable(true)->default(NULL);
            $table->timestamp('updated_at')->nullable(true)->default(NULL);            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ratings');
    }
}
