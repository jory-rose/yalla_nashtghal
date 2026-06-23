<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{

    protected $table = 'job_request_user';

    protected $fillable = [
        'user_id', 'job_post_id', 'status',
        'cover_letter', 'work_type', 'applied_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jobPost()
    {
        return $this->belongsTo(JobPost::class);
    }

}
