<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Project extends Model
{
    use SoftDeletes;

    protected $table = 'projects';

    protected $guarded = [];

    protected $appends = ['masa_jabatan'];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->uuid = Str::uuid();
        });
    }

    public function getMasaJabatanAttribute()
    {
        if (!$this->start_date) {
            return null;
        }

        $startDate = Carbon::parse($this->start_date);
        $now = Carbon::now();

        return $startDate->diffInDays($now);
    }

    public function party()
    {
        return $this->belongsTo(Party::class, 'party_id');
    }

    public function periode()
    {
        return $this->belongsTo(Periode::class, 'periode_id');
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class, 'profile_id');
    }

    public function election_type()
    {
        return $this->belongsTo(ElectionType::class, 'election_type_id');
    }

    public function dapils()
    {
        return $this->hasMany(Dapil::class, 'project_id');
    }
}
