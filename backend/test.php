
<?php
include_once './autoload.php';

if (ENVIRONMENT === 'PROD') {
    echo json_encode('Unauthorize');
    exit;
}

$act = !empty($_GET['action']) ? $_GET['action'] : '';
$seeds = [
    [
        "username"        => 'j.loyloy',
        "password"        => password_hash('12345', PASSWORD_BCRYPT, ['cost' => 12]),
        "lastname"        => 'Loyloy',
        "firstname"       => 'Jonathan',
        "middlename"      => '',
        "branch"          => "All",
        "gender"          => 'Male',
        "address"         => 'Wcc Church',
        "birthdate"       => '2022-05-05',
        "contact"         => '09955591932',
        "is_pastor"       => 1,
        "is_leader"       => 1,
    ],  
    [
        "username"        => 'jdoe',
        "password"        => password_hash('12345', PASSWORD_BCRYPT, ['cost' => 12]),
        "lastname"        => 'Doe',
        "firstname"       => 'John',
        "middlename"      => '',
        "branch"          => "Bataan",
        "gender"          => 'Male',
        "address"         => 'Jan lang',
        "birthdate"       => '2000-01-01',
        "contact"         => '091234567',
        "is_leader"       => 0,
        "is_pastor"       => 0,
    ],
    [
        "username"        => 'janedoe',
        "password"        => password_hash('12345', PASSWORD_BCRYPT, ['cost' => 12]),
        "lastname"        => 'Does',
        "firstname"       => 'Jane',
        "middlename"      => '',
        "branch"          => "Bataan",
        "gender"          => 'Female',
        "address"         => 'Jan lang',
        "birthdate"       => '2001-01-02',
        "contact"         => '0912354785',
        "is_leader"       => 0,
        "is_pastor"       => 0,
    ],
    [
        "username"        => 'fbar',
        "password"        => password_hash('12345', PASSWORD_BCRYPT, ['cost' => 12]),
        "lastname"        => 'Bar',
        "firstname"       => 'Foo',
        "middlename"      => '',
        "branch"          => "Bataan",
        "gender"          => 'Male',
        "address"         => 'Jan lang',
        "birthdate"       => '2002-01-03',
        "contact"         => '098751454',
        "is_leader"       => 0,
        "is_pastor"       => 0,
    ],
    [
        "username"        => 'ajoe',
        "password"        => password_hash('12345', PASSWORD_BCRYPT, ['cost' => 12]),
        "lastname"        => 'Joe',
        "firstname"       => 'Average',
        "middlename"      => '',
        "branch"          => "Bataan",
        "gender"          => 'Male',
        "address"         => 'Jan lang',
        "birthdate"       => '2002-01-04',
        "contact"         => '11111111',
        "is_leader"       => 1,
        "is_pastor"       => 0,
    ],
    [
        "username"        => 'jpublic',
        "password"        => password_hash('12345', PASSWORD_BCRYPT, ['cost' => 12]),
        "lastname"        => 'Public',
        "firstname"       => 'John',
        "middlename"      => '',
        "branch"          => "Bataan",
        "gender"          => 'Male',
        "address"         => 'Jan lang',
        "birthdate"       => '2002-01-05',
        "contact"         => '0924578454',
        "is_leader"       => 0,
        "is_pastor"       => 0,
    ],
    [
        "username"        => 'iroe',
        "password"        => password_hash('12345', PASSWORD_BCRYPT, ['cost' => 12]),
        "lastname"        => 'Roe',
        "firstname"       => 'Ivan',
        "middlename"      => '',
        "branch"          => "Bataan",
        "gender"          => 'Female',
        "address"         => 'Jan lang',
        "birthdate"       => '2002-01-06',
        "contact"         => '096315454',
        "is_leader"       => 0,
        "is_pastor"       => 0,
    ]
];
$lessons = [
    //SOL1
    [
        "lesson_type"      => "SOL1",
        "lesson_title"     => "M1:CLASS 1 - JESUS IS MY SHEPHERD",
        "sequence"         => 1
    ],
    [
        "lesson_type"      => "SOL1",
        "lesson_title"     => "M2:CLASS 1 - WHAT IS VISION?",
        "sequence"         => 2
    ],
    [
        "lesson_type"      => "SOL1",
        "lesson_title"     => "M1:CLASS 2 - CULTIVATING A RELATIONSHIP WITH GOD",
        "sequence"         => 3
    ],
    [
        "lesson_type"      => "SOL1",
        "lesson_title"     => "M1:CLASS 2 - THE PRINCIPLES OF G12",
        "sequence"         => 4
    ],
    [
        "lesson_type"      => "SOL1",
        "lesson_title"     => "M1:CLASS 3 - THE POWER OF PRAISE AND WORSHIP",
        "sequence"         => 5
    ],
    [
        "lesson_type"      => "SOL1",
        "lesson_title"     => "M2:CLASS 3 - A FIRM FOUNDATION",
        "sequence"         => 6
    ],
    [
        "lesson_type"      => "SOL1",
        "lesson_title"     => "M1:CLASS 4 - STRENGTHENED IN GOD",
        "sequence"         => 7
    ],
    [
        "lesson_type"      => "SOL1",
        "lesson_title"     => "M2:CLASS 4 - THE VISION OF THE GOVERNMENT OF G12",
        "sequence"         => 8
    ],
    [
        "lesson_type"      => "SOL1",
        "lesson_title"     => "M1:CLASS 5 - SPIRITUAL WARFARE",
        "sequence"         => 9
    ],
    [
        "lesson_type"      => "SOL1",
        "lesson_title"     => "M2:CLASS 5 - FORMING THE BEST TEAM",
        "sequence"         => 10
    ],
    [
        "lesson_type"      => "SOL1",
        "lesson_title"     => "M1:CLASS 6 - THE REDEMPTIVE POWER OF THE BLOOD",
        "sequence"         => 11
    ],
    [
        "lesson_type"      => "SOL1",
        "lesson_title"     => "M2:CLASS 6 - SUCCESSFUL LEADERSHIP",
        "sequence"         => 12
    ],
    [
        "lesson_type"      => "SOL1",
        "lesson_title"     => "M1:CLASS 7 - THE BIBLE WILL TRANSFORM YOUR LIFE",
        "sequence"         => 13
    ],
    [
        "lesson_type"      => "SOL1",
        "lesson_title"     => "M2:CLASS 7 - THE ART OF WINNING",
        "sequence"         => 14
    ],
    [
        "lesson_type"      => "SOL1",
        "lesson_title"     => "M1:CLASS 8 - THE ANOINTING OF THE HOLY SPIRIT",
        "sequence"         => 15
    ],
    [
        "lesson_type"      => "SOL1",
        "lesson_title"     => "M2:CLASS 8 - BLESSING THROUGH THE CELL-GROUP",
        "sequence"         => 16
    ],
    [
        "lesson_type"      => "SOL1",
        "lesson_title"     => "M1:CLASS 9 - THE BLESSING OF PROSPERITY",
        "sequence"         => 17
    ],
    [
        "lesson_type"      => "SOL1",
        "lesson_title"     => "M2:CLASS 9 - READY TO CONSOLIDATE",
        "sequence"         => 18
    ],
    [
        "lesson_type"      => "SOL1",
        "lesson_title"     => "M1:CLASS 10 - BUILDING MY CHURCH",
        "sequence"         => 19
    ],
    [
        "lesson_type"      => "SOL1",
        "lesson_title"     => "M2:CLASS 10 - THE POWER OF THE 144",
        "sequence"         => 20
    ],
    //SOL2
    [
        "lesson_type"      => "SOL2",
        "lesson_title"     => "M3:CLASS 1 - THE PRESENT GLORY",
        "sequence"         => 1
    ],
    [
        "lesson_type"      => "SOL2",
        "lesson_title"     => "M4:CLASS 1 - FAMILY",
        "sequence"         => 2
    ],
    [
        "lesson_type"      => "SOL2",
        "lesson_title"     => "M3:CLASS 2 - KEY PRINCIPLES OF WINNING",
        "sequence"         => 3
    ],
    [
        "lesson_type"      => "SOL2",
        "lesson_title"     => "M4:CLASS 2 - THE ROLE OF PARENTS AND CHILDREN",
        "sequence"         => 4
    ],
    [
        "lesson_type"      => "SOL2",
        "lesson_title"     => "M3:CLASS 3 - THE POWER OF EVANGELISM",
        "sequence"         => 5
    ],
    [
        "lesson_type"      => "SOL2",
        "lesson_title"     => "M4:CLASS 3 - HEALING WITHIN THE FAMILY",
        "sequence"         => 6
    ],
    [
        "lesson_type"      => "SOL2",
        "lesson_title"     => "M3:CLASS 4 - EFFECTIVE EVANGELISM",
        "sequence"         => 7
    ],
    [
        "lesson_type"      => "SOL2",
        "lesson_title"     => "M4:CLASS 4 - 7 PILLARS FOR A HAPPY MARRIAGE",
        "sequence"         => 8
    ],
    [
        "lesson_type"      => "SOL2",
        "lesson_title"     => "M3:CLASS 5 - THE ANOINTING TO WIN",
        "sequence"         => 9
    ],
    [
        "lesson_type"      => "SOL2",
        "lesson_title"     => "M4:CLASS 5 - THE BLESSING OF FATHERHOOD",
        "sequence"         => 10
    ],
    [
        "lesson_type"      => "SOL2",
        "lesson_title"     => "M3:CLASS 6 - COMPASSION",
        "sequence"         => 11
    ],
    [
        "lesson_type"      => "SOL2",
        "lesson_title"     => "M4:CLASS 6 - WHO IS THE RIGHT PERSON?",
        "sequence"         => 12
    ],
    [
        "lesson_type"      => "SOL2",
        "lesson_title"     => "M3:CLASS 7 - WHO IS THE RIGHT PERSON?",
        "sequence"         => 13
    ],
    [
        "lesson_type"      => "SOL2",
        "lesson_title"     => "M4:CLASS 7 - WHO IS THE RIGHT PERSON?",
        "sequence"         => 14
    ],
    [
        "lesson_type"      => "SOL2",
        "lesson_title"     => "M3:CLASS 8 - WHO IS THE RIGHT PERSON?",
        "sequence"         => 15
    ],
    [
        "lesson_type"      => "SOL2",
        "lesson_title"     => "M4:CLASS 8 - 7 STEPS FOR A SUCCESSFUL COURTSHIP",
        "sequence"         => 16
    ],
    [
        "lesson_type"      => "SOL2",
        "lesson_title"     => "M3:CLASS 9 - VISION",
        "sequence"         => 17
    ],
    [
        "lesson_type"      => "SOL2",
        "lesson_title"     => "M4:CLASS 9 - STRENGTHEN COMMUNICATION IN YOUR MARRIAGE",
        "sequence"         => 18
    ],
    [
        "lesson_type"      => "SOL2",
        "lesson_title"     => "M3:CLASS 10 - CELL-GROUP STRUCTURE AND DEVELOPMENT",
        "sequence"         => 19
    ],
    [
        "lesson_type"      => "SOL2",
        "lesson_title"     => "M4:CLASS 10 - COMMANDMENTS FOR THE FAMILY",
        "sequence"         => 20
    ],
    //SOL3
    [
        "lesson_type"      => "SOL3",
        "lesson_title"     => "M5:CLASS 1 - A LEADER OF FAITH",
        "sequence"         => 1
    ],
    [
        "lesson_type"      => "SOL3",
        "lesson_title"     => "M6:CLASS 1 - SUBMERGED IN HIS SPIRIT",
        "sequence"         => 2
    ],
    [
        "lesson_type"      => "SOL3",
        "lesson_title"     => "M5:CLASS 2 - A LEADER'S FOR THE FLOCK",
        "sequence"         => 3
    ],
    [
        "lesson_type"      => "SOL3",
        "lesson_title"     => "M6:CLASS 2 - PREPAIRING TO RECEIVE THE HOLY SPIRIT",
        "sequence"         => 4
    ],
    [
        "lesson_type"      => "SOL3",
        "lesson_title"     => "M5:CLASS 3 - A LEADER THAT BUILDS",
        "sequence"         => 5
    ],
    [
        "lesson_type"      => "SOL3",
        "lesson_title"     => "M6:CLASS 3 - KNOWING THE HOLY SPIRIT",
        "sequence"         => 6
    ],
    [
        "lesson_type"      => "SOL3",
        "lesson_title"     => "M5:CLASS 4 - A LEADER WITH THE HEART OF A SERVANT",
        "sequence"         => 7
    ],
    [
        "lesson_type"      => "SOL3",
        "lesson_title"     => "M6:CLASS 4 - THE FRUIT OF THE HOLY SPIRIT (PART 1)",
        "sequence"         => 8
    ],
    [
        "lesson_type"      => "SOL3",
        "lesson_title"     => "M5:CLASS 5 - A LEADER CONTROLLED BY THE HOLY SPIRIT",
        "sequence"         => 9
    ],
    [
        "lesson_type"      => "SOL3",
        "lesson_title"     => "M6:CLASS 5 - THE FRUIT OF THE HOLY SPIRIT (PART 2)",
        "sequence"         => 10
    ],
    [
        "lesson_type"      => "SOL3",
        "lesson_title"     => "M5:CLASS 6 - THE LEADER AND PREACHING OF THE WORD",
        "sequence"         => 11
    ],
    [
        "lesson_type"      => "SOL3",
        "lesson_title"     => "M6:CLASS 6 - THE FRUIT OF THE HOLY SPIRIT (PART 3)",
        "sequence"         => 12
    ],
    [
        "lesson_type"      => "SOL3",
        "lesson_title"     => "M5:CLASS 7 - THE LEADER AND COUNSELING",
        "sequence"         => 13
    ],
    [
        "lesson_type"      => "SOL3",
        "lesson_title"     => "M6:CLASS 7 - INTRODUCTION TO THE GIFTS OF THE HOLY SPIRIT",
        "sequence"         => 14
    ],
    [
        "lesson_type"      => "SOL3",
        "lesson_title"     => "M5:CLASS 8 - THE LEADER AND SUPERVISION",
        "sequence"         => 15
    ],
    [
        "lesson_type"      => "SOL3",
        "lesson_title"     => "M6:CLASS 8 - THE GIFTS OF REVELATION",
        "sequence"         => 16
    ],
    [
        "lesson_type"      => "SOL3",
        "lesson_title"     => "M5:CLASS 9 - THE PRICE OF LEADERSHIP",
        "sequence"         => 17
    ],
    [
        "lesson_type"      => "SOL3",
        "lesson_title"     => "M6:CLASS 9 - THE GIFTS OF POWER",
        "sequence"         => 18
    ],
    [
        "lesson_type"      => "SOL3",
        "lesson_title"     => "M5:CLASS 10 - THE LEADER AND THE FORMATION OF DISCIPLES",
        "sequence"         => 19
    ],
    [
        "lesson_type"      => "SOL3",
        "lesson_title"     => "M6:CLASS 10 - THE GIFTS OF INSPIRATION",
        "sequence"         => 20
    ],
    //LIFE CLASS
    [
        "lesson_type"      => "LIFE_CLASS",
        "lesson_title"     => "WEEK 1",
        "sequence"         => 1
    ],
    [
        "lesson_type"      => "LIFE_CLASS",
        "lesson_title"     => "WEEK 2",
        "sequence"         => 2
    ],
    [
        "lesson_type"      => "LIFE_CLASS",
        "lesson_title"     => "WEEK 3",
        "sequence"         => 3
    ],
    [
        "lesson_type"      => "LIFE_CLASS",
        "lesson_title"     => "WEEK 4",
        "sequence"         => 4
    ],
    [
        "lesson_type"      => "LIFE_CLASS",
        "lesson_title"     => "WEEK 5",
        "sequence"         => 5
    ],
    [
        "lesson_type"      => "LIFE_CLASS",
        "lesson_title"     => "WEEK 6",
        "sequence"         => 6
    ],
    [
        "lesson_type"      => "LIFE_CLASS",
        "lesson_title"     => "WEEK 7",
        "sequence"         => 7
    ],
    [
        "lesson_type"      => "LIFE_CLASS",
        "lesson_title"     => "WEEK 8",
        "sequence"         => 8
    ],
    [
        "lesson_type"      => "LIFE_CLASS",
        "lesson_title"     => "ENCOUNTER DAY 1",
        "sequence"         => 9
    ],
    [
        "lesson_type"      => "LIFE_CLASS",
        "lesson_title"     => "ENCOUNTER DAY 2",
        "sequence"         => 10
    ],
    [
        "lesson_type"      => "LIFE_CLASS",
        "lesson_title"     => "ENCOUTNER DAY 3",
        "sequence"         => 11
    ]
];
$qrs = [
    [
        "qr_code"       =>  "test",
        "branch"        =>  "Bataan",
        "created_by"    =>  "Admin"
    ],
    [
        "qr_code"       =>  "test",
        "branch"        =>  "Gensan",
        "created_by"    =>  "Admin"
    ],
    [
        "qr_code"       =>  "test",
        "branch"        =>  "Kalibo",
        "created_by"    =>  "Admin"
    ],
    [
        "qr_code"       =>  "test",
        "branch"        =>  "Valenzuela",
        "created_by"    =>  "Admin"
    ]
];
switch ($act) {
    case 'seed':
        foreach ($seeds as $key => $seed) {
            $has_account = $db->get_row("SELECT * FROM bro_accounts WHERE username = ?", [$seed['username']]);

            if (empty($has_account)) {
                $fields = $common->get_insert_fields($seed);

                $last_insert = $db->insert("INSERT INTO bro_accounts {$fields}", array_values($seed));
                echo "{$seed['username']} Created <br/>";

                $tribe_payload = [
                    'leader_pk' => $seed['is_leader'] > 0 ? 1 : 2,
                    'member_pk' => $last_insert,
                    'is_approved' => 1
                ];
                $tribe_fields = $common->get_insert_fields($tribe_payload);
                $db->insert("INSERT INTO bro_tribe {$tribe_fields}", array_values($tribe_payload));
            } else {
                echo "{$has_account['username']} Already Exists <br/>";
            }
        }
        foreach ($lessons as $key => $lesson) {
            $fields = $common->get_insert_fields($lesson);
            $last_insert = $db->insert("INSERT INTO bro_lessons {$fields}", array_values($lesson));
            echo "{$lesson['lesson_title']} Created <br/>";
        }
        foreach ($qrs as $key => $qr) {
            $fields = $common->get_insert_fields($qr);
            $last_insert = $db->insert("INSERT INTO bro_qr {$fields}", array_values($qr));
            echo "{$qr['branch']} Created <br/>";
        }
        break;
    case 'truncate':
        $db->truncate("bro_accounts");
        echo "bro_accounts rollback <br/>";
        $db->truncate("bro_attendance");
        echo "bro_attendance rollback <br/>";
        $db->truncate("bro_lessons");
        echo "bro_lessons rollback <br/>";
        $db->truncate("bro_tribe");
        echo "bro_tribe rollback <br/>";
        $db->truncate("bro_cellgroup");
        echo "bro_cellgroup rollback <br/>";
        $db->truncate("bro_enrollment");
        echo "bro_enrollment rollback <br/>";
        $db->truncate("bro_invites");
        echo "bro_invites rollback <br/>";
        $db->truncate("bro_lessons");
        echo "bro_lessons rollback <br/>";
        $db->truncate("bro_notifications");
        echo "bro_notifications	 rollback <br/>";
        $db->truncate("	bro_qr");
        echo "bro_qr rollback <br/>";
        $db->truncate("bro_schooling");
        echo "bro_schooling	 rollback <br/>";
        break;
    default:
        # code...
        break;
}
