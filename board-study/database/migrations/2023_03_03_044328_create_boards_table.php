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

            $table->unsignedBigInteger('user_id');

            $table->string('nickname', 64); // byte 단위
            $table->string('title', 64);
            $table->string('content', 256);

            // 파일 업로드
            $table->string('image_name')->nullable();
            $table->string('image_path')->nullable();

            $table->timestamps();

            // users 테이블의 id를 참조
            $table->foreign('user_id')->references('id')->on('users');
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
