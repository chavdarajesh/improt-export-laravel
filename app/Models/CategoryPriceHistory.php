<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryPriceHistory extends Model
{
    use HasFactory;use SoftDeletes;

    protected $fillable = [
        'sub_sub_category_id',
        'price_inr',
        'price_usd',
    ];
}
