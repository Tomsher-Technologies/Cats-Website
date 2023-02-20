<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seos', function (Blueprint $table) {
            $table->id();
            $table->integer('seo_id');
            $table->string('seo_type');
            $table->string('title')->nullable();
            $table->tinyText('description')->nullable();
            $table->text('keywords')->nullable();
            $table->string('og_title')->nullable();
            $table->tinyText('og_description')->nullable();
            $table->string('twitter_title')->nullable();
            $table->tinyText('twitter_description')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seos');
    }
}
