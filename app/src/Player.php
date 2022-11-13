<?php
use SilverStripe\ORM\DataObject;

class Player extends DataObject 
{
    private static $db = [
        'PlayerNumber' => 'Int',
        'FirstName' => 'Varchar(255)',
        'LastName' => 'Text',
        'Birthday' => 'Date',
    ];
    private static $has_one = [
        "Team" => Team::class, // This adds TeamID column to Team model
    ];
}

class Team extends DataObject
{
    private static $db = [
        'Title' => 'Varchar',
    ];
    private static $has_many = [
        'Players' => Player::class,
        // 'Supporters' => Supporter::class, // Standard Many Many, (?? this can not be added if Many Many through is added (like below)???)
    ];
    private static $has_one = [
        'Coach' => Coach::class, // This adds CoachID column to Team model
    ];
    private static $many_many_extraFields = [
        'Supporters' => [
          'Ranking' => 'Int'
        ]
    ];

    // ?? Is this how I make the 2 way connection between the Team and Supporters
    // private static $belongs_many_many = [
    //     'Supporters' => Supporter::class,
    // ];

    //syntax for many_many through which defines a specific data object as the joining table TeamSupporter
    private static $many_many = [
        "Supporters" => [
            'through' => TeamSupporter::class,
            'from' => 'Team',
            'to' => 'Supporter',
        ]
    ];
}

class Coach extends DataObject
{
    private static $db = [
        'CoachName' => 'Varchar(255)',
    ];
    private static $belongs_to = [
        'Team' => Team::class . '.Coach',
    ];
}

class Supporter extends DataObject
{
    private static $db = [
        'SupporterName' => 'Varchar(255)',
    ];
    private static $has_one = [
        'Team' => Team::class, // this Model has a TeamID column even though its managed through TeamSupporter???
    ];
    private static $belongs_many_many = [
        'Supports' => Team::class,
    ];
}

// Many Many joining table defined with many_many through
class TeamSupporter extends DataObject
{
    private static $db = [
        'Ranking' => 'Int',
    ];

    private static $has_one = [
        'Team' => Team::class,
        'Supporter' => Supporter::class,
    ];

    private static $default_sort = '"TeamSupporter"."Ranking" ASC';
}

//Details for what is included here can be found in this link:https://docs.silverstripe.org/en/4/developer_guides/model/relations/
// I'm up to https://docs.silverstripe.org/en/4/developer_guides/model/relations/#polymorphic-many-many-experimental