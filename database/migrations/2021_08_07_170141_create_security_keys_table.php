<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSecurityKeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('security_keys', function (Blueprint $table) {
            $table->id();
            $table->char('uuid', 36)->unique();
            $table->unsignedInteger('user_id');
            $table->string('name');
            $table->text('public_key_id');
            $table->text('public_key');
            $table->char('aaguid', 36)->nullable();
            $table->string('type');
            $table->json('transports');
            $table->string('attestation_type');
            $table->json('trust_path');
            $table->text('user_handle');
            $table->unsignedInteger('counter');
            $table->json('other_ui')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('security_keys');
    }
}