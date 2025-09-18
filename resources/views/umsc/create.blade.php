<!-- resources/views/umsc/create.blade.php -->
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบบันทึกข้อมูลรายงานการบริการ</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
</head>

<body class="bg-green-50">

    <div class="container mx-auto p-6">
        <form action="{{ route('umsc.store') }}" method="POST" id="umscForm" class="bg-white p-6 rounded-2xl shadow-lg">
            @csrf

            <a href="{{ route('umsc.index') }}">กลับหน้าหลัก</a>
            
            <!--หัวข้อระบบ-->
            <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-green-800 mb-4 text-center">
                ระบบบันทึกข้อมูลรายงานการให้บริการ</h1>
            <p class="text-lg text-green-700 mt-2 mb-10 text-center">ศูนย์สนับสนุนบริการสุขภาพเวชศาสตร์เขตเมือง (Urban
                Medicine Service Center : UMSC)</p>

            <!-- ข้อมูลทั่วไป -->
            <fieldset class="border-t-4 border-green-700 p-4 rounded-lg mb-8 shadow-sm">
                <legend class="text-xl font-bold text-green-800 px-2">ข้อมูลทั่วไป</legend>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
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
                        <label for="month" class="block text-gray-700 mb-1">เดือน <span
                                class="text-red-500">*</span></label>
                        <select id="month" name="month" required
                            class="w-full p-2 border border-gray-300 rounded-md">
                            @php
                                $months = [
                                    'มกราคม',
                                    'กุมภาพันธ์',
                                    'มีนาคม',
                                    'เมษายน',
                                    'พฤษภาคม',
                                    'มิถุนายน',
                                    'กรกฎาคม',
                                    'สิงหาคม',
                                    'กันยายน',
                                    'ตุลาคม',
                                    'พฤศจิกายน',
                                    'ธันวาคม',
                                ];
                            @endphp
                            @foreach ($months as $month)
                                <option value="{{ $month }}">{{ $month }}</option>
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

            <!-- ข้อมูลการให้บริการ -->
            <fieldset class="border-t-4 border-green-700 p-6 rounded-lg bg-white mb-8 shadow-sm">
                <legend class="text-xl font-bold text-green-800 px-2">ข้อมูลการให้บริการ</legend>
                <p class="text-base text-gray-500 px-4 mb-5">(จำนวนการให้บริการ ดังนี้ จุดให้บริการ UMSC
                    ในศูนย์บริการสาธารณสุข, Facebok, โทรศัพท์ เป็นต้น)
                    <span class="font-bold text-red-500">"ยกเว้นช่องทาง Line OA"</span>
                </p>

                <!--ข้อมูลการให้บริการ-->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-4">
                    <!--allUser-->
                    <div class="col-span-1">
                        <label for="allUser"
                            class="block text-base font-medium text-gray-700 mb-1">ผู้รับบริการทั้งหมด</label>
                        <div class="flex gap-2">
                            <input type="number" id="allUser" name="allUser" min="0" value="0"
                                class="w-1/2 bg-gray-100 p-2 border border-gray-300 rounded-md shadow-sm" readonly>
                            <input type="number" id="allUserTimes" name="allUserTimes" min="0" value="0"
                                class="w-1/2 bg-gray-100 p-2 border border-gray-300 rounded-md shadow-sm" readonly>
                        </div>
                    </div>

                    <!--1.healthConsult-->
                    <div class="col-span-1">
                        <label for="healthConsultPeople" class="block text-base font-medium text-gray-700 mb-1">1.
                            การให้คำปรึกษาปัญหาสุขภาพ และการให้ข้อมูลสุขภาพฯ</label>
                        <div class="flex gap-2">
                            <input type="number" id="healthConsultPeople" name="healthConsultPeople" min="0"
                                class="w-1/2 p-2 border border-gray-300 rounded-md shadow-sm sum-source-people"
                                placeholder="คน">
                            <input type="number" id="healthConsultTimes" name="healthConsultTimes" min="0"
                                class="w-1/2 p-2 border border-gray-300 rounded-md shadow-sm sum-source-times"
                                placeholder="ครั้ง">
                        </div>
                    </div>

                    <!--2.serviceAdvice-->
                    <div class="col-span-1">
                        <label for="serviceAdvicePeople" class="block text-base font-medium text-gray-700 mb-1">2.
                            การให้คำแนะนำบริการของศูนย์บริการสาธารณสุข</label>
                        <div class="flex gap-2">
                            <input type="number" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                class="w-1/2 p-2 border border-gray-300 rounded-md shadow-sm sum-source-people"
                                placeholder="คน">
                            <input type="number" id="serviceAdviceTimes" name="serviceAdviceTimes" min="0"
                                class="w-1/2 p-2 border border-gray-300 rounded-md shadow-sm sum-source-times"
                                placeholder="ครั้ง">
                        </div>
                    </div>

                    <!--3.appointment-->
                    <div class="col-span-1">
                        <label for="appointmentPeople" class="block text-base font-medium text-gray-700 mb-1">3.
                            การนัดหมายบริการสุขภาพ</label>
                        <div class="flex gap-2">
                            <input type="number" id="appointmentPeople" name="appointmentPeople" min="0"
                                class="w-1/2 p-2 border border-gray-300 rounded-md shadow-sm sum-source-people"
                                placeholder="คน">
                            <input type="number" id="appointmentTimes" name="appointmentTimes" min="0"
                                class="w-1/2 p-2 border border-gray-300 rounded-md shadow-sm sum-source-times"
                                placeholder="ครั้ง">
                        </div>
                    </div>

                    <!--4.referralCoord-->
                    <div class="col-span-1">
                        <label for="referralCoordPeople" class="block text-base font-medium text-gray-700 mb-1">4.
                            การประสานการส่งต่อผู้ป่วย</label>
                        <div class="flex gap-2">
                            <input type="number" id="referralCoordPeople" name="referralCoordPeople" min="0"
                                class="w-1/2 p-2 border border-gray-300 rounded-md shadow-sm sum-source-people"
                                placeholder="คน">
                            <input type="number" id="referralCoordTimes" name="referralCoordTimes" min="0"
                                class="w-1/2 p-2 border border-gray-300 rounded-md shadow-sm sum-source-times"
                                placeholder="ครั้ง">
                        </div>
                    </div>

                    <!--5.homeVisit-->
                    <div class="col-span-1">
                        <label for="homeVisitPeople" class="block text-base font-medium text-gray-700 mb-1">5.
                            การประสานการให้บริการเยี่ยมบ้าน</label>
                        <div class="flex gap-2">
                            <input type="number" id="homeVisitPeople" name="homeVisitPeople" min="0"
                                class="w-1/2 p-2 border border-gray-300 rounded-md shadow-sm sum-source-people"
                                placeholder="คน">
                            <input type="number" id="homeVisitTimes" name="homeVisitTimes" min="0"
                                class="w-1/2 p-2 border border-gray-300 rounded-md shadow-sm sum-source-times"
                                placeholder="ครั้ง">
                        </div>
                    </div>

                    <!--6.disabilityCert-->
                    <div class="col-span-1">
                        <label for="disabilityCertPeople" class="block text-base font-medium text-gray-700 mb-1">6.
                            การออกเอกสารรับรองความพิการทางการเคลื่อนไหวหรือทางร่างกาย</label>
                        <div class="flex gap-2">
                            <input type="number" id="disabilityCertPeople" name="disabilityCertPeople"
                                min="0"
                                class="w-1/2 p-2 border border-gray-300 rounded-md shadow-sm sum-source-people"
                                placeholder="คน">
                            <input type="number" id="disabilityCertTimes" name="disabilityCertTimes" min="0"
                                class="w-1/2 p-2 border border-gray-300 rounded-md shadow-sm sum-source-times"
                                placeholder="ครั้ง">
                        </div>
                    </div>

                    <!--7.supportRequest-->
                    <div class="col-span-1">
                        <label for="supportRequestPeople" class="block text-base font-medium text-gray-700 mb-1">7.
                            การขอรับการสนับสนุนอุปกรณ์ช่วยเหลือทางการเคลื่อนไหว/
                            วัสดุอุปกรณ์ทางการแพทย์และสาธารณสุข</label>
                        <div class="flex gap-2">
                            <input type="number" id="supportRequestPeople" name="supportRequestPeople"
                                min="0"
                                class="w-1/2 p-2 border border-gray-300 rounded-md shadow-sm sum-source-people"
                                placeholder="คน">
                            <input type="number" id="supportRequestTimes" name="supportRequestTimes" min="0"
                                class="w-1/2 p-2 border border-gray-300 rounded-md shadow-sm sum-source-times"
                                placeholder="ครั้ง">
                        </div>
                    </div>

                    <!--8.Telehealth-->
                    <div class="col-span-1">
                        <label for="telehealthPeople" class="block text-base font-medium text-gray-700 mb-1">8.
                            Telehealth</label>
                        <div class="flex gap-2">
                            <input type="number" id="telehealthPeople" name="telehealthPeople" min="0"
                                class="w-1/2 p-2 border border-gray-300 rounded-md shadow-sm sum-source-people"
                                placeholder="คน">
                            <input type="number" id="telehealthTimes" name="telehealthTimes" min="0"
                                class="w-1/2 p-2 border border-gray-300 rounded-md shadow-sm sum-source-times"
                                placeholder="ครั้ง">
                        </div>
                    </div>

                    <!--9.Other-->
                    <div class="col-span-1">
                        <label for="othersPeople" class="block text-base font-medium text-gray-700 mb-1">9. อื่น
                            ๆ</label>
                        <div class="flex gap-2 mb-2">
                            <input type="number" id="othersPeople" name="othersPeople" min="0"
                                class="w-1/2 p-2 border border-gray-300 rounded-md shadow-sm sum-source-people"
                                placeholder="คน">
                            <input type="number" id="othersTimes" name="othersTimes"min="0"
                                class="w-1/2 p-2 border border-gray-300 rounded-md shadow-sm sum-source-times"
                                placeholder="ครั้ง">
                        </div>
                        <input type="text" id="othersSpecify" name="othersSpecify"
                            class="w-full p-2 border border-gray-300 rounded-md shadow-sm" placeholder="โปรดระบุ...">
                    </div>
                </div>
            </fieldset>

            <fieldset class="border-t-4 border-green-700 p-6 rounded-lg bg-white mb-8 shadow-sm">
                <legend class="text-xl font-bold text-green-800 px-2">ข้อมูลการให้บริการผ่าน LINE Official Account
                    (LINE OA)</legend>
                <p class="text-base text-gray-500 px-4 mb-5">(จำนวนการให้บริการเฉพาะ LINE Official Account)</p>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-4">

                    <!-- LINE OA Total Users (Auto-calculated) -->
                    <div class="col-span-1">
                        <label for="lineOATotalPeople"
                            class="block text-base font-medium text-gray-700 mb-1">ผู้รับบริการทั้งหมด (LINE
                            OA)</label>
                        <div class="flex space-x-2">
                            <input type="number" id="lineOATotalPeople" name="lineOATotalPeople" min="0"
                                value="0"
                                class="w-1/2 bg-gray-100 p-2 border border-gray-300 rounded-md shadow-sm" readonly>
                            <input type="number" id="lineOATotalTimes" name="lineOATotalTimes" min="0"
                                value="0"
                                class="w-1/2 bg-gray-100 p-2 border border-gray-300 rounded-md shadow-sm" readonly>
                        </div>
                    </div>

                    <!--1.lineOAhealthConsult-->
                    <div class="col-span-1">
                        <label for="lineOAhealthConsultPeople"
                            class="block text-base font-medium text-gray-700 mb-1">1.
                            การให้คำปรึกษาปัญหาสุขภาพ และการให้ข้อมูลสุขภาพฯ</label>
                        <div class="flex gap-2">
                            <input type="number" id="lineOAhealthConsultPeople" name="lineOAhealthConsultPeople"
                                min="0"
                                class="w-1/2 p-2 border border-gray-300 rounded-md shadow-sm line-sum-source-people"
                                placeholder="คน">
                            <input type="number" id="lineOAhealthConsultTimes" name="lineOAhealthConsultTimes"
                                min="0"
                                class="w-1/2 p-2 border border-gray-300 rounded-md shadow-sm line-sum-source-times"
                                placeholder="ครั้ง">
                        </div>
                    </div>

                    <!--2.lineOAserviceAdvice-->
                    <div class="col-span-1">
                        <label for="lineOAserviceAdvicePeople"
                            class="block text-base font-medium text-gray-700 mb-1">2.
                            การให้คำแนะนำบริการของศูนย์บริการสาธารณสุข</label>
                        <div class="flex gap-2">
                            <input type="number" id="lineOAserviceAdvicePeople" name="lineOAserviceAdvicePeople"
                                min="0"
                                class="w-1/2 p-2 border border-gray-300 rounded-md shadow-sm line-sum-source-people"
                                placeholder="คน">
                            <input type="number" id="lineOAserviceAdviceTimes" name="lineOAserviceAdviceTimes"
                                min="0"
                                class="w-1/2 p-2 border border-gray-300 rounded-md shadow-sm line-sum-source-times"
                                placeholder="ครั้ง">
                        </div>
                    </div>

                    <!--3.lineOAappointment-->
                    <div class="col-span-1">
                        <label for="lineOAappointmentPeople" class="block text-base font-medium text-gray-700 mb-1">3.
                            การนัดหมายบริการสุขภาพ</label>
                        <div class="flex gap-2">
                            <input type="number" id="lineOAappointmentPeople" name="lineOAappointmentPeople"
                                min="0"
                                class="w-1/2 p-2 border border-gray-300 rounded-md shadow-sm line-sum-source-people"
                                placeholder="คน">
                            <input type="number" id="lineOAappointmentTimes" name="lineOAappointmentTimes"
                                min="0"
                                class="w-1/2 p-2 border border-gray-300 rounded-md shadow-sm line-sum-source-times"
                                placeholder="ครั้ง">
                        </div>
                    </div>

                    <!--4.lineOAreferralCoord-->
                    <div class="col-span-1">
                        <label for="lineOAreferralCoordPeople"
                            class="block text-base font-medium text-gray-700 mb-1">4.
                            การประสานการส่งต่อผู้ป่วย</label>
                        <div class="flex gap-2">
                            <input type="number" id="lineOAreferralCoordPeople" name="lineOAreferralCoordPeople"
                                min="0"
                                class="w-1/2 p-2 border border-gray-300 rounded-md shadow-sm line-sum-source-people"
                                placeholder="คน">
                            <input type="number" id="lineOAreferralCoordTimes" name="lineOAreferralCoordTimes"
                                min="0"
                                class="w-1/2 p-2 border border-gray-300 rounded-md shadow-sm line-sum-source-times"
                                placeholder="ครั้ง">
                        </div>
                    </div>

                    <!--5.lineOAhomeVisit-->
                    <div class="col-span-1">
                        <label for="lineOAhomeVisitPeople" class="block text-base font-medium text-gray-700 mb-1">5.
                            การประสานการให้บริการเยี่ยมบ้าน</label>
                        <div class="flex gap-2">
                            <input type="number" id="lineOAhomeVisitPeople" name="lineOAhomeVisitPeople"
                                min="0"
                                class="w-1/2 p-2 border border-gray-300 rounded-md shadow-sm line-sum-source-people"
                                placeholder="คน">
                            <input type="number" id="lineOAhomeVisitTimes" name="lineOAhomeVisitTimes"
                                min="0"
                                class="w-1/2 p-2 border border-gray-300 rounded-md shadow-sm line-sum-source-times"
                                placeholder="ครั้ง">
                        </div>
                    </div>

                    <!--6.lineOAdisabilityCert-->
                    <div class="col-span-1">
                        <label for="lineOAdisabilityCertPeople"
                            class="block text-base font-medium text-gray-700 mb-1">6.
                            การออกเอกสารรับรองความพิการทางการเคลื่อนไหวหรือทางร่างกาย</label>
                        <div class="flex gap-2">
                            <input type="number" id="lineOAdisabilityCertPeople" name="lineOAdisabilityCertPeople"
                                min="0"
                                class="w-1/2 p-2 border border-gray-300 rounded-md shadow-sm line-sum-source-people"
                                placeholder="คน">
                            <input type="number" id="lineOAdisabilityCertTimes" name="lineOAdisabilityCertTimes"
                                min="0"
                                class="w-1/2 p-2 border border-gray-300 rounded-md shadow-sm line-sum-source-times"
                                placeholder="ครั้ง">
                        </div>
                    </div>

                    <!--7.lineOAsupportRequest-->
                    <div class="col-span-1">
                        <label for="lineOAsupportRequestPeople"
                            class="block text-base font-medium text-gray-700 mb-1">7.
                            การขอรับการสนับสนุนอุปกรณ์ช่วยเหลือทางการเคลื่อนไหว/
                            วัสดุอุปกรณ์ทางการแพทย์และสาธารณสุข</label>
                        <div class="flex gap-2">
                            <input type="number" id="lineOAsupportRequestPeople" name="lineOAsupportRequestPeople"
                                min="0"
                                class="w-1/2 p-2 border border-gray-300 rounded-md shadow-sm line-sum-source-people"
                                placeholder="คน">
                            <input type="number" id="lineOAsupportRequestTimes" name="lineOAsupportRequestTimes"
                                min="0"
                                class="w-1/2 p-2 border border-gray-300 rounded-md shadow-sm line-sum-source-times"
                                placeholder="ครั้ง">
                        </div>
                    </div>

                    <!--8.lineOATelehealth-->
                    <div class="col-span-1">
                        <label for="lineOAtelehealthPeople" class="block text-base font-medium text-gray-700 mb-1">8.
                            Telehealth</label>
                        <div class="flex gap-2">
                            <input type="number" id="lineOAtelehealthPeople" name="lineOAtelehealthPeople"
                                min="0"
                                class="w-1/2 p-2 border border-gray-300 rounded-md shadow-sm line-sum-source-people"
                                placeholder="คน">
                            <input type="number" id="lineOAtelehealthTimes" name="lineOAtelehealthTimes"
                                min="0"
                                class="w-1/2 p-2 border border-gray-300 rounded-md shadow-sm line-sum-source-times"
                                placeholder="ครั้ง">
                        </div>
                    </div>

                    <!--9.lineOAOther-->
                    <div class="col-span-1">
                        <label for="lineOAothersPeople" class="block text-base font-medium text-gray-700 mb-1">9. อื่น
                            ๆ</label>
                        <div class="flex gap-2 mb-2">
                            <input type="number" id="lineOAothersPeople" name="lineOAothersPeople" min="0"
                                class="w-1/2 p-2 border border-gray-300 rounded-md shadow-sm line-sum-source-people"
                                placeholder="คน">
                            <input type="number" id="lineOAothersTimes" name="lineOAothersTimes" min="0"
                                class="w-1/2 p-2 border border-gray-300 rounded-md shadow-sm line-sum-source-times"
                                placeholder="ครั้ง">
                        </div>
                        <input type="text" id="lineOAothersSpecify" name="lineOAothersSpecify"
                            class="w-full p-2 border border-gray-300 rounded-md shadow-sm" placeholder="โปรดระบุ...">
                    </div>

                    <!--lineOAResponse-->
                    <div class="col-span-1">
                        <label for="lineOAResponse"
                            class="block text-base font-bold text-red-500 mb-1">จำนวนการตอบกลับภายใน 30 นาที</label>
                        <input type="number" id="lineOAResponse" name="lineOAResponse" min="0"
                            class="w-full p-2 border border-gray-300 rounded-md shadow-sm" placeholder="ครั้ง">
                    </div>
                </div>
            </fieldset>

            <!-- ข้อมูลผู้รายงาน -->
            <fieldset class="border-t-4 border-green-700 p-4 rounded-lg mb-6">
                <legend class="text-xl font-bold text-green-800 px-2">ข้อมูลผู้รายงาน</legend>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                    <div>
                        <label for="reporterName" class="block text-gray-700 mb-1">ชื่อ-สกุล <span
                                class="text-red-500">*</span></label>
                        <input type="text" id="reporterName" name="reporterName" required
                            class="w-full p-2 border border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="reporterPosition" class="block text-gray-700 mb-1">ตำแหน่ง <span
                                class="text-red-500">*</span></label>
                        <input type="text" id="reporterPosition" name="reporterPosition" required
                            class="w-full p-2 border border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="reporterPhone" class="block text-gray-700 mb-1">เบอร์โทรศัพท์<span
                                class="text-red-500">*</span></label>
                        <input type="tel" id="reporterPhone" name="reporterPhone" required
                            class="w-full p-2 border border-gray-300 rounded-md" maxlength="10">
                    </div>
                </div>
            </fieldset>

            <button type="submit"
                class="bg-green-700 text-white px-6 py-3 rounded-lg hover:bg-green-800 transition ml-4">
                บันทึกข้อมูล
            </button>

            <button type="reset"
                class="bg-gray-300 text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-400 transition ml-4">
                ล้างข้อมูล
            </button>
        </form>
    </div>
</body>

</html>
