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
        // Schema::table('site_items', function (Blueprint $table) {
        //     $table->foreign(['item_id'])
        //         ->references('id')->on('products')
        //         ->onDelete('cascade')
        //         ->onUpdate('cascade')
        //         ->where('source', 'App\Models\Product');

        //     // Foreign key to blogs
        //     $table->foreign(['item_id'])
        //         ->references('id')->on('blogs')
        //         ->onDelete('cascade')
        //         ->onUpdate('cascade')
        //         ->where('source', 'App\Models\Blog');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_items', function (Blueprint $table) {
            $table->dropForeign(['item_id']);
        });
    }
};
