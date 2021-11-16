<!doctype html>
<?php
include "includes/inc.php"
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="includes/style.css" rel="stylesheet">
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <title>Dashboard</title>
  </head>
  <body>

    <div class="grid-container">
      <div class="item1">
        <form name="myForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
          <p>From:</p>
          <input type="date" name="From" value= "<?php echo date($controller->showDates('from')) ?>" onchange="myForm.submit();">
          <p>To:</p>
          <input type="date" name="To" value= "<?php echo date($controller->showDates('to')); ?>" onchange="myForm.submit();">
        </form>
      </div>
      <div class="item2"><?= $controller->showCustomers() ?></div>
      <div class="item3"><?= $controller->showOrders() ?></div>
      <div class="item4"><?= $controller->showRevenue() ?></div>
      <div class="item5">
        <figure class="highcharts-figure">
          <div id="item5"></div>
        </figure>
      </div>
    </div>
  </body>
</html>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    Highcharts.chart('item5', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Time Frame'
    },
    xAxis: {
        categories: [<?= $controller->showChart('date') ?>]
    },
    yAxis: {
        title: {
            text: 'Number'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },
    series: [{
        name: 'Customers',
        data: [<?= $controller->showChart('customers') ?>]
    }, {
        name: 'Orders',
        data: [<?= $controller->showChart('orders') ?>]
    }]
});
});
</script>