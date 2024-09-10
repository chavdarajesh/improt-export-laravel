<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryPriceHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_price_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sub_sub_category_id')->constrained('sub_sub_categories')->onDelete('cascade')->nullable();
            $table->string('price_inr')->nullable();
            $table->string('price_usd')->nullable();
            $table->timestamp('changed_at');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_price_histories');
    }
}
