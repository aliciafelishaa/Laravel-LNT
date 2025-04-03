<?php

namespace App\Models;

use App\Http\Controllers\BrandController;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Brand extends Model
{
    protected $fillable = ['name'];


    public function products(): HasMany
    {
        return $this->hasMany(Brand::class);
    }

    public function detail(): HasOne
    {
        return $this->hasOne(BrandDetail::class);
    }
}
