<?php
    include './ScheduleProvider.php';

    $provider = new ScheduleProvider();
    
    //temporary variable set to string for testing
    $month = "month";

    //actual variable will be a $_POST or $_GET recieved from web app requester
    //$month = $_POST["month"];

    $provider->getScheduleByMonth($month);
    echo json_encode($provider->returnService()->returnMatches());
?>
