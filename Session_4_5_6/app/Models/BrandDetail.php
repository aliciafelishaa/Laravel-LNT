<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BrandDetail extends Model
{
    protected $fillable = ['description', 'brand_id'];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
