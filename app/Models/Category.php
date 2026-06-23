<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoriesFactory> */
    use HasFactory;
    protected $fillable = ['name', 'type', 'parent_id'];

    // العلاقة مع نفسها
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function jobPosts()
    {
        return $this->hasMany(JobPost::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_categories');
    }

}
