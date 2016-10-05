<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
          $table->increments('id');
            $table->string('name');// Название
            $table->string('url')->unique();// URL
            $table->string('subscibtion');// Описание
            $table->integer('published');// Публикация
            $table->timestamp('published_at');//Дата публикации
            $table->integer('category_id')->unsigned();// ->Категория
            $table->foreign('category_id')->references('id')->on('categories')->onDelelte('cascade');
            $table->string('anons');// Анонс поста
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('articles');
    }
}
