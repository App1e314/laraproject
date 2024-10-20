<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('listings', function (Blueprint $table) {
        $table->foreignIdFor(
            \App\Models\User::class,
            'by_user_id'
        )->constrained('users');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('listing', function (Blueprint $table) {
            //
        });
    }
};
