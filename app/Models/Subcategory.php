<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subcategory extends Model
{
    use HasFactory;use SoftDeletes;
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'image',
        'price',
    ];

    /**
     * Get the parent category of the subcategory.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subsubcategories()
    {
        return $this->hasMany(SubSubCategory::class,'sub_category_id');
    }

    static public function getCategoryOfSubCategoryById($id=null)
    {
        if($id == null) return null;
        $SubCategory = SubCategory::where('id', $id)->first();
        $CategoryId = $SubCategory->category_id;
        return $CategoryId ? $CategoryId : null;
    }
}
