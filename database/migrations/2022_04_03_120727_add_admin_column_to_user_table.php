<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function($table) {
            $table->boolean('admin')->after('password')->default(false);
        });

        DB::table('users')
            ->where('email', 'ceo@refuturiza.com.br')
            ->update(['admin' => true]);
    }

    public function down()
    {
        Schema::table('users', function($table) {
            $table->dropColumn('admin');
        });
    }
};
