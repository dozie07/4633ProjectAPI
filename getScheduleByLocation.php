<?php
    include './ScheduleProvider.php';

    $provider = new ScheduleProvider();
    
    //temporary variable set to string for testing
    $location = "location";

    //actual variable will be a $_POST or $_GET recieved from web app requester
    //$location = $_POST["location"];

    $provider->getScheduleByLocation($Location);
    echo json_encode($provider->returnService()->returnMatches());
?>
