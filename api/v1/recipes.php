<?php
include("../credentials.php");

$db = new dbConnection();
$connection = $db->getConnection();

if(!empty($GET["recipeName"])) {
    $recipeName = strval($_GET["recipeName"]);
    getRecipeByName($recipeName);
} else {
    getAllRecipes();
}



function getAllRecipes() {
    global $connection;
    $query = "SELECT * FROM Calls_For";
    $response = array();
    $result = mysqli_query($connection, $query);
    $response = $response = mysqli_fetch_array($result);
    header('Content-Type: application/json');
    echo json_encode($response);
    mysqli_free_result($result);
}

function getRecipeByName($recipeName="invalid") {
    global $connection;
    if($recipeName == "invalid") {
        return http_response_code(400);
    }
    $query = "SELECT * FROM Calls_For WHERE Recipe_Name=".$recipeName."";
    $response = array();
    $result = mysqli_query($connection, $query);
    $response = mysqli_fetch_array($result);
    header('Content-Type: application/json');
    echo json_encode($response);
    mysqli_free_result($result);
}

?>