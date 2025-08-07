<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class IssuePhoto extends Model
{
    use SoftDeletes;

    protected $table = 'issue_photos';

    protected $guarded = [];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->uuid = Str::uuid();
        });
    }

    public function issue()
    {
        return $this->belongsTo(Issue::class, 'issue_id');
    }
}
