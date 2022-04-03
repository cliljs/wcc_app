# PHP MAILER (26-03-22)
NEED PALITAN TONG PHP MAILER KAILANGAN GAWING RELATIVE PATH LANG DI NAKAFRAMEWORK   

# DB INSERT SAMPLE
```
public function test_insert($_POST)
{
    global $db, $common;

    $arr = [
        "username"     => $payload['username'],
        "password"     => $payload['password'],
        "date_created" => $payload['date_created'],
        "date_updated" => $payload['date_updated'],
    ];

    $insert_fields = $common->get_insert_fields($arr);

    return $db->insert("INSERT INTO ce_test {$insert_fields}", array_values($arr));
}
```

# DB UPDATE SAMPLE
```
public function test_update($_POST, $_GET[id])
{
    global $db, $common;

    $update_fields = $common->get_update_fields($payload);
    
    return $db->update("UPDATE ce_test {$update_fields} WHERE id = {$id}", array_values($payload));
}
```

# DB DELETE SAMPLE
- DALAWANG PARAMS TONG DB->UPDATE PWEDENG OPTIONAL NALANG YUNG PANGALAWANG ARRAY
```
public function test_delete($_GET[id] || $_POST[id])
{
    global $db, $common;

    return $db->update("DELETE FROM ce_test WHERE id = {$id}");
}
```
