<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableNotificationbell extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {


        Schema::create('notification_bells', function ( Blueprint $table ) {
            $table->id();
            $table->boolean("is_view")->comment("Просмотрено ли")->default(false);
            $table->string("title")->comment("тайтл")->nullable();
            $table->string("message")->comment("контент")->nullable();
            $table->string("link_name")->comment("кнопка текст")->nullable();
            $table->string("link_href")->comment("кнопка ссылка")->nullable();
            $table->string("image")->comment("внутр.ссылка на аватар")->nullable();
            $table->integer("user_id")->comment("кнопка ссылка")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('notification_bells');
    }
}
