<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('like_user_id')->comment('いいねした人のID');
            $table->unsignedBigInteger('like_post_id')->comment('いいねした投稿のID');
            $table->timestamps(); // created_at と updated_at を自動で追加

            // 外部キー制約の追加
            $table->foreign('like_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('like_post_id')->references('id')->on('posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('likes');
    }
}