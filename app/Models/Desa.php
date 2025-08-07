<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Desa extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'desa';

    protected $guarded = [];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->uuid = Str::uuid();
        });
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function tps()
    {
        return $this->hasMany(TPS::class);
    }
}
