<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.46.0/dist/apexcharts.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-green-50">

<div class="container mx-auto p-6">
    <form action="{{ route('umsc.store') }}" method="POST" class="bg-white p-6 rounded-2xl shadow-lg">

        <!-- Header -->
        <div class="flex justify-between items-start w-full mb-6">
            <h5 class="text-xl font-bold text-gray-900">หน้าสรุปผลข้อมูลบันทึกรายงาน</h5>
        </div>

        <!-- Chart Section -->
        <div class="flex gap-6">
            <!-- Bar Chart (ฝั่งซ้าย) -->
            <div id="bar-chart" class="flex-1 h-[400px]"></div>

            <!-- Pie Charts (ฝั่งขวา) -->
            <div class="flex flex-col gap-6 w-[320px]">
                <div id="pie-chart-1" class="h-[300px]"></div>
                <div id="pie-chart-2" class="h-[300px]"></div>
            </div>
        </div>

    </form>
</div>

<!-- Chart Script -->
<script>
    // Bar chart
    const barOptions = {
        series: [
            { name: "Income", color: "#31C48D", data: [1420, 1620, 1820, 1420, 1650, 2120] },
            { name: "Expense", color: "#F05252", data: [788, 810, 866, 788, 1100, 1200] }
        ],
        chart: { type: "bar", height: 400, toolbar: { show: false } },
        plotOptions: { bar: { horizontal: true, borderRadius: 6 } },
        legend: { show: true, position: "bottom" },
        xaxis: { categories: ["Jul", "Aug", "Sep", "Oct", "Nov", "Dec"] },
        grid: { strokeDashArray: 4 }
    };
    new ApexCharts(document.querySelector("#bar-chart"), barOptions).render();

    // Pie 1
    var options1 = {
        chart: { type: 'pie', height: 300 },
        legend: { position: 'right' },
        series: [44, 55, 13, 43, 22],
        labels: ['zone1', 'zone2', 'zone3', 'zone4', 'zone5']
    };
    new ApexCharts(document.querySelector("#pie-chart-1"), options1).render();

    // Pie 2
    var options2 = {
        chart: { type: 'pie', height: 300 },
        legend: { position: 'right' },
        series: [10, 20, 30, 40, 50],
        labels: ['zone1', 'zone2', 'zone3', 'zone4', 'zone5']
    };
    new ApexCharts(document.querySelector("#pie-chart-2"), options2).render();
</script>

</body>
</html>
