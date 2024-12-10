<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- include config and header -->
    <?php
    include '../../resources/head/head-config.php';
    ?>

    <title>Account</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../../public/css/account.css">
    <!-- include header -->

    <?php
    session_start();

    // IF not session or not logged in
    if (!isset($_SESSION['user_id'])) {
        header("Location: ../../app/view/404.php");
    }

    include '../../resources/includes/headerLogged.php';

    include '../model/connectdb.php';

    $id = $_SESSION['user_id'];
    $sql = "SELECT * FROM users where id = $id";
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    ?>
</head>

<body>
    <div class="account__container">
        <div class="account__person mx-auto">
            <p><i data-feather="user" class="person__icon"></i>
                <?php echo $row['full_name']; ?>
            </p>
            <p><i data-feather="phone" class="person__icon"></i>
                <?php echo $row['phone']; ?>
            </p>
            <p> <i data-feather="mail" class="person__icon"></i>
                <?php echo $row['email']; ?>
            </p>

            <form method="post" action="../controller/delete-account-controller.php">
                <input type="submit" class="btnDelete" value="XÓA TÀI KHOẢN">
            </form>
        </div>
    </div>
</body>
<script>feather.replace()</script>
<?php include '../../resources/includes/footer.php' ?>

</html>