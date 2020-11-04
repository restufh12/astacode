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
            $table->bigIncrements('id');
            $table->string('company_name', 255);
            $table->string('company_logo', 255);
            $table->longText('company_address');
            $table->string('company_email', 255);
            $table->string('company_tel', 255);
            $table->double('longitude')->nullable();
            $table->double('latitude')->nullable();
            $table->string('company_wa', 255)->nullable();
            $table->string('link_twitter', 255)->nullable();
            $table->string('link_instagram', 255)->nullable();
            $table->string('link_facebook', 255)->nullable();
            $table->string('link_linkedin', 255)->nullable();
            $table->string('link_skype', 255)->nullable();
            $table->text('slogan');
            $table->text('sub_slogan');
            $table->text('video_url')->nullable();;
            $table->longText('about_us')->nullable();;
            $table->longText('google_maps_iframe')->nullable();

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
