@extends('layouts.app')
@section('content')
    <h1>รายงานรูปแบบตาราง</h1>
    <a href="{{ route('umsc.create') }}">ระบบบันทึกข้อมูลรายงานการให้บริการ</a>
    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>name</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($umscs as $umsc)
                <tr>
                    <td>{{ $umsc->healthCenter }}</td>
                    <td>
                        <a href="{{ route('umsc.edit', $umsc->id) }}">แก้ไข</a>
                        <form action="{{ route('umsc.destroy', $umsc->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('ลบรายการนี้หรือไม่?')">ลบ</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
