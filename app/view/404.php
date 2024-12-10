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

</head>

<body class="text-center" style="padding-top: 100px">

    <main class="form-signin">
        <h1 class="mb-4">404 - Not Found</h1>
        <p class="lead">The page you are looking for might be in another castle.</p>

        <!-- "Go to Home" button using Bootstrap -->
        <button class="btn btn-primary" onclick="goToHome()">Go to Home</button>

        <script>
            function goToHome() {
                // Replace 'home.html' with the actual path to your home page
                window.location.href = 'homepage.php';
            }
        </script>
    </main>

    <!-- Include Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>