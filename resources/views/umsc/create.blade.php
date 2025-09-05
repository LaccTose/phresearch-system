<!-- resources/views/umsc/create.blade.php -->
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบบันทึกข้อมูลรายงานการให้บริการ</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-50">
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold text-green-800 mb-6 text-center">ระบบบันทึกข้อมูลรายงานการให้บริการ</h1>

        <form action="{{ route('umsc.store') }}" method="POST" id="umscForm" class="bg-white p-6 rounded-2xl shadow-lg">
            @csrf

            <!-- ข้อมูลทั่วไป -->
            <fieldset class="border-t-4 border-green-700 p-4 rounded-lg mb-6">
                <legend class="text-xl font-bold text-green-800 px-2">ข้อมูลทั่วไป</legend>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                    <div>
                        <label for="healthCenter" class="block text-gray-700 mb-1">ศูนย์บริการสาธารณสุข <span class="text-red-500">*</span></label>
                        <select id="healthCenter" name="healthCenter" required class="w-full p-2 border border-gray-300 rounded-md">
                            @for($i = 1; $i <= 69; $i++)
                                <option value="{{ $i }}">ศูนย์บริการสาธารณสุข {{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div>
                        <label for="month" class="block text-gray-700 mb-1">เดือน <span class="text-red-500">*</span></label>
                        <select id="month" name="month" required class="w-full p-2 border border-gray-300 rounded-md">
                            @php
                                $months = ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'];
                            @endphp
                            @foreach($months as $month)
                                <option value="{{ $month }}">{{ $month }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="year" class="block text-gray-700 mb-1">ปี (พ.ศ.) <span class="text-red-500">*</span></label>
                        <input type="number" id="year" name="year" required class="w-full p-2 border border-gray-300 rounded-md" value="{{ date('Y') + 543 }}">
                    </div>
                </div>
            </fieldset>

            <!-- ข้อมูลผู้รายงาน -->
            <fieldset class="border-t-4 border-green-700 p-4 rounded-lg mb-6">
                <legend class="text-xl font-bold text-green-800 px-2">ข้อมูลผู้รายงาน</legend>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                    <div>
                        <label for="reporterName" class="block text-gray-700 mb-1">ชื่อ-สกุล <span class="text-red-500">*</span></label>
                        <input type="text" id="reporterName" name="reporterName" required class="w-full p-2 border border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="reporterPosition" class="block text-gray-700 mb-1">ตำแหน่ง <span class="text-red-500">*</span></label>
                        <input type="text" id="reporterPosition" name="reporterPosition" required class="w-full p-2 border border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="reporterPhone" class="block text-gray-700 mb-1">เบอร์โทรศัพท์ <span class="text-red-500">*</span></label>
                        <input type="tel" id="reporterPhone" name="reporterPhone" required class="w-full p-2 border border-gray-300 rounded-md">
                    </div>
                </div>
            </fieldset>

            <button type="submit" class="bg-green-700 text-white px-6 py-3 rounded-lg hover:bg-green-800 transition">
                บันทึกข้อมูล
            </button>
        </form>
    </div>
</body>
</html>
