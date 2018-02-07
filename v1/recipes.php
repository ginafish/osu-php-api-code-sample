include("../credentials.php");
$db = new dbConnection();
$connection = $db->getConnection();

if(!empty($GET["id"])) {
    $recipeName = strval($_GET["id"]);
    getRecipeByName($recipeName);
} else {
    getAllRecipes();
}

function getAllRecipes() {
    global $connection;
    $query = "SELECT * FROM Calls_For";

}

function getRecipeByName($recipeName) {
    global $connection;
    $query = "SELECT * FROM Calls_For WHERE Recipe_Name=" .$recipeName.;
}