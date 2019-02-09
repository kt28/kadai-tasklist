<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advance extends Model
{
    protected $fillable = ['summary', 'progress', 'date', 'task_id', 'confirmed'];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
