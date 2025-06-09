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
        'id',
        'image_url',
        'qr_image_url',
        'category_id',
        'view_count',
        'is_active',
        'name_object',
        'location_object',
        'description_object',
        
        
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
