<?php
    include 'resources/includes/connect.php';
    include 'resources/lib/AnalyticsGateway.class.php';
    
    $analytics = new AnalyticsGateway($connection);
    
    //sets up content type to allow for web service
    
    
    $result = $analytics->getGeoChartData();
    
    //will swap associative array to json data
    header("Content-type:application/json");
    echo json_encode($result);
?>