<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'kelas', 'no_hp', 'alamat', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
