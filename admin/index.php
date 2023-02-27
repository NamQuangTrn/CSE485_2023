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
    $stm = $conn->prepare("select count(users.id) as cnt from users");
    $stm->execute();
    $result = $stm->fetchAll();


    $stm3 = $conn->prepare("select count(tacgia.ma_tgia) as stg from tacgia");
    $stm3->execute();
    $result3 = $stm3->fetchAll();

    $stm2 = $conn->prepare("select count(theloai.ma_tloai) as stl from theloai");
    $stm2->execute();
    $result2 = $stm2->fetchAll();

    $stm4 = $conn->prepare("select count(baiviet.ma_bviet) as sbv from baiviet");
    $stm4->execute();
    $result4 = $stm4->fetchAll();
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

<?php include './style.php'; ?>

<body>
    <section class="page mt-5">
        <div class="container">
            <table class="table w-100 h-100 border border-primary">
                <thead>
                    <th class="content table-active text-center font-weight-bold h4">
                        <a href="#" class="text-dark">Người dùng</a>
                    </th>
                    <th class="content table-primary text-center font-weight-bold h4">
                        <a href="./category.php" class="text-dark">Thể loại</a>
                    </th>
                    <th class="content table-secondary text-center font-weight-bold h4"><a href="" class="text-dark">Tác giả</a></th>
                    <th class="content table-success text-center font-weight-bold h4"><a href="" class="text-dark">Bài viết</a></th>
                </thead>
                <tbody>
                    <td class="content table-active text-center">
                        <span>
                            <?php foreach ($result as $row) { ?>
                                <p>
                                    <?php echo $row['cnt'] ?>
                                </p>
                            <?php }
                            ?>
                        </span>
                    </td>
                    <td class="content table-primary text-center">
                        <span>
                            <?php foreach ($result2 as $row2) { ?>
                                <p>
                                    <?php echo $row2['stl'] ?>
                                </p>
                            <?php }
                            ?>
                        </span>
                    </td>
                    <td class="content table-secondary text-center">
                        <span>
                            <?php foreach ($result3 as $row3) { ?>
                                <p>
                                    <?php echo $row3['stg'] ?>
                                </p>
                            <?php }
                            ?>
                        </span>
                    </td>
                    <td class="content table-success text-center">
                        <span>
                            <?php foreach ($result4 as $row4) { ?>
                                <p>
                                    <?php echo $row4['sbv'] ?>
                                </p>
                            <?php }
                            ?>
                        </span>
                    </td>
                </tbody>
            </table>
        </div>
    </section>
</body>

</html>