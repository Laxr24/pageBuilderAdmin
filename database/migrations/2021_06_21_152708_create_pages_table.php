<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50)->nullable()->default('Default'); 
            $table->string('type', 15)->nullable()->default('Default'); 
            $table->string('url', 150)->unique()->default('Default'); 
            $table->text('headerCode')->nullable(); 
            $table->text('body')->nullable(); 
            $table->text('footerCode')->nullable(); 
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
        Schema::dropIfExists('pages');
    }
}
