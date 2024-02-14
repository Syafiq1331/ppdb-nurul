<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenjang extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'kuota'];

    public function santris()
    {
        return $this->hasMany(Santri::class);
    }

    public function question()
    {
        return $this->hasMany(Question::class);
    }

    public function Exam()
    {
        return $this->hasMany(Exam::class);
    }
}
