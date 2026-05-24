<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';

    protected $primaryKey = 'id';

    protected $guarded = ['created_at', 'updated_at'];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'nidn', 'nidn');
    }

    public function KRS()
    {
        return $this->hasMany(KRS::class, 'id_jadwal', 'id');
    }
}
