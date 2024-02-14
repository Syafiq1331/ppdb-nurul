<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingYayasanController extends Controller
{
    public function visimisi()
    {
        return view('admin.setting-yayasan.index');
    }

    public function visimisiStore(Request $request)
    {
        return dd($request);
    }
}
