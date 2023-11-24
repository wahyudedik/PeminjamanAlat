<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'job', 'no_hp', 'alamat', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
