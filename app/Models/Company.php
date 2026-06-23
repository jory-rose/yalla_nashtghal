<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /** @use HasFactory<\Database\Factories\CompaniesFactory> */
    use HasFactory;
    protected $fillable = [
        'name', 'identity', 'image', 'phone', 'email',
        'commercial_record', 'license', 'password',
        'region_id', 'joined_at'
    ];

    protected $hidden = ['password'];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function jobPosts()
    {
        return $this->hasMany(JobPost::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

}
