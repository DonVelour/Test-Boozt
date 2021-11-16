<?php
    //Include classes and instantiating
    include "classes/database.php";
    include "classes/dashboard.php";
    include "classes/dashboard-controller.php";
    if (isset($_POST['From'])&&isset($_POST['To'])) {
      $controller = new dashboardCon($_POST['From'],$_POST['To']);
    }
    else {
      $controller = new dashboardCon(date('Y-m-d',strtotime('-1month')),date('Y-m-d'));
    }