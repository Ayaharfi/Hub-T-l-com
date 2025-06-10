<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['task_id', 'content'];

    public function Task()
    {
        return $this->belongsTo(Task::class);
    }
}
