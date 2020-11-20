<?php
    include './ScheduleProvider.php';

    $provider = new ScheduleProvider();
    
    //temporary variable set to string for testing
    $team1 = "team1";

    //actual variable will be a $_POST or $_GET recieved from web app requester
    //$team1 = $_POST["team1"];

    $provider->getScheduleByTeam($team1);
    echo json_encode($provider->returnService()->returnMatches());
?>