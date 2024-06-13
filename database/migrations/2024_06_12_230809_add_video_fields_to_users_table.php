<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVideoFieldsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('video_file')->nullable();
            $table->string('video_link')->nullable();
            $table->timestamp('video_submitted_at')->nullable();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('video_file');
            $table->dropColumn('video_link');
            $table->dropColumn('video_submitted_at');
        });
    }
}