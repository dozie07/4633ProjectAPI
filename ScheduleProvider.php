<?php
include './IScheduleProvider.php';
include './ScheduleService.php';
include './Match.php';

class ScheduleProvider implements IScheduleProvider {
    public $scheduleService;
    public $conn;

    public function __construct() {
        $this->scheduleService = new ScheduleService();
        $serverName = "4633-project-server.database.windows.net";
        $connectionOptions = array(
        "Database" => "4633-API",
        "Uid" => "clouddev",
        "PWD" => "password1!"
        );
        $this->conn = sqlsrv_connect($serverName, $connectionOptions);
        if( $this->conn === false ) {
            die( print_r( sqlsrv_errors(), true));
        };
    }

    public function getScheduleByTeam($team1) {
        $tsql = "SELECT * FROM [dbo].[Schedule]
            WHERE HomeTeam = '$team1'
            OR AwayTeam = '$team1'";
        $getResults= sqlsrv_query($this->conn, $tsql);
        if ($getResults === false) {
            echo (sqlsrv_errors());
        }
        while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_BOTH)) {
            echo "are you entering this at all"
            $team1 = $row['HomeTeam'];
            $team2 = $row['AwayTeam'];
            $location = $row['Location'];
            $date = $row['MatchDate'];
            $match = new Match($team1, $team2, $location, $date);
            $schedule->addMatch($match);
            $this->scheduleService->addMatch($match);
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
