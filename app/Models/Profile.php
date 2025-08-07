<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Profile extends Model
{
    use SoftDeletes;

    protected $table = 'profiles';

    protected $guarded = [];

    protected $appends = ['nama_lengkap'];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->uuid = Str::uuid();
        });
    }

    public function getNamaLengkapAttribute()
    {
        return trim(
            ($this->front_title ?? '') . ' ' .
            ($this->name ?? '') . ' ' .
            ($this->back_title ?? '')
        );
    }
}
