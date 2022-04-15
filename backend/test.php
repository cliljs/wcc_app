
<?php
include_once './autoload.php';

if (ENVIRONMENT === 'PROD') {
    echo json_encode('Unauthorize');
    exit;
}

$act = !empty($_GET['action']) ? $_GET['action'] : '';
$seeds = [
    [
        "username"        => 'pastor123',
        "password"        => password_hash('jaudian29', PASSWORD_BCRYPT, ['cost' => 12]),
        "lastname"        => 'Loyloy',
        "firstname"       => 'Jonathan',
        "middlename"      => '',
        "branch"          => "Langit",
        "gender"          => 'Male',
        "address"         => 'Wcc Church',
        "birthdate"       => '2022-05-05',
        "contact"         => '09955591932',
        "is_pastor"       => 1,
        "is_leader"       => 1,
    ],
    [
        "username"        => 'cliljdn',
        "password"        => password_hash('jaudian29', PASSWORD_BCRYPT, ['cost' => 12]),
        "lastname"        => 'Jaudian',
        "firstname"       => 'Calil Christopher',
        "middlename"      => '',
        "branch"          => "Langit",
        "gender"          => 'Male',
        "address"         => 'Jan lang',
        "birthdate"       => '2022-29-05',
        "contact"         => '09955591932',
        "is_leader"       => 1,
        "is_pastor"       => 0,
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

switch ($act) {
    case 'seed':
        foreach ($seeds as $key => $seed) {
            $has_account = $db->get_row("SELECT * FROM bro_accounts WHERE username = ?", [$seed['username']]);
            
           if (empty($has_account)) {
                $fields = $common->get_insert_fields($seed);

               $last_insert = $db->insert("INSERT INTO bro_accounts {$fields}", array_values($seed));
               echo "{$seed['username']} Created <br/>";
               
               $tribe_payload = [
                    'leader_pk' =>  '1',
                    'member_pk' => $last_insert, 
                    'is_approved' => 1
               ];
               $tribe_fields = $common->get_insert_fields($tribe_payload);
               $db->insert("INSERT INTO bro_tribe {$tribe_fields}", array_values($tribe_payload));
           } else {
               echo "{$has_account['username']} Already Exists <br/>";
           }
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
        echo "	bro_qr rollback <br/>";
        $db->truncate("bro_schooling");
        echo "bro_schooling	 rollback <br/>";
        break;
    default:
        # code...
        break;
}