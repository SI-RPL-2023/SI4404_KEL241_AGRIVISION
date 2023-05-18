<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('market_maping', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('provinsi_id')->nullable();
            $table->foreign('provinsi_id')->references('id')->on('provinsi')->onDelete('cascade');

            $table->unsignedBigInteger('kota_id')->nullable();
            $table->foreign('kota_id')->references('id')->on('kota')->onDelete('cascade');

            $table->unsignedBigInteger('kecamatan_id')->nullable();
            $table->foreign('kecamatan_id')->references('id')->on('kecamatan')->onDelete('cascade');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->char('place_code');

            $table->char('title');
            $table->text('description');
            $table->bigInteger('number');
            $table->char('status');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::dropIfExists('market_maping');
        Schema::enableForeignKeyConstraints();
    }
};
