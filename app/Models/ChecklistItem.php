<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChecklistItem extends Model
{
    protected $fillable = ['card_task_id', 'content', 'is_completed'];

    public function cardTask()
    {
        return $this->belongsTo(CardTask::class);
    }
}
