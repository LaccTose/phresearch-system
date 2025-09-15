<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบบันทึกข้อมูลรายงานการบริการ</title>
    <!--tailwindcss-->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-green-50">
    <div class="container mx-auto p-6">
        <form action="{{ route('umsc.store') }}" method="POST" id="umscForm" class="bg-white p-6 rounded-2xl shadow-lg">
            @csrf

            <!--หัวข้อระบบ-->
            <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-green-800 mb-4 text-center">
                ระบบบันทึกข้อมูลรายงานการให้บริการ</h1>
            <p class="text-lg text-green-700 mt-2 mb-10 text-center">แบบบันทึกรายงานผู้รับบริการคลินิกพิเศษส่งต่อ</p>

            <!-- ข้อมูลทั่วไป -->
            <fieldset class="border-t-4 border-green-700 p-4 rounded-lg mb-8 shadow-sm">
                <legend class="text-xl font-bold text-green-800 px-2">ข้อมูลทั่วไป</legend>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                    <div>

                    </div>

                    <div>
                        <label for="month" class="block text-gray-700 mb-1">เดือน
                            <span class="text-red-500">*</span>
                        </label>
                        <select id="specialClinic" name="specialClinic" required
                            class="w-full p-2 border border-gray-300 rounded-md">
                            @php
                                $specialClinics = [
                                    'ARV (Start)',
                                    'กุมารเวชกรรม',
                                    'จักษุวิทยา',
                                    'ผิวหนัง',
                                    'พัฒนาการเด็ก',
                                    'แพทย์แผนไทย',
                                    'สูตินรีเวชกรรม',
                                    'หู คอ จมูก',
                                    'อายุรศาสตร์ต่อมไร้ท่อและเมตาบอลิสม',
                                    'อายุรศาสตร์ทั่วไป',
                                    'อายุรศาสตร์โรคหัวใจ',
                                ];
                            @endphp

                            @foreach ($specialClinics as $clinic)
                                <option value="{{ $clinic }}">{{ $clinic }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!--ปีพ.ศ.-->
                    <div>
                        <label for="year" class="block text-gray-700 mb-1">ปี (พ.ศ.) <span
                                class="text-red-500">*</span></label>
                        <input type="number" id="year" name="year" required
                            class="w-full p-2 border border-gray-300 rounded-md" value="{{ date('Y') + 543 }}">
                    </div>
                </div>
            </fieldset>

            <!--ข้อมูลการให้บริการ-->
            <fieldset class="border-t-4 border-green-700 p-4 rounded-lg mb-8 shadow-sm">
                <legend class="text-xl font-bold text-green-800 px-2">ข้อมูลการให้บริการ</legend>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-4">

                    <!--1.จำนวนผู้รับบริการคลินิกพิเศษ (Walk In) (ผู้ป่วยที่เดินทางเข้ามารับการรักษาที่คลินิกพิเศษเอง)-->
                    <div class="col-span-1">
                        <label for=""
                            class="block text-base font-medium text-gray-700 mb-1"></label>
                        <div class="flex gap-2">
                            <input type="number" id="" name="" min="0" value="0"
                                class="w-1/2 bg-gray-100 p-2 border border-gray-300 rounded-md shadow-sm" readonly>
                        </div>
                    </div>

                    <!--2.จำนวนผู้รับบริการคลินิกพิเศษ (Refer In)-->
                    <div class="col-span-1">
                        <label for=""
                            class="block text-base font-medium text-gray-700 mb-1"></label>
                        <div class="flex gap-2">
                            <input type="number" id="" name="" min="0" value="0"
                                class="w-1/2 bg-gray-100 p-2 border border-gray-300 rounded-md shadow-sm" placeholder="ระบุตัวเลข">
                            <input type="number" id="" name="" min="0"
                                class="w-1/2 bg-gray-100 p-2 border border-gray-300 rounded-md shadow-sm" placeholder="ครั้ง">
                        </div>
                        <!--ระบุชื่อสถานพยาบาล-->
                        <div class="col-span-1">
                            <label for=""
                                class="block text-base font-medium text-gray-700 mb-1"></label>
                            <div class="flex gap-2">
                                <input type="text" id="" name=""
                                    class="w-full bg-gray-100 p-2 border border-gray-300 rounded-md shadow-sm"
                                    placeholder="ระบุชื่อสถานพยาบาล" readonly>
                            </div>
                        </div>
                    <!--เลือกจากฐานข้อมูลสถานพยาบาล-->    
                    <div>
                        <label for="healthCenter" class="block text-gray-700 mb-1">ศูนย์บริการสาธารณสุข <span
                                class="text-red-500">*</span></label>
                        <select id="healthCenter" name="healthCenter" required
                            class="w-full p-2 border border-gray-300 rounded-md">
                            @for ($i = 1; $i <= 69; $i++)
                                <option value="{{ $i }}">ศูนย์บริการสาธารณสุข {{ $i }}</option>
                            @endfor
                        </select>
                    </div> 

                        <div>
                        <label for="month" class="block text-gray-700 mb-1">เดือน
                            <span class="text-red-500">*</span>
                        </label>
                        <select id="specialClinic" name="specialClinic" required
                            class="w-full p-2 border border-gray-300 rounded-md">
                            @php
                                $specialClinics = [
                                    'โรงพยาบาลกลาง',
                                    'โรงพยาบาลตากสิน',
                                    'โรงพยาบาลเจริญกรุงประชารักษ์',
                                    'โรงพยาบาลหลวงพ่อทวีศักดิ์ ชุตินฺธโร อุทิศ',
                                    'โรงพยาบาลเวชการุณย์รัศมิ์',
                                    'โรงพยาบาลนคราภิบาล',
                                    'โรงพยาบาลราชพิพัฒน์',
                                    'โรงพยาบาลสิรินธร',
                                    'โรงพยาบาลผู้สูงอายุบางขุนเทียน',
                                    'โรงพยาบาลรัตนประชารักษ์',
                                    'โรงพยาบาลบางนากรุงเทพมหานคร',
                                    'ศูนย์บริการการแพทย์ฉุกเฉิน กรุงเทพมหานคร (ศูนย์เอราวัณ)',
                                    'โรงพยาบาลวชิรโรงพยาบาล คณะแพทยศาสตร์วชิรพยาบาล มหาวิทยาลัยนวมินทราธิราช',
                                    'โรงพยาบาลเลิดสิน',
                                    'โรงพยาบาลราชวิถี',
                                    'โรงพยาบาลพระมงกุฎเกล้า',
                                    'โรงพยาบาลภูมิพลอดุลยเดช',
                                    'โรงพยาบาลศิริราช',
                                    'โรงพยาบาลจุฬาลงกรณ์',
                                    'สถาบันสุขภาพเด็กแห่งชาติมหาราชินี'
                                    'โรงพยาบาลรามาธิบดี',
                                    'สถาบันราชานุกูล',
                                    'โรงพยาบาลยุวประสาทไวทโยปถัมภ์',
                                    'โรงพยาบาลพระนั่งเกล้า',
                                    'โรงพยาบาลเมตตาประชารักษ์ (วัดไร่ขิง)',
                                    'โรงพยาบาลบุรีรัมย์',
                                    'โรงพยาบาลเปาโล เกษตร',
                                    'โรงพยาบาลเปาโล โชคชัย 4',
                                    'โรงพยาบาลเกษมราษฏร์ บางแค',
                                    'โรงพยาบาลเกษมราษฏร์ รามคำแหง',
                                    'โรงพยาบาลกล้วยน้ำไท',
                                    'โรงพยาบาลมงกุฏวัฒนะ',
                                    'โรงพยาบาลส่งเสริมสุขภาพตำบลบางกระเจ้า',
                                    'โรงพยาบาลส่งเสริมสุขภาพตำบลหินโงม',
                                    'Swing คลินิก',
                                    'คลินิกเวชกรรมกล้วยน้ำไท',
                                    'คลินิกเวชกรรมอารีรักษ์',
                                    'พริบตาคลินิก'

                                ];
                            @endphp

                            @foreach ($specialClinics as $clinic)
                                <option value="{{ $clinic }}">{{ $clinic }}</option>
                            @endforeach
                        </select>
                    </div>
                    </div>

                    <!--3.จำนวนผู้รับบริการผ่านระบบ Teleconsult ทั้งหมด-->
                    <div class="col-span-1">
                        <label for=""
                            class="block text-base font-medium text-gray-700 mb-1"></label>
                        <div class="flex gap-2">
                            <input type="number" id="" name="" min="0" value="0"
                                class="w-1/2 bg-gray-100 p-2 border border-gray-300 rounded-md shadow-sm">
                            <input type="number" id="" name="" min="0" value="0"
                                class="w-1/2 bg-gray-100 p-2 border border-gray-300 rounded-md shadow-sm">
                        </div>
                    </div>

                    <!--4.จำนวนผู้รับบริการที่ต้องส่งรักษาต่อรพ. (Refer Out)-->
                    <div class="col-span-1">
                        <label for=""
                            class="block text-base font-medium text-gray-700 mb-1"></label>
                        <div class="flex gap-2">
                            <input type="number" id="" name="" min="0" value="0"
                                class="w-1/2 bg-gray-100 p-2 border border-gray-300 rounded-md shadow-sm" readonly>
                            <input type="number" id="" name="" min="0" value="0"
                                class="w-1/2 bg-gray-100 p-2 border border-gray-300 rounded-md shadow-sm">
                        </div>
                    </div>
                </div>
            </fieldset>

            <!---->
            <fieldset class="border-t-4 border-green-700 p-4 rounded-lg mb-8 shadow-sm">
                <legend class="text-xl font-bold text-green-800 px-2"></legend>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">

                </div>
            </fieldset>



        </form>
    </div>

</body>

</html>


<!--
1.จำนวนผู้รับบริการคลินิกพิเศษ (Walk In) (ผู้ป่วยที่เดินทางเข้ามารับการรักษาที่คลินิกพิเศษเอง)
    -ระบุตัวเลข
    -ครั้ง

2.จำนวนผู้รับบริการคลินิกพิเศษ (Refer In)
(ผู้ป่วยที่ได้รับการส่งต่อมาจาก ศบส. หรือสถานพยาบาลอื่น)
    -ระบุตัวเลข <input type="number">
    -ครั้ง <input type="number">
    - จำแนกตามหน่วยบริการ
        -ระบุชื่อสถานพยาบาล <select></select>
        -ระบุตัวเลข <input type="number">
        -ครั้ง <input type="number">
    
3.จำนวนผู้รับบริการผ่านระบบ Teleconsult ทั้งหมด
    - Teleconsult (ระหว่าง ศบส. กับ ศบส.) ให้คำปรึกษาระหว่าง ศบส.
        -ระบุตัวเลข
        -ครั้ง
    - Teleconsult (ระหว่าง ศบส. กับ รพ.) รับคำปรึกษาจากรพ.
        -ระบุตัวเลข
        -ครั้ง

4.จำนวนผู้รับบริการที่ต้องส่งรักษาต่อรพ. (Refer Out)
    รายละเอียดการส่งรักษาต่อ รพ.
    - ผู้ป่วย Walk In
        -ระบุตัวเลข
        -คน
    - ผู้ป่วยที่รับการส่งต่อจากศบส. Refer In
        -ระบุตัวเลข
        -คน
    - จำแนกตามหน่วยบริการ
        -ระบุชื่อสถานพยาบาล
        -ระบุตัวเลข
        -ครั้ง

**ระบุชื่อสถานพยาบาล** เป็น select ที่ดึงข้อมูลจากฐานข้อมูลสถานพยาบาลทั้งหมด โดยที่สามารถเลือกได้มากกว่า 1 (multiple select)
อาจจะทำเป็นต้องมีปุ่มเพิ่มแถว (Add Row) เพื่อให้สามารถเพิ่มสถานพยาบาลได้หลายแห่ง

พิมพ์หาชื่อสถานพยาบาลไม่เจอ ให้มีปุ่ม "เพิ่มสถานพยาบาลใหม่" เพื่อเปิด modal form สำหรับเพิ่มสถานพยาบาลใหม่
สามารถเพิ่มสถานพยาบาลใหม่ได้เลย โดยที่ไม่ต้องออกจากหน้าฟอร์มนี้
**อยากให้เพิ่มสถานพยาบาลได้ด้วยการพิมพ์หา เนื่องจากข้อมูลสถานพยาบาลมีจำนวนมาก
-->