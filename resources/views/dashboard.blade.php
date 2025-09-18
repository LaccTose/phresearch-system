<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ApexChart Example</title>
  <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.46.0/dist/apexcharts.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.46.0/dist/apexcharts.min.js"></script>
  <!--<link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.4/dist/tailwind.min.css" rel="stylesheet">-->
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 dark:bg-gray-900 p-6">


<div class="container mx-auto p-6">
    <form action="{{ route('umsc.store') }}" method="POST" id="umscForm" class="bg-white p-6 rounded-2xl shadow-lg">

  <!-- Header -->
  <div class="flex justify-between items-start w-full">
    <div>
      <h5 class="text-xl font-bold text-gray-900 dark:text-white">หน้าสรุปผลข้อมูลบันทึกรายงาน</h5>
    </div>
    <button id="dateRangeButton"
      data-dropdown-toggle="dateRangeDropdown"
      type="button"
      class="inline-flex items-center text-blue-700 dark:text-blue-600 font-medium hover:underline">
      01 Nov - 31 Dec
      <svg class="w-3 h-3 ms-2" fill="none" viewBox="0 0 10 6">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
      </svg>
    </button>
  </div>

  <!-- Chart -->
  <div class="py-6" id="pie-chart"></div>

  <!-- Footer -->
  <div class="border-t dark:border-gray-700 pt-5 flex justify-between items-center">
    <button class="text-sm font-medium text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
      Last 7 days
    </button>
    <!--<a href="#" class="uppercase text-sm font-semibold inline-flex items-center text-blue-600 hover:text-blue-700">
      Traffic analysis
      <svg class="w-2.5 h-2.5 ms-1.5 rtl:rotate-180" fill="none" viewBox="0 0 6 10">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
      </svg>
    </a>-->
  </div>
</div>

<!-- Chart Script -->
<script>
  var options = {
    chart: {
      type: 'pie',
      height: 300
    },
    series: [44, 55, 13, 43, 22],
    labels: ['zone1', 'zone2', 'zone3', 'zone4']
  };

  var chart = new ApexCharts(document.querySelector("#pie-chart"), options);
  chart.render();
</script>

</div>
</form>

</body>
</html>
