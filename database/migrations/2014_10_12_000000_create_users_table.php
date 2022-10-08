<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            $table->string('username')->unique();
            $table->string('password');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('rfid')->unique()->nullable();
            $table->string('code')->unique()->nullable();
            $table->boolean('admin')->default(false);
            $table->timestamps();
            $table->softDeletes();
            $table->rememberToken();
        });

        $password = Hash::make('admin');
        $datetime = Carbon::now();

        DB::statement("INSERT INTO users(username, password, name, email, rfid, code, admin, created_at, updated_at, deleted_at, remember_token)
                                  VALUES('admin', '$password', 'Admin', 'admin@check.com', 'RFID', 'code123', true, '$datetime', '$datetime', null, true)");
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
