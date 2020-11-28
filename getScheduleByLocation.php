<?php
    header("Access-Control-Allow-Origin: *");

    include './ScheduleProvider.php';

    $provider = new ScheduleProvider();
    $location = $_POST["location"];
    $provider->getScheduleByLocation($location);
    echo json_encode($provider->returnService()->returnMatches());
?>