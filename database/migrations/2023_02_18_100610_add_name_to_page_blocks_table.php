<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNameToPageBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('page_blocks', function (Blueprint $table) {
            $table->string('name')->after('page_id');
            $table->boolean('has_heading')->default(false)->after('name');
            $table->boolean('has_content')->default(false)->after('heading');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('page_blocks', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('has_heading');
            $table->dropColumn('has_content');
        });
    }
}
