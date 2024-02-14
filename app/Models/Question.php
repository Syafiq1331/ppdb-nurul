<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $table = 'questions';

    protected $fillable = [
        'exam_id',
        'question_text',
        'answer',
        'jenjang_id'
    ];

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    public function choices()
    {
        return $this->hasMany(Choice::class);
    }

    public function canDelete()
    {
        // Cek apakah ada relasi dengan tabel lain (contoh: Choice)
        return $this->choices()->count() === 0;
    }

    public function jenjang()
    {
        return $this->belongsTo(Jenjang::class);
    }
}
