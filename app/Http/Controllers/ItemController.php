<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    // แสดงรายการทั้งหมด (Index)
    public function index()
    {
        $items = Item::all();
        return view('items.index', compact('items'));
    }

    // แสดงฟอร์มสร้างใหม่
    public function create()
    {
        return view('items.create');
    }

    // บันทึกข้อมูลใหม่
    public function store(Request $request)
    {
        Item::create($request->all());
        return redirect()->route('items.index');
    }

    // แสดงฟอร์มแก้ไข (Edit)
    public function edit($id)
    {
        $item = Item::findOrFail($id);
        return view('items.edit', compact('item'));
    }

    // อัพเดตข้อมูลจากฟอร์มแก้ไข
    public function update(Request $request, $id)
    {
        $item = Item::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('items.index');
    }

    // ลบข้อมูล
    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();
        return redirect()->route('items.index');
    }
}
