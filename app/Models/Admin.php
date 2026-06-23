<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    /** @use HasFactory<\Database\Factories\AdminsFactory> */
    use HasFactory;

    protected $fillable = ['name', 'image', 'email', 'phone', 'password', 'region_id'];

    protected $hidden = ['password'];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

}
