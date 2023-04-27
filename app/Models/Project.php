<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Project extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'title',
        'description',
        'slug',
        'url',
        'date',
        'type_id',
    ];
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    public function technologies()
    {
        return $this->belongsToMany(Technology::class);
    }
    public function getTechnologyIds()
    {
        return $this->technologies->pluck('id')->all();
    }
    public function getRelatedProjects()
    {
        return $this->type->projects()->where('id', '!=', $this->id)->get();
    }
}
