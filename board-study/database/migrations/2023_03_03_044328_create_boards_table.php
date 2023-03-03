<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoardsTable extends Migration
{
    /**
     * Run the migrations.
     * -> Migration Structure 참고
     * -> 명령어 : php artisan migrate
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boards', function (Blueprint $table) {
            $table->id();
            $table->string('nickname', 64); // byte 단위
            $table->string('title', 64);
            $table->string('content', 256);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * 명령어 : php artisan migrate:rollback
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boards');
    }
}
