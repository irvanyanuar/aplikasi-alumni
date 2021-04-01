<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('level');
            $table->text('photo')->nullable();
            $table->string('student_number')->nullable();
            $table->year('entry_year')->nullable();
            $table->year('graduation_year')->nullable();
            $table->string('birth_place')->nullable();
            $table->unsignedBigInteger('birth_date_id')->nullable();
            $table->foreign('birth_date_id')->references('id')->on('regencies')->onDelete('set null');
            $table->string('phone_number')->nullable();
            $table->text('address')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
