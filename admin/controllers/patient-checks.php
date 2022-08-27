<?php

    $ref = $_POST['vid'];

    if(!isset($ref)){
        echo "No reference found";
    }

    
    include('./dbcon.php');

    $sql = "SELECT * FROM precheck WHERE visitid='".$ref."'";
    $statement = $db->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll();

    echo json_encode($result);

?>