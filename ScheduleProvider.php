<?php
include './IScheduleProvider.php';
include './ScheduleService.php';
include './Match.php';
include './config.php';

class ScheduleProvider implements IScheduleProvider {
    public $scheduleService;

    public function __construct() {
        $this->scheduleService = new ScheduleService();
    }

    public function getScheduleByTeam($team1) {
        $username = "u";
        $tsql = "SELECT * FROM [dbo].[Matches]
        WHERE Username = '$username'";
    $getResults= sqlsrv_query($conn, $tsql);
    if ($getResults === false) {
        echo (sqlsrv_errors());
    }
    echo "here!!3";
    $schedule = new Schedule();
    echo "here!!1";
    while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_BOTH)) {
        echo "here!!";
        $team1 = $row['Team1'];
        $team2 = $row['Team2'];
        $location = $row['Location'];
        $date = $row['MatchDate'];
        echo $team2;
    }
    }

    public function getScheduleByLocation($location) {
        //code here
        $team1DatabaseResult = "this field will return team1 for match at " . $location;
        $team2DatabaseResult = "this field will return team2 for match at " . $location;
        $dateDatabaseResult = "this field will return date for match at " . $location;
        $match = new Match($team1DatabaseResult, $team2DatabaseResult, $location, $dateDatabaseResult);
        $this->scheduleService->addMatch($match);
    }

    public function getScheduleByMonth($month) {
        //code here
        $team1DatabaseResult = "this field will return team1 for match during " . $month;
        $team2DatabaseResult = "this field will return team2 for match during " . $month;
        $locationDatabaseResult = "this field will return location for match during " . $month;
        $match = new Match($team1DatabaseResult, $team2DatabaseResult, $locationDatabaseResult, $month);
        $this->scheduleService->addMatch($match);
    }

    public function returnService() {
        return $this->scheduleService;
    }
}
?>
