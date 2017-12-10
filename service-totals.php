<?php
    include 'resources/includes/connect.php';
    include 'resources/lib/AnalyticsGateway.class.php';
    
    $analytics = new AnalyticsGateway($connection);
    
    //sets up content type to allow for web service
    $resultTotalVisits = $analytics->getTotalVisitsInJune();
    $resultUnique = $analytics->getTotalUniqueVisits();
    $resultToDo = $analytics->getTotalToDosInJune();
    $resultMessages = $analytics->getTotalNumEmpMsgJune();
    
    $resultTotal = array_merge($resultTotalVisits, $resultUnique, $resultToDo, $resultMessages);
    
    
    //will swap associative array to json data
    header("Content-type:application/json");
    echo json_encode($resultTotal);
?>