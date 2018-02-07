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
    while($row = mysqli_fetch_array($result)) {
        $response[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}

function getRecipeByName($recipeName="invalid") {
    global $connection;
    if($recipeName == "invalid") {
        return http_response_code(400);
    }
    $query = "SELECT * FROM Calls_For WHERE Recipe_Name=" .$recipeName.;
}