<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    //Jadi harus ada use HasFactory, use iluminatde blablabla


    public function user()
    {
        return $this->hasMany(User::class);
    }
}
