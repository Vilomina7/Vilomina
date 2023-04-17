<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PhpParser\Node\NullableType;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('promo_id');
            $table->foreignId('user_id');
            // $table->foreignId('link_id');
            // $table->foreignId('keyword_id');
            $table->string('title');
            $table->String('slug')->unique();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->string('original_price')->nullable();
            $table->string('promo_price')->nullable();
            $table->string('satuan_promo')->nullable();
            $table->string('nilai_promo')->nullable();
            $table->date('new_at')->nullable();
            $table->date('expired_at')->nullable();
            $table->string('lokasi')->nullable();
            $table->text('syarat_ketentuan')->nullable();
            $table->string('nm_link1')->nullable();
            $table->string('url_link1')->nullable();
            $table->string('nm_link2')->nullable();
            $table->string('url_Link2')->nullable();
            $table->string('nm_link3')->nullable();
            $table->string('url_link3')->nullable();
            $table->string('key_one')->nullable();
            $table->string('key_two')->nullable();
            $table->string('key_three')->nullable();
            $table->string('key_four')->nullable();
            $table->string('key_five')->nullable();
            $table->timestamp('published_at')->nullable();
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
        Schema::dropIfExists('posts');
    }
}
