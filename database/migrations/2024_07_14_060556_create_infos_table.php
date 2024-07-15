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
        Schema::create('infos', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('name');
            $table->string('email');
            $table->date('start_date');
            $table->integer('phone');
            $table->date('end_date');
            $table->integer('number_min_five');
            $table->integer('number_max_eight');
            $table->integer('whole_num_zero');
            $table->integer('max_whole_num_hunderd');
            $table->integer('num_range');
            $table->text('insta_url');
            $table->text('photo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('infos');
    }
};
