<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelebihanYayasan extends Model
{
    use HasFactory;

    protected $table = 'kelebihan_yayasan';

    protected $fillable = [
        'title',
        'desc',
        'icon'
    ];
}
