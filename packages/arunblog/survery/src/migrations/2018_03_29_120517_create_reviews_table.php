<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('review_id');
            $table->integer('rating_id')->unsigned();
            $table->string('reviewer_name',50);
            $table->string('review_title', 100);
    	    $table->string('review', 250);
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
        Schema::dropIfExists('reviews');
    }
}
