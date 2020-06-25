<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->string('title', 200);
            $table->string('slug', 200);
            $table->text('description')->nullable();
            $table->text('short_description')->nullable();
            $table->text('tags')->nullable();
            $table->text('image_path')->nullable();
            $table->text('image_thumb')->nullable();
            $table->string('category_page', 100)->nullable()->default(''); // example =  article , product
            $table->string('category', 100)->nullable()->default(''); 
            $table->string('publisher', 100)->nullable()->default('');
            $table->boolean('status_published')->default(true);
            $table->double('price', 20, 2)->default(0);
            $table->double('price_promo', 20, 2)->default(0);
            $table->double('viewer', 20, 0)->default(0);
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
        Schema::dropIfExists('contents');
    }
}
