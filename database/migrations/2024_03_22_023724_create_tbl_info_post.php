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
        Schema::create('tbl_info_post', function (Blueprint $table) {
            $table->increments('info_post_id');
            $table->string('info_post_author');
            // $table->integer('info_post_index');
            $table->string('info_post_title');
            $table->text('info_post_content');
            $table->integer('info_post_status');
            $table->boolean('is_default')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_info_post');
    }
};
