<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Not Found</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <?php
    // IF not session or not logged in
    if (!isset($_SESSION['user_id'])) {
        include '../../resources/includes/header.php';
    } else {
        include '../../resources/includes/headerLogged.php';
    }
    ?>

    <style>
        .big-alert {
            font-size: 2em;
            text-align: center;
            margin-top: 50px;
        }
    </style>

</head>

<body class="text-center" style="padding-top: 100px">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="big-alert">
                    <p>Vui lòng đăng nhập để mua hàng!</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>