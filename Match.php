<?php
    class Match {
        public $team1;
        public $team2;
        public $location;
        public $date;

        public function __construct($team1, $team2, $location, $date) {
            $this->team1 = $team1;
            $this->team2 = $team2;
            $this->location = $location;
            $this->date = $date;
        }

        public function returnTeam1() {
            return $this->$team1;
        }

        public function returnTeam2() {
            return $this->$team2;
        }

        public function returnLocation() {
            return $this->location;
        }

        public function returnDate() {
            return $this->date;
        }
    }
?>