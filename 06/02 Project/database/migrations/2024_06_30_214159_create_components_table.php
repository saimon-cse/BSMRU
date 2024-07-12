<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComponentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('components', function (Blueprint $table) {
            $table->id();
            $table->string('component_code')->nullable();
            $table->string('name')->nullable();
            $table->string('model')->nullable();
            $table->string('image')->nullable();
            $table->string('category')->nullable();
            $table->integer('purchase_quantity')->nullable();
            $table->integer('issued_quantity')->nullable();
            $table->integer('available_quantity')->nullable();
            $table->float('unit_price')->nullable();
            $table->float('total_price')->nullable();
            $table->string('remarks')->nullable();
            $table->integer('rank');
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
        Schema::dropIfExists('components');
    }
}
