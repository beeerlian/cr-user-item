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
        Schema::table('users', function (Blueprint $table) {
            $table->string('address')->after('email');
            $table->string('phone')->after('address');
            $table->string('role')->after('phone');
            $table->string('identity_type')->after('role');
            $table->string('identity_number')->after('identity_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('address');
            $table->dropColumn('phone');
            $table->dropColumn('role');
            $table->dropColumn('identity_type');
            $table->dropColumn('identity_number');
        });
    }
};
