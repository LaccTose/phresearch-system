<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // import model User

class UserController extends Controller
{
    public function index()
    {
        // ดึงข้อมูลผู้ใช้ทั้งหมดจากฐานข้อมูล
        $users = User::all();

        // ส่งตัวแปร $users ไปที่ Blade
        return view('users.index', compact('users'));
    }
}
