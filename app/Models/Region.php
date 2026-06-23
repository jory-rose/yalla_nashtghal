<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    /** @use HasFactory<\Database\Factories\RegionsFactory> */
    use HasFactory;

    protected $fillable = ['name', 'city_id'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function companies()
    {
        return $this->hasMany(Company::class);
    }

    public function admin()
    {
        return $this->hasOne(Admin::class);
    }
}
