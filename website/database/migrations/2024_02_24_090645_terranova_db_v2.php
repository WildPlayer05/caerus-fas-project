<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->string('ragSoc');
            $table->char('PIVA', 11)->nullable();
            $table->string('email')->unique();
            $table->string('phoneNumber')->unique();
            $table->char('CF', 16)->unique();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
        });

        Schema::create('supplier', function (Blueprint $table) {
            $table->id();
            $table->string("name")->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('IBAN')->unique();
            $table->boolean('authorized');
        });

        Schema::create('contractType', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idS');
            $table->foreign('idS')
                ->references('id')->on('supplier')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->enum('type', ['home', 'business']);
            $table->double('KWh', 5, 1)->nullable();
            $table->enum('energyType', ['E', 'G', 'EG']);
            $table->integer('minimumDuration')->nullable();
            $table->double('priceE', 5, 2)->nullable();
            $table->double('priceG', 5, 2)->nullable();
        });

        Schema::create('building', function (Blueprint $table) {
            $table->id();
            $table->string('city');
            $table->char('CAP', 5);
            $table->string('street');
            $table->integer('civicNumber');
        });

        Schema::create('consumption', function (Blueprint $table) {
            $table->unsignedBigInteger('idB');
            $table->foreign('idB')
                ->references('id')->on('building')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->date("date");
            $table->double('KW', 10, 2)->nullable();
            $table->double('mc', 10, 2)->nullable();
            $table->primary(['idB', 'date']);
        });

        Schema::create('contract', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idU');
            $table->foreign('idU')
                ->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('idB');
            $table->foreign('idB')
                ->references('id')->on('building')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('idT');
            $table->foreign('idT')
                ->references('id')->on('contractType')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->date("date");
            $table->boolean("rinovate");
            $table->enum('paymentType', ['CC', 'Transfer']);
        });

        Schema::create('OTP', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idU');
            $table->foreign('idU')
                ->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->integer('OTP');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
