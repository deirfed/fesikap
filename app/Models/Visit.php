<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Visit extends Model
{
    use SoftDeletes;

    protected $table = 'visits';

    protected $guarded = [];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->uuid = Str::uuid();
        });
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function visit_type()
    {
        return $this->belongsTo(VisitType::class, 'visit_type_id');
    }

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'desa_id');
    }

    public function visit_photos()
    {
        return $this->hasMany(VisitPhoto::class, 'visit_id');
    }

    public function issues()
    {
        return $this->hasMany(Issue::class, 'visit_id');
    }
}
