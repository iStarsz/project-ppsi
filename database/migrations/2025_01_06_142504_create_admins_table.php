<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class CreateAdminsTable extends Migration
{
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->boolean('isSuperAdmin')->default(false); // Tambahin kolom ini
            $table->timestamps(0);  // created_at, updated_at
        });

        // Insert data admin utama dengan isSuperAdmin true
        DB::table('admins')->insert([
            'email' => 'adminswrupa@admin.com',
            'password' => Hash::make('adminmaulogin'),
            'isSuperAdmin' => true, // Admin utama jadi super admin
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
