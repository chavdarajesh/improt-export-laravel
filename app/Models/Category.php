<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name',
        'status',
        'is_premium',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }


    public function getCategory()
    {
        return Category::where('status', 1)->get();
    }

}
