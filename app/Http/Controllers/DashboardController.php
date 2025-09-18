<?php

namespace App\Http\Controllers;

use App\Models\Umsc;

class DashboardController extends Controller
{
    public function index()
    {
        $umscs = Umsc::all(); // ดึงข้อมูลมาแสดงในตาราง
        return view('dashboard', compact('umscs'));
    }
}
