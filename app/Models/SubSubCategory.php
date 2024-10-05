<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubSubCategory extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'sub_category_id',
        'category_id',
        'name',
        'slug',
        'description',
        'image',
        'price_inr',
        'price_usd',
    ];

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function priceHistory()
    {
        return $this->hasMany(CategoryPriceHistory::class);
    }

    static public function getSubCategoryOfSubCategoryById($id=null)
    {
        if($id == null) return null;
        $SubSubCategory = SubSubCategory::where('id', $id)->first();
        $subCategoryId = $SubSubCategory->subCategory->id;
        return $subCategoryId ? $subCategoryId : null;
    }

    static public function getCategoryOfSubCategoryById($id=null)
    {
        if($id == null) return null;
        $SubSubCategory = SubSubCategory::where('id', $id)->first();
        $CategoryId = $SubSubCategory->subCategory->category_id;
        return $CategoryId ? $CategoryId : null;
    }
}
