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
        DB::table('users')->insert(
            array(
                'name' => 'Mr. CEO',
                'email' => 'ceo@refuturiza.com.br',
                'password' => '$2a$12$QLgaNwnkiLmqq3IyU2N5HeOg5L1qLXtsI71T5SoHztjAf4BOuW8um'
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_data');
    }
};
