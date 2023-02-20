<?php

use App\Models\Pages\Page;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_blocks', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Page::class);
            $table->string('heading')->nullable();
            $table->text('content')->nullable();
            $table->boolean('has_videos')->default(false);
            $table->text('videos')->nullable();
            $table->boolean('has_image')->default(false);
            $table->string('image')->nullable();
            $table->string('image_alt')->nullable();
            $table->boolean('has_button')->default(false);
            $table->string('button_text')->nullable();
            $table->string('button_link')->nullable();
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
        Schema::dropIfExists('page_blocks');
    }
}
