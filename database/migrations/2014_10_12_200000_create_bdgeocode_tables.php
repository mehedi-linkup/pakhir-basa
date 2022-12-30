<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBdgeocodeTables extends Migration
{
    public function up()
    {
        DB::beginTransaction();

        Schema::create('divisions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('bn_name')->unique();
        });

        Schema::create('districts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('division_id')
                    ->constrained('divisions')
                    ->onDelete('cascade');
            $table->string('name')->unique();
            $table->string('bn_name')->unique();
        });

        Schema::create('thanas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('district_id')
                    ->constrained('districts')
                    ->onDelete('cascade');
            $table->string('name');
            $table->string('bn_name');
        });

        Schema::create('unions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('thana_id')
                    ->constrained('thanas')
                    ->onDelete('cascade');
            $table->string('name');
            $table->string('bn_name');
        });

        DB::commit();
    }

    public function down()
    {
        Schema::dropIfExists('unions');
        Schema::dropIfExists('thanas');
        Schema::dropIfExists('districts');
        Schema::dropIfExists('divisions');
    }
}