<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /*
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books_infos', function (Blueprint $table) {
            $table->id();
            $table->string('book title', 150);
            $table->string('author', 100);
            $table->string('description', 250);
            $table->string('year', 4);
            $table->timestamps();
        });
    }

    /*
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('books_infos', function (Blueprint $table) {
            //
        });
    }
};
