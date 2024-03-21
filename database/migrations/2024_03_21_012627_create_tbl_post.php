<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_post', function (Blueprint $table) {
            $table->increments('post_id');
            $table->integer('category_id');
            $table->string('post_author');
            $table->integer('post_index');
            $table->string('post_title');
            $table->text('post_content');
            $table->integer('post_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_post');
    }
};
