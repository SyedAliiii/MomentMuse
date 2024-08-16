<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username');
            $table->string('password');
            $table->string('email');
            $table->string('contact');
            $table->text('profile');
            $table->timestamps();
        });

        // Insert a default admin user with a hashed password
        DB::table('admins')->insert([
            'name' => 'Admin',
            'username' => 'momentmuse',
            'password' => Hash::make('123admin'),
            'email' => 'info_momentmuse@gmail.com',
            'contact' => '+3240242983',
            'profile' => '',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
