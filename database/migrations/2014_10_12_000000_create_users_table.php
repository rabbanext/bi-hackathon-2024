<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('nowa')->nullable();
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->tinyInteger('type')->default(0);
            $table->string('team_name')->nullable();
            $table->string('institution')->nullable();
            $table->text('member_name')->nullable();
            $table->text('member_role')->nullable();
            $table->text('member_domicile')->nullable();
            $table->text('member_email')->nullable();
            $table->text('member_date_of_birth')->nullable();
            $table->text('member_profession')->nullable();
            $table->text('member_github_url')->nullable();
            $table->text('member_linkedin_url')->nullable();
            $table->text('project_link')->nullable();
            $table->text('project_desc')->nullable();
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
        Schema::dropIfExists('users');
    }
};
