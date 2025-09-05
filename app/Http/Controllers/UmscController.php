<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Umsc;

class UmscController extends Controller
{
    public function create()
    {
        return view('umsc.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'healthCenter' => 'required',
            'month' => 'required',
            'year' => 'required|integer',
            'reporterName' => 'required|string',
            'reporterPosition' => 'required|string',
            'reporterPhone' => 'required|string',
        ]);

        Umsc::create($data);

        return redirect()->route('umsc.create')->with('success', 'บันทึกข้อมูลเรียบร้อยแล้ว');
    }
}
