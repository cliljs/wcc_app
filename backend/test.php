
<?php
include_once './autoload.php';

if (ENVIROMENT === 'PROD') {
    echo json_encode('Unauthorize');
    exit;
}

$act = !empty($_GET['action']) ? $_GET['action'] : '';
$seeds = [
    [
        "username"        => 'cliljdn',
        "password"        => password_hash('jaudian29', PASSWORD_BCRYPT, ['cost' => 12]),
        "lastname"        => 'Jaudian',
        "firstname"       => 'Calil Christopher',
        "middlename"      => '',
        "gender"          => 'Male',
        "address"         => 'Jan lang',
        "birthdate"       => '2022-29-05',
        "contact"         => '09955591932',
        "is_leader"       => 1,
        "is_pastor"       => 1,
    ],
    [
        "username"        => 'pastor123',
        "password"        => password_hash('jaudian29', PASSWORD_BCRYPT, ['cost' => 12]),
        "lastname"        => 'Loyloy',
        "firstname"       => 'Jonathan',
        "middlename"      => '',
        "gender"          => 'Male',
        "address"         => 'Wcc Church',
        "birthdate"       => '2022-05-05',
        "contact"         => '09955591932',
        "is_pastor"       => 1,
        "is_leader"       => 1,
    ]
];

switch ($act) {
    case 'seed':
        foreach ($seeds as $key => $seed) {
            $has_account = $db->get_row("SELECT * FROM bro_accounts WHERE username = ?", [$seed['username']]);
            
           if (empty($has_account)) {
                $fields = $common->get_insert_fields($seed);

                $db->insert("INSERT INTO bro_accounts {$fields}", array_values($seed));
               echo "{$seed['username']} Created <br/>";
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
        break;
    default:
        # code...
        break;
}