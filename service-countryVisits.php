<?php
    session_start();
    include 'resources/includes/connect.php';
    include 'resources/lib/AnalyticsGateway.class.php';
    
    $analytics = new AnalyticsGateway($connection);
    
    //sets up content type to allow for web service
    $countryCode = $_SESSION['countryCode'];
    $resultForCountryCodes = $analytics->getAllUniqueCountryCodes();
    
    if (isset($countryCode)) {
        $resultForCountryAndVisits = $analytics->getCountryAndVisits($countryCode);
        $resultAll= array_merge($resultForCountryAndVisits, $resultForCountryCodes);
    }
    else {
        $resultAll = $resultForCountryCodes;
    }
    
    //will swap associative array to json data
    header("Content-type:application/json");
    echo json_encode($resultAll);
?>