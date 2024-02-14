<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $table = 'exams';

    protected $fillable = [
        'exam_name', 'jenjang_id'
    ];

    protected $casts = [
        'exam_name' => 'string',
    ];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function jenjang()
    {
        return $this->belongsTo(Jenjang::class);
    }
}
