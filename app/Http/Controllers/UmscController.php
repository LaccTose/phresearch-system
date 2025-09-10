<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Umsc;
//use Illuminate\Support\Facades\Http;
//use App\Http\Requests\StoreUmscRequest;
class UmscController extends Controller
{
    // แสดงฟอร์ม
    public function create()
    {
        // ส่ง array ของบริการไปให้ Blade ใช้ @foreach
        $services = [
            "การตรวจรักษาโรคทั่วไป",
            "การตรวจรักษาทันตกรรม",
            "การตรวจสุขภาพ",
            "การให้คำปรึกษาด้านสุขภาพ",
            "การเยี่ยมบ้าน",
            "การตรวจทางห้องปฏิบัติการ",
            "การฉีดวัคซีน",
            "การตรวจครรภ์",
            "อื่น ๆ (โปรดระบุ)",
        ];

        return view('umsc.create', compact('services'));
    }

    // บันทึกข้อมูล
    public function store(Request $request)
    {
        $data = $request->validate([
            'healthCenter' => 'required',
            'month' => 'required',
            'year' => 'required|integer',
            'reporterName' => 'required|string',
            'reporterPosition' => 'required|string',
            'reporterPhone' => 'required|string',
            'people.*' => 'nullable|integer|min:0',
            'times.*' => 'nullable|integer|min:0',
            'linePeople.*' => 'nullable|integer|min:0',
            'lineTimes.*' => 'nullable|integer|min:0',
            'othersSpecify' => 'nullable|string',
            'lineOthersSpecify' => 'nullable|string',
        ]);

        // เก็บข้อมูลแบบ JSON
        $umsc = new Umsc();
        $umsc->healthCenter = $data['healthCenter'];
        $umsc->month = $data['month'];
        $umsc->year = $data['year'];
        $umsc->reporterName = $data['reporterName'];
        $umsc->reporterPosition = $data['reporterPosition'];
        $umsc->reporterPhone = $data['reporterPhone'];
        $umsc->people = json_encode($data['people'] ?? []);
        $umsc->times = json_encode($data['times'] ?? []);
        $umsc->linePeople = json_encode($data['linePeople'] ?? []);
        $umsc->lineTimes = json_encode($data['lineTimes'] ?? []);
        $umsc->othersSpecify = $data['othersSpecify'] ?? null;
        $umsc->lineOthersSpecify = $data['lineOthersSpecify'] ?? null;
        $umsc->save();

        return redirect()->route('umsc.create')->with('success', 'บันทึกข้อมูลสำเร็จแล้ว ✅');
    }
}

