<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Addsmtpconfigaratinsetting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pos_settings', function (Blueprint $table) {
            $table->tinyInteger('smtp_check')->default(0)->after('title');
            $table->string('mail_transport')->nullable()->after('smtp_check');
            $table->string('mail_host')->nullable()->after('mail_transport');
            $table->string('mail_port')->nullable()->after('mail_host');
            $table->string('mail_encryption')->nullable()->after('mail_port');
            $table->string('mail_username')->nullable()->after('mail_encryption');
            $table->string('mail_password')->nullable()->after('mail_username');
            $table->string('mail_from_name')->nullable()->after('mail_password');
            $table->string('mail_from_address')->nullable()->after('mail_from_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pos_settings', function (Blueprint $table) {
            //
        });
    }
}
