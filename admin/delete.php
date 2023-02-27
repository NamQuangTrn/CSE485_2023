<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "btth01_cse485";;

// Create connection
$conn = new mysqli($servername, $username, $password);
$conn->select_db($db);

$sql = " delete from theloai where ma_tloai = $id";
$query = mysqli_query($conn, $sql);
header("location: ./index.php");







// Check connection


?>
