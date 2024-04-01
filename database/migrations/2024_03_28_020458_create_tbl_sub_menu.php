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
        Schema::create('tbl_sub_menu', function (Blueprint $table) {
            $table->increments('id_sub_menu');
            $table->integer('id_parent');
            $table->string('menu_sub_name');
            $table->string('menu_sub_url');
            $table->integer('menu_sub_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_sub_menu');
    }
};
