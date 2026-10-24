<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    protected $fillable = [
        'name',
        'email',
        'course_id',
        'user_id',
    ];

    // Each student belongs to one course
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    // Each student was created by one user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
