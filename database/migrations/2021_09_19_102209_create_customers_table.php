<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('code', 30)->nullable();;
            $table->string('name', 100);
            $table->string('phone', 11);
            $table->string('email', 50)->nullable();
            $table->string('address')->nullable();
            $table->foreignId('division_id')
                    ->nullable()
                    ->constrained('divisions')
                    ->onDelete('cascade');
            $table->foreignId('district_id')
                    ->nullable()
                    ->constrained('districts')
                    ->onDelete('cascade');
            $table->foreignId('thana_id')
                    ->nullable()
                    ->constrained('thanas')
                    ->onDelete('cascade');
            $table->foreignId('union_id')
                    ->nullable()
                    ->constrained('unions')
                    ->onDelete('cascade');       
            $table->text('profile_picture')->nullable();
            $table->string('thum_picture')->nullable();
            $table->string('username', 20);
            $table->string('password', 100);
            $table->string('status', 1)->default('p');
            $table->integer('otp', 6)->nullable();
            $table->string('save_by', 3);
            $table->string('updated_by', 3);
            $table->softDeletes();
            $table->string('ip_address', 17);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
