<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('code', 18);
            $table->string('name', 100);
            $table->string('slug', 130);
            $table->foreignId('category_id')
                    ->constrained('categories')
                    ->onDelete('cascade');
            $table->foreignId('sub_category_id')->nullable() 
                    ->constrained('sub_categories')
                    ->onDelete('cascade');
            $table->foreignId('child_category_id')->nullable() 
                ->constrained('child_categories')
                ->onDelete('cascade');  
            $table->decimal('price', 18,2);
            $table->text('image');
            $table->text('thum_image')->nullable();
            $table->decimal('discount', 18,2)->nullable();
            $table->foreignId('size_id')->nullable()
                    ->constrained('sizes')
                    ->onDelete('cascade');
            $table->foreignId('color_id')->nullable()
                    ->constrained('colors')
                    ->onDelete('cascade');
            $table->foreignId('brand_id')->nullable()
                    ->constrained('brands')
                    ->onDelete('cascade');      
            $table->text('short_details')->nullable();
            $table->text('description')->nullable();
            $table->string('is_popular',1)->nullable();
            $table->string('is_offer',1)->nullable();
            $table->string('is_arrival',1)->nullable();
            $table->string('status', 1)->default('A');
            $table->string('save_by', 3);
            $table->string('update_by', 3)->nullable();
            $table->string('ip_address', 15);
            $table->softDeletes();
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
        Schema::dropIfExists('products');
    }
}
