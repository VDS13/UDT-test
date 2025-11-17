<?php
    $file1 = file_get_contents("./mock_data.json");
    $json1 = json_decode($file1, true);

    var_dump($json1);
    
    foreach($json1["deals"] as $value)
        if (in_array($value["STATUS"], array("WON", "LOSE")))
            echo $value["ID"]." ".$value["TITLE"]." ".$value["STATUS"]." ".$value["AMOUNT"]."\n";
