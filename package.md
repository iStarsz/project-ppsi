### Admin
```php

```


### Category
```php
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


<?php

// app/Models/Category.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    // Relationship with Objects
    public function objects()
    {
        return $this->hasMany(Object::class);
    }
}


<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller; 

class CategoryController extends Controller
{
    // Fungsi untuk menampilkan semua kategori
    public function index()
    {
        $categories = Category::all(); // Mengambil semua kategori
        return response()->json($categories);
    }

    // Fungsi untuk menampilkan kategori berdasarkan ID
    public function show($id)
    {
        $category = Category::find($id); // Mencari kategori berdasarkan ID

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        return response()->json($category);
    }

    // Fungsi untuk membuat kategori baru
    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'name' => 'required|string|max:100',
        ]);

        // Menyimpan kategori baru
        $category = Category::create([
            'name' => $request->name,
        ]);

        return response()->json([
            'message' => 'Category created successfully',
            'category' => $category,
        ], 201);
    }

    // Fungsi untuk mengupdate kategori
    public function update(Request $request, $id)
    {
        // Validasi data input
        $request->validate([
            'name' => 'required|string|max:100',
        ]);

        // Mencari kategori berdasarkan ID
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        // Mengupdate kategori
        $category->update([
            'name' => $request->name,
        ]);

        return response()->json([
            'message' => 'Category updated successfully',
            'category' => $category,
        ]);
    }

    // Fungsi untuk menghapus kategori
    public function destroy($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        // Menghapus kategori
        $category->delete();

        return response()->json([
            'message' => 'Category deleted successfully',
        ]);
    }
}


```


### Aoqr Object
```php
<?php

// database/migrations/2025_01_06_142505_create_objects_table.php

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
            $table->foreignId('category_id')->nullable()->constrained()->onDelete('set null');
            $table->integer('view_count')->default(0);
            $table->timestamps(0); // created_at, updated_at

             // Add is_active column
             $table->boolean('is_active')->default(true);  // true = active, false = inactive

            // English fields
            $table->string('name_english', 100)->notNull();
            $table->string('location_english', 100)->notNull();
            $table->text('description_english')->notNull();

            // Indonesian fields
            $table->string('name_indonesian', 100)->nullable();
            $table->string('location_indonesian', 100)->nullable();
            $table->text('description_indonesian')->nullable();

            // Simplified Chinese fields
            $table->string('name_chinese_simp', 100)->nullable();
            $table->string('location_chinese_simp', 100)->nullable();
            $table->text('description_chinese_simp')->nullable();

            // Japanese fields
            $table->string('name_japanese', 100)->nullable();
            $table->string('location_japanese', 100)->nullable();
            $table->text('description_japanese')->nullable();

            // Korean fields
            $table->string('name_korean', 100)->nullable();
            $table->string('location_korean', 100)->nullable();
            $table->text('description_korean')->nullable();

            // Russian fields
            $table->string('name_russian', 100)->nullable();
            $table->string('location_russian', 100)->nullable();
            $table->text('description_russian')->nullable();

            // Spanish fields
            $table->string('name_spanish', 100)->nullable();
            $table->string('location_spanish', 100)->nullable();
            $table->text('description_spanish')->nullable();

            // Dutch fields
            $table->string('name_dutch', 100)->nullable();
            $table->string('location_dutch', 100)->nullable();
            $table->text('description_dutch')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('objects');
    }
}


<?php

// app/Models/AoqrObject.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AoqrObject extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $incrementing = false; // because we are using UUID

    protected $fillable = [
        'image_url',
        'qr_image_url',
        'category_id',
        'view_count',
        'is_active',
        'name_english',
        'location_english',
        'description_english',
        'name_indonesian',
        'location_indonesian',
        'description_indonesian',
        'name_chinese_simp',
        'location_chinese_simp',
        'description_chinese_simp',
        'name_japanese',
        'location_japanese',
        'description_japanese',
        'name_korean',
        'location_korean',
        'description_korean',
        'name_russian',
        'location_russian',
        'description_russian',
        'name_spanish',
        'location_spanish',
        'description_spanish',
        'name_dutch',
        'location_dutch',
        'description_dutch',
    ];

    protected $casts = [
        'image_url' => 'array',
    ];

    // Relationship with Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

<?php

// /app/Http/Controllers/Admin/AoqrObjectController.php

namespace App\Http\Controllers\Admin;

use App\Models\AoqrObject;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Routing\Controller; 

class AoqrObjectController extends Controller
{
    // Fungsi untuk menampilkan semua AoqrObject
    public function index()
    {
        $aoqrObjects = AoqrObject::all();
        return response()->json($aoqrObjects);
    }

    // Fungsi untuk menampilkan AoqrObject berdasarkan ID
    public function show($id)
    {
        $aoqrObject = AoqrObject::find($id);

        if (!$aoqrObject) {
            return response()->json(['message' => 'AoqrObject not found'], 404);
        }

        return response()->json($aoqrObject);
    }

    // Fungsi untuk membuat AoqrObject baru
    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'image_url' => 'required|json',
            'category_id' => 'nullable|exists:categories,id',
            'name_english' => 'required|string|max:100',
            'location_english' => 'required|string|max:100',
            'description_english' => 'required|string',
            'is_active' => 'nullable|boolean',
        ]);

        // Menyimpan AoqrObject baru
        $aoqrObject = AoqrObject::create($request->all());

        return response()->json([
            'message' => 'AoqrObject created successfully',
            'aoqrObject' => $aoqrObject,
        ], 201);
    }

    // Fungsi untuk mengupdate AoqrObject
    public function update(Request $request, $id)
    {
        // Validasi data input
        $request->validate([
            'image_url' => 'required|json',
            'category_id' => 'nullable|exists:categories,id',
            'name_english' => 'required|string|max:100',
            'location_english' => 'required|string|max:100',
            'description_english' => 'required|string',
            'is_active' => 'nullable|boolean',
        ]);

        // Mencari AoqrObject berdasarkan ID
        $aoqrObject = AoqrObject::find($id);

        if (!$aoqrObject) {
            return response()->json(['message' => 'AoqrObject not found'], 404);
        }

        // Mengupdate AoqrObject
        $aoqrObject->update($request->all());

        return response()->json([
            'message' => 'AoqrObject updated successfully',
            'aoqrObject' => $aoqrObject,
        ]);
    }

    // Fungsi untuk menghapus AoqrObject
    public function destroy($id)
    {
        $aoqrObject = AoqrObject::find($id);

        if (!$aoqrObject) {
            return response()->json(['message' => 'AoqrObject not found'], 404);
        }

        // Menghapus AoqrObject
        $aoqrObject->delete();

        return response()->json([
            'message' => 'AoqrObject deleted successfully',
        ]);
    }

    // Fungsi untuk generate QR Code untuk AoqrObject
    public function generateQRCode($id)
    {
        $aoqrObject = AoqrObject::find($id);

        if (!$aoqrObject) {
            return response()->json(['message' => 'AoqrObject not found'], 404);
        }

        // Generate QR code berdasarkan id AoqrObject
        $qrCode = QrCode::size(200)->generate(route('aoqr_objects.show', $aoqrObject->id));

        return response()->json([
            'message' => 'QR Code generated successfully',
            'qr_code' => $qrCode,
        ]);
    }
}



```