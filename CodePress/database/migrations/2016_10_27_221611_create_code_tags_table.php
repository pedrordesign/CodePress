<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCodeTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codepress_tags', function (Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->boolean('active')->default(false);
            $table->integer('taggable_id')->nullable()->unsigned()->index();
            $table->string('taggable_type')->nullable()->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::drop('codepress_tags');
    }

}
