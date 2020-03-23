<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category')
            ->nullable(false);
            $table->string('name', 100)
                ->nullable(false)
                ->unique();
            $table->string('title', 100)
                ->nullable(false)
                ->unique();
            $table->string('content')
                ->nullable(false)
                ->unique();
            $table->foreignId('image')
                ->nullable(false)
                ->unique();
            $table->foreignId('author')
                ->nullable(false)
                ->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
