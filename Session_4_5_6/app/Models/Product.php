<?php

namespace App\Models;

use App\Http\Controllers\ProductController;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable = [
        'Name', 'Description', 'Stock', 'Price', 'Production_Date', 'brand_id'

    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
