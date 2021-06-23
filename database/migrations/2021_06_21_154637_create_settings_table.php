<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50)->nullable()->default('WTS');
            $table->string('tagline', 100)->nullable()->default(' Easy pizy site builder');
            $table->string('loginURL', 50)->nullable()->default('letmein');
            $table->string('faviconLink', 100)->nullable()->default('/media/favicon.png');
            $table->string('homepageURL', 10)->nullable()->default('/');
            $table->string('homepageTitle', 10)->nullable()->default('/');
            $table->string('errorpageURL', 10)->nullable()->default('404');
            $table->string('errorpageTitle', 10)->nullable()->default('Default');
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
        Schema::dropIfExists('settings');
    }
}
