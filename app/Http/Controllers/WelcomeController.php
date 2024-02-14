<?php

namespace App\Http\Controllers;

use App\Models\Jenjang;
use App\Models\KelebihanYayasan;
use App\Models\ProfileGuru;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $jenjang = Jenjang::all();
        $profileGuru = ProfileGuru::all();
        $color =
            ['emerald', 'teal', 'orange', 'amber', 'lime', 'cyan', 'sky', 'indigo', 'fuchsia', 'rose'];
        $data = KelebihanYayasan::all();
        return view('welcome', compact('jenjang', 'color', 'data', 'profileGuru'));
    }
}
