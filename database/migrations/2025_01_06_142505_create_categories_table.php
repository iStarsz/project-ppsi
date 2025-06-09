<?php

// database/migrations/2025_01_06_000001_create_categories_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->timestamps(0);  // created_at, updated_at
        });

        // Insert dummy data
        DB::table('categories')->insert([
            ['name' => 'Relief'],
            ['name' => 'Mozaik'],
            ['name' => 'Bangunan Sejarah'],
            ['name' => 'Artefak Kerajaan'],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
