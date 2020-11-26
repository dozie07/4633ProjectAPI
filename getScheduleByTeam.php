<?php
    include './ScheduleProvider.php';

    $provider = new ScheduleProvider();
    $team1 = "team1";
    $team1 = $_POST["team1"];
    $provider->getScheduleByTeam($team1);
    echo json_encode($provider->returnService()->returnMatches());
?>
