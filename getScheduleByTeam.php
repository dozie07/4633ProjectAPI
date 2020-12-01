<?php
    header("Access-Control-Allow-Origin: *");

    include './ScheduleProvider.php';

    $provider = new ScheduleProvider();
    $team1 = $_POST["team1"];
    $team1 = "test1";
    $provider->getScheduleByTeam($team1);
    echo json_encode($provider->returnService()->returnMatches());
?>
