<?php
	//https://github.com/enteresanlikk/YBS210/blob/master/odev2/index.php

    class Response {
        public function __construct($success = false, $message = '', $data = null)
        {
            $this->success = $success;
            $this->message = $message;
            $this->data = $data;
        }
    }
?>

<?php
    $db_host = 'localhost';
    $db_username = 'root';
    $db_password = 'sifrem';
    $db_name = 'dunya';

    $connection = new mysqli($db_host, $db_username, $db_password, $db_name);

    if($connection->connect_errno) {
        echo json_encode(new Response(false, "database connection error: {$connection->connect_errno}", null));
        exit();
    }

    $result = $connection->query('SELECT ulke_ismi FROM ulkeler');

    if($result->num_rows > 0) {
        $list = [];
        
        while($row = $result->fetch_object()) {
            $country_name = htmlspecialchars($row->ulke_ismi);
            if($country_name[0] == 'A') {
                $list[] = $country_name;
            }
        }

        echo json_encode(new Response(true, 'ok', $list));
    } else {
        echo json_encode(new Response(false, 'no records found.', null));
    }

    $connection->close();
?>