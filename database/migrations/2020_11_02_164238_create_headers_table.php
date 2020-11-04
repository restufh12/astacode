<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('headers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('about_us');
            $table->string('why_us');
            $table->string('skills');
            $table->string('services');
            $table->string('call_to_action');
            $table->string('portfolios');
            $table->string('teams');
            $table->string('pricing');
            $table->string('faqs');
            $table->string('testimonials');
            $table->string('articles');
            $table->string('contact');
            $table->string('join_our_newsletter');
            $table->string('our_social_network');
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
        Schema::dropIfExists('headers');
    }
}
