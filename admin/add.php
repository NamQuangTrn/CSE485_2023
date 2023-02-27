<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "btth01_cse485";

// Create connection
$conn = new mysqli($servername, $username, $password);
$conn->select_db($db);

$sql = "select*from theloai";
$query = mysqli_query($conn, $sql);

if (isset($_POST["add"])) {
    $ten_tloai = $_POST["ten_tloai"];
    if ($ten_tloai != "") {
        $add = "insert into theloai(ten_tloai) Value ('$ten_tloai')";
        $query = mysqli_query($conn, $add);
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
        <h1 class="h2">Thêm mới thể loại</h1>
    </div>
    <form action="" method="POST">
        <div class="input-group input-group-lg">
            <input type="text" class="form-control" name="ten_tloai" aria-label="Large" aria-describedby="inputGroup-sizing-sm" placeholder="Nhập tên thể loại">
        </div>
        <button type="submit" class="btn btn-primary mt-5 mb-5 " name="add" value="add"> Thêm mới</button>
        <button type="submit" class="btn btn-warning mt-5 mb-5 text-align-right"> Quay lại</button>

    </form>
</div>