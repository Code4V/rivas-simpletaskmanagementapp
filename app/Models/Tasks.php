<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Database\Factories\TasksFactory;

class Tasks extends Model
{
    use HasFactory;

    protected $table = 'tasks'; 

    protected $fillable = [
        'title',
        'description',
    ];

    protected function casts(): array {
        return [
            'duedate' => 'datetime',
        ];
    }

    protected static function newFactory() 
    {
        return TasksFactory::new();
    }

}
