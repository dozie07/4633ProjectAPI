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
        //database query will go here
        //a loop is needed to create multiple matches and store them into the schedule's match array
        //one iteration written below as an example

        //database query code inside loop and store into variables here..
        $team2DatabaseResult = "this field will return opponent for match with " . $team1;
        $locationDatabaseResult = "this field will return location for match with " . $team1;
        $dateDatabaseResult = "this field will return date for match with " . $team1;
        $match = new Match($team1, $team2DatabaseResult, $locationDatabaseResult, $dateDatabaseResult);
        $this->scheduleService->addMatch($match);
        //end loop
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