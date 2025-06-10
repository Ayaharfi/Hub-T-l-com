<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title', 'status', 'description', 
        'checklist', 'comments', 'members', 
        'attachments', 'due_date'
    ];

    protected $casts = [
        'checklist' => 'array',
        'comments' => 'array',
        'members' => 'array',
        'attachments' => 'array',
        'due_date' => 'date'
    ];
}
