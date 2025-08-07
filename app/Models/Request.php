<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Request extends Model
{
    use SoftDeletes;

    protected $table = 'requests';

    protected $guarded = [];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->uuid = Str::uuid();
        });
    }

    public static function generateTicket($request_type_id)
    {
        // Ambil data tipe request
        $request_type = RequestType::findOrFail($request_type_id);

        // Ambil entry terakhir berdasarkan request_type_id dan urutan angka terbesar di ticket
        $lastEntry = Request::where('request_type_id', $request_type_id)
            ->where('ticket', 'like', $request_type->code . '-%')
            ->orderBy('ticket', 'desc')
            ->first();

        // Ambil nomor urut terakhir dari ticket
        if ($lastEntry && preg_match('/(\d{6})$/', $lastEntry->ticket, $match)) {
            $nextNumber = (int) $match[1] + 1;
        } else {
            $nextNumber = 1;
        }

        // Format ticket, contoh: FEAT-000001
        $formattedTicket = $request_type->code . '-' . str_pad($nextNumber, 6, '0', STR_PAD_LEFT);

        return $formattedTicket;
    }

    public function request_type()
    {
        return $this->belongsTo(RequestType::class, 'request_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
