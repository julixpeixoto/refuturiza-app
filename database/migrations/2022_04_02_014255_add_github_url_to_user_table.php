<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function($table) {
            $table->string('github_url')->before('created_at')->nullable();
        });

        DB::table('users')
            ->where('email', 'ceo@refuturiza.com.br')
            ->update(['github_url' => 'https://github.com/torvalds']);
    }

    public function down()
    {
        Schema::table('users', function($table) {
            $table->dropColumn('github_url');
        });
    }
};
