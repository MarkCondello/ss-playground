<?php

namespace {

    use SilverStripe\CMS\Controllers\ContentController;
    use SilverStripe\Dev\Debug;
    class PageController extends ContentController
    {
        /**
         * An array of actions that can be accessed via a request. Each array element should be an action name, and the
         * permissions or conditions required to allow the user to access it.
         *
         * <code>
         * [
         *     'action', // anyone can access this action
         *     'action' => true, // same as above
         *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
         *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
         * ];
         * </code>
         *
         * @var array
         */
        private static $allowed_actions = [];

        protected function init()
        {
            parent::init();
            // You can include any CSS or JS required by your project here.
            // See: https://docs.silverstripe.org/en/developer_guides/templates/requirements/

            //CREATE NEW TEAM MODELS
            // $teamAlpha = Team::create();
            // $teamAlpha->Title = 'Team Alpha';
            // $teamAlpha->write();

            // $teamOmega = Team::create();
            // $teamOmega->Title = 'Team Omega';
            // $teamOmega->write();

            // CREATE A NEW PLAYER MODEL
            // $player = Player::create();
            // $player->PlayerNumber = 79;
            // $player->FirstName = 'John';
            // $player->LastName = 'Adams';
            // $player->write();

            //QUERY PLAYER MODELS BY ID
            $player1 = Player::get()->byID(1);
            // $player1->TeamID = 1;
            // $player1->write();

            // $player3 = Player::get()->byID(3);
            // $player3->TeamID = 1;
            // $player3->write();

            // $player4 = Player::get()->byID(4);
            // $player4->TeamID = 1;
            // $player4->write();

            // $player5 = Player::get()->byID(5);
            // $player5->TeamID = 2;
            // $player5->write();

            // $player6 = Player::get()->byID(6);
            // $player6->TeamID = 2;
            // $player6->write();
            // echo $player1->FirstName . ' ' . $player1->LastName;
            $player1Team = $player1->Team();
            // Debug::dump($player1Team);
            //echo $player1Team->Title;

            //CREATE COACH MODELS
            // $coach1 = Coach::create();
            // $coach1->CoachName = 'Kevin';
            // $coach1->write();

            // $coach2 = Coach::create();
            // $coach2->CoachName = 'Damian';
            // $coach2->write();

            //ADD COACH BY QUERYING TEAM MODELS BY ID
        //     $team1 = Team::get()->byID(1);
        //     $team1->CoachID = 1;
        //     $team1->write();
        // //    Debug::dump($team1->Coach());

        //     $team2 = Team::get()->byID(2);
        //     $team2->CoachID = 2;
        //     $team2->write();
            // Debug::dump($team2->Coach());

            //CREATE SUPPORTER MODEL AND ATTACH TEAM TO IT
            // $supporter1 = Supporter::create();
            // $supporter1->SupporterName = 'Team2Fan';
            // $supporter1->write();
            // // Debug::dump($supporter1);

            // $team2 = Team::get()->byId(2);
            // $supporter1 = Supporter::get()->byID(1);
            // $team2->Supporters()->add($supporter1, ['Ranking' => 1]);
            // Debug::dump($supporter1->Team());

            // $team2 = Team::get()->byId(2);
            // $supporter2 = Supporter::get()->byID(2);
            // $team2->Supporters()->add($supporter2, ['Ranking' => 2]);
            // Debug::dump($supporter1->Team());

        }
        public function GetPlayerByID($ID = 1)
        {
            return Player::get()->byID($ID);
        }
        public function GetTeamSupportersByID($ID = 1)
        {
            $supporter = Supporter::get()->byID($ID);
            $supporterTeamSupports = $supporter->Supports(); 

            // Cant access supporters this way below..
            // $team = Team::get()->byID($ID);
            // $teamSupporters = $team->Supporters(); // how is supporters connected to team?? no supporters column on Team.
            
             //Debug::dump($supporterTeamSupports[0]->Title);
            return $supporterTeamSupports;
        }
        public function GetMembers()
        {
            //FILTER PLAYER MODELS BY COLUMN VALUE
            $members = Player::get()->filter([
                'FirstName' => 'John'
            ])->sort(['LastName' => 'ASC', 'FirstName' => 'ASC',])->reverse();
            // Debug::dump($members->count());
            return $members;
        }
    }
}
// docker exec <MYSQL CONTAINER ID> /usr/bin/mysqldump -u root --password= <DB NAME> > backup.sql
