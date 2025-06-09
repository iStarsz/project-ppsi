<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAoqrObjectsTable extends Migration
{
    public function up()
    {
        Schema::create('aoqr_objects', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->json('image_url');
            $table->string('qr_image_url')->nullable();

            // Foreign key ke tabel categories
            $table->foreignId('category_id')
                  ->nullable()
                  ->constrained('categories')
                  ->onDelete('set null');

            $table->integer('view_count')->default(0);
            $table->boolean('is_active')->default(true);  // true = active, false = inactive

            // Data objek
            $table->string('name_object', 100);
            $table->string('location_object', 100);
            $table->text('description_object');

            $table->timestamps(0); // created_at, updated_at tanpa microtime
        });
    }

    public function down()
    {
        // Perbaikan: pastikan nama tabel benar
        Schema::dropIfExists('aoqr_objects');
    }
}
