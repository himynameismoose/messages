<?php
    // This is our data layer!

    function getConnection(){
        $user = 'mriverag_dbuser';
        $pass = 'b#]-t*hs^Y4X';
        $host = 'localhost';
        $database = 'mriverag_it328';

        $connection = mysqli_connect($host, $user, $pass, $database);

        // If we get a false value, something went wrong
        if (!$connection){
            echo 'Error connection to DB: ' . mysqli_connect_error();
            exit;
        }

        return $connection;
    }

    function getMessages(){
        $connection = getConnection();

        // Query for message records
        $query = 'SELECT id, body FROM messages';

        $results = mysqli_query($connection, $query);

        if(!$results){
            echo 'Error retrieving records.';
        }

        $records = array();
        while ($row = mysqli_fetch_assoc($results)){
            $records[] = $row;
        }

        // free up server resources
        mysqli_free_result($results);

        return $records;
    }

    function insertMessage($message){
        $connection = getConnection();

        $query = "INSERT INTO messages (body) VALUES ('$message')";

        return mysqli_query($connection, $query);
    }
