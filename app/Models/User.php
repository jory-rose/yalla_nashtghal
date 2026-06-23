<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon; 

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'first_name', 'father_name', 'last_name',
        'image', 'phone', 'email', 'password',
        'birth_date', 'gender', 'marital_status',
        'health_status', 'certificate',
        'skills', 'cv',
    ];

    protected $hidden = ['password'];

    protected $casts = [
        'skills'     => 'array',
        'birth_date' => 'date',
    ];

    protected $appends = ['age'];

    public function getAgeAttribute()
    {
        return Carbon::parse($this->birth_date)->age;
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'user_categories');
    }

    public function applications()
    {
        return $this->belongsToMany(JobPost::class, 'applications')
                    ->withPivot('status', 'cover_letter', 'work_type', 'applied_at')
                    ->withTimestamps();
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }


    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}







