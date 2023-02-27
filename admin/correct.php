<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "btth01_cse485";

// Create connection
$conn = new mysqli($servername, $username, $password);
$conn->select_db($db);

$sql = " select * from theloai where ma_tloai = $id";
$query = mysqli_query($conn, $sql);

$rows = mysqli_fetch_array($query);
echo "thành công";


if (isset($_POST["correct"])) {
    $ten_tloai = $_POST["ten_tloai"];
    if ($ten_tloai != "") {
        $correct = "Update theloai set ten_tloai = '$ten_tloai' where ma_tloai = $id";
        $query = mysqli_query($conn, $correct);
        echo "thành công";
        header("location: ./index.php");
    } else {
        echo "vui lòng nhập đầy đủ thông tin";
    }
}



// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
<?php include './style.php'; ?>
<div class="container border border-primary">
    <div class="titel mb-5 mt-5">
        <h1 class="h2">Sửa thông tin thể loại</h1>
    </div>
    <form action="" method="POST">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Mã thể loại</span>
            </div>
            <input type="text" class="form-control" readonly placeholder="" aria-label="Username" aria-describedby="basic-addon1" value="<?php echo $rows['ma_tloai']; ?>">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Tên thể loại</span>
            </div>
            <input type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1" name="ten_tloai" value="<?php echo $rows['ten_tloai']; ?>">
        </div>
        <button type="submit" class="btn btn-primary mt-5 mb-5 " name="correct" value="corect"> Sửa</button>
        <button type="submit" class="btn btn-warning mt-5 mb-5 text-align-right"> Quay lại</button>

    </form>
</div>