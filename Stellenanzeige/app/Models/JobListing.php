<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobListing extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'company_id',
        'location',
        'description',
        'type',
        'salary',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_job_listing');
    }
}
