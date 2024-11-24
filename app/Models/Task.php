<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'status', 'project_id', 'parent_id'];

    // Üst Görev
    public function parent()
    {
        return $this->belongsTo(Task::class, 'parent_id');
    }

    // Alt Görevler
    public function children()
    {
        return $this->hasMany(Task::class, 'parent_id');
    }

    // Görev, bir projeye aittir
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
