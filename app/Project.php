<?php

namespace App;

use App\Events\ProjectCreated;
// use App\Mail\ProjectCreated;
// use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];
    protected $dispatchesEvents = [
        'created' => ProjectCreated::class
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function addTask($task)
    {
        // Task::create([
        //     'project_id' => $this->id,
        //     'description' => $description
        // ]);

        $this->tasks()->create($task);
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}
