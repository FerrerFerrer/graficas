<?php
$host = ""; //IP of your database
$userName = ""; //Username for database login
$userPass = ""; //Password associated with the username
$database = ""; //Your database name

$connectQuery = mysqli_connect($host, $userName, $userPass, $database);
//
if ($_GET['action'] == 'GET_peliculas'){   
    //
    if (mysqli_connect_errno()) {
        echo mysqli_connect_error();
        exit();
    } else {
        $selectQuery = "SELECT * FROM `peliculas`";
        $result = mysqli_query($connectQuery, $selectQuery);
        if (mysqli_num_rows($result) > 0) {
            $result_array = array();
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($result_array, $row);
            }
            echo json_encode($result_array, JSON_FORCE_OBJECT);
        }
        // echo json_encode('no hay resultados');
    }
}
?>