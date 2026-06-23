<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    /** @use HasFactory<\Database\Factories\JobPostsFactory> */
    use HasFactory;
    // 9. JobPost.php

    protected $fillable = [
        'company_id', 'category_id', 'title', 'description',
        'hours_per_day', 'location', 'gender', 'certificate',
        'work_type', 'status', 'start_date', 'end_date'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function applicants()
    {
        return $this->belongsToMany(User::class, 'applications')
                    ->withPivot('status', 'cover_letter', 'work_type', 'applied_at')
                    ->withTimestamps();
    }

}
