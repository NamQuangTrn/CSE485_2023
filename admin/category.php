<?php
$servername = "localhost";
$username = "root";
$password = "";
// $db = "btth01_cse485_ex";
$db = "btth01_cse485";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stm = $conn->prepare("select *from theloai");
    $stm->execute();
    $result = $stm->fetchAll();
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
<?php include './style.php'; ?>
<main class="main">
    <div class="container">
        <a href="add.php" class="btn btn-primary mb-3">Thêm mới</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col" class="text-center">Tên thể loại</th>
                    <th scope="col" class="text-center">Sửa</th>
                    <th scope="col" class="text-center">Xóa</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row" class="text-center">
                        <?php foreach ($result as $row) { ?>
                            <p>
                                <?php echo $row['ma_tloai'] ?>
                            </p>
                        <?php }
                        ?>
                    </td>
                    <td class="text-center">
                        <?php foreach ($result as $row) { ?>
                            <p>
                                <?php echo $row['ten_tloai'] ?>
                            </p>
                        <?php }
                        ?>
                    </td>
                    <td class="text-center">
                        <?php foreach ($result as $row) { ?>
                            <a href="correct.php?id=<?php echo $row['ma_tloai']; ?>" class="btn btn-primary mb-1 text-center"><i class="bi bi-eyedropper"></i></a>
                            <br>
                        <?php }
                        ?>
                    </td>
                    <td class="text-center">
                        <?php foreach ($result as $row) { ?>
                            <a href="delete.php?id=<?php echo $row['ma_tloai']; ?>" class="btn btn-primary mb-1"><i class="bi bi-trash"></i></a>
                            <br>
                        <?php }
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</main>