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
                                    'ชื่อสถานพยาบาล',
                                    'ศูนย์บริการสาธารณสุข 1 สะพานมอญ',
                                    'ศูนย์บริการสาธารณสุข 2 วัดมักกะสัน',
                                    'ศูนย์บริการสาธารณสุข 3 บางซื่อ',
                                    'ศูนย์บริการสาธารณสุข 4 ดินแดง',
                                    'ศูนย์บริการสาธารณสุข 5 จุฬาลงกรณ์',
                                    'ศูนย์บริการสาธารณสุข 6 สโมสรวัฒนธรรมหญิง',
                                    'ศูนย์บริการสาธารณสุข 7 บุญมีปุรุราชรังสรรค์',
                                    'ศูนย์บริการสาธารณสุข 8 บุญรอด รุ่งเรือง',
                                    'ศูนย์บริการสาธารณสุข 9 ประชาธิปไตย',
                                    'ศูนย์บริการสาธารณสุข 10 สุขุมวิท',
                                    'ศูนย์บริการสาธารณสุข 11 ประดิพัทธ์',
                                    'ศูนย์บริการสาธารณสุข 12 จันทร์เที่ยง เนตรวิเศษ',
                                    'ศูนย์บริการสาธารณสุข 13 ไมตรีวานิช',
                                    'ศูนย์บริการสาธารณสุข 14 แก้ว สีบุญเรือง',
                                    'ศูนย์บริการสาธารณสุข 15 ลาดพร้าว',
                                    'ศูนย์บริการสาธารณสุข 16 ลุมพินี',
                                    'ศูนย์บริการสาธารณสุข 17 ประชานิเวศน์',
                                    'ศูนย์บริการสาธารณสุข 18 มงคล-วอน วังตาล',
                                    'ศูนย์บริการสาธารณสุข 19 วงศ์สว่าง',
                                    'ศูนย์บริการสาธารณสุข 20 ป้อมปราบศัตรูพ่าย',
                                    'ศูนย์บริการสาธารณสุข 21 วัดธาตุทอง',
                                    'ศูนย์บริการสาธารณสุข 22 วัดปากบ่อ',
                                    'ศูนย์บริการสาธารณสุข 23 สี่พระยา',
                                    'ศูนย์บริการสาธารณสุข 24 บางเขน',
                                    'ศูนย์บริการสาธารณสุข 25 ห้วยขวาง',
                                    'ศูนย์บริการสาธารณสุข 26 เจ้าคุณพระประยุรวงศ์',
                                    'ศูนย์บริการสาธารณสุข 27 จันทร์ฉิมไพบูลย์',
                                    'ศูนย์บริการสาธารณสุข 28 กรุงธนบุรี',
                                    'ศูนย์บริการสาธารณสุข 29 ช่วง นุชเนตร',
                                    'ศูนย์บริการสาธารณสุข 30 วัดเจ้าอาม',
                                    'ศูนย์บริการสาธารณสุข 31 เอิบ-จิตร ทังสุบุตร',
                                    'ศูนย์บริการสาธารณสุข 32 มาริษ ตินตมุสิก',
                                    'ศูนย์บริการสาธารณสุข 33 วัดหงส์รัตนาราม',
                                    'ศูนย์บริการสาธารณสุข 34 โพธิ์ศรี',
                                    'ศูนย์บริการสาธารณสุข 35 หัวหมาก',
                                    'ศูนย์บริการสาธารณสุข 36 บุคคโล',
                                    'ศูนย์บริการสาธารณสุข 37 ประสงค์-สุดสาคร',
                                    'ศูนย์บริการสาธารณสุข 38 จี๊ด-ทองคำบำเพ็ญ',
                                    'ศูนย์บริการสาธารณสุข 39 ราษฎร์บูรณะ',
                                    'ศูนย์บริการสาธารณสุข 40 บางแค',
                                    'ศูนย์บริการสาธารณสุข 41 คลองเตย',
                                    'ศูนย์บริการสาธารณสุข 42 ถนอม ทองสิมา',
                                    'ศูนย์บริการสาธารณสุข 43 มีนบุรี',
                                    'ศูนย์บริการสาธารณสุข 44 ลำผักชี หนองจอก',
                                    'ศูนย์บริการสาธารณสุข 45 ร่มเกล้า ลาดกระบัง',
                                    'ศูนย์บริการสาธารณสุข 46 กันตารัติอุทิศ',
                                    'ศูนย์บริการสาธารณสุข 47 คลองขวาง',
                                    'ศูนย์บริการสาธารณสุข 48 นาควัชระ อุทิศ',
                                    'ศูนย์บริการสาธารณสุข 49 วัดชัยพฤกษมาลา',
                                    'ศูนย์บริการสาธารณสุข 50 บึงกุ่ม',
                                    'ศูนย์บริการสาธารณสุข 51 จตุจักร',
                                    'ศูนย์บริการสาธารณสุข 52 สามเสนนอก',
                                    'ศูนย์บริการสาธารณสุข 53 ทุ่งสองห้อง',
                                    'ศูนย์บริการสาธารณสุข 54 ทัศน์เอี่ยม',
                                    'ศูนย์บริการสาธารณสุข 55 เตชะสัมพันธ์',
                                    'ศูนย์บริการสาธารณสุข 56 ทับเจริญ',
                                    'ศูนย์บริการสาธารณสุข 57 บุญเรือง ล้ำเลิศ',
                                    'ศูนย์บริการสาธารณสุข 58 ล้อม-พิมเสน ฟักอุดม',
                                    'ศูนย์บริการสาธารณสุข 59 ทุ่งครุ',
                                    'ศูนย์บริการสาธารณสุข 60 รสสุคนธ์ มโนชญากร',
                                    'ศูนย์บริการสาธารณสุข 61 สังวาลย์ ทัสนารมย์',
                                    'ศูนย์บริการสาธารณสุข 62 ตวงรัชฎ์ ศศะนาวิน',
                                    'ศูนย์บริการสาธารณสุข 63 สมาคมแต้จิ๋วแห่งประเทศไทย',
                                    'ศูนย์บริการสาธารณสุข 64 คลองสามวา',
                                    'ศูนย์บริการสาธารณสุข 65 รักษาศุข บางบอน',
                                    'ศูนย์บริการสาธารณสุข 66 ตำหนักพระแม่กวนอิม',
                                    'ศูนย์บริการสาธารณสุข 67 ทวีวัฒนา',
                                    'ศูนย์บริการสาธารณสุข 68 สะพานสูง',
                                    'ศูนย์บริการสาธารณสุข 69 คันนายาว',
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
                                    'สถาบันสุขภาพเด็กแห่งชาติมหาราชินี',
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