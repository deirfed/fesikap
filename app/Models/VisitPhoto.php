<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class VisitPhoto extends Model
{
    use SoftDeletes;

    protected $table = 'visit_photos';

    protected $guarded = [];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->uuid = Str::uuid();
        });
    }

    public function visit()
    {
        return $this->belongsTo(Visit::class, 'visit_id');
    }
}
