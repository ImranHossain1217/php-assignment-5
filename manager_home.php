<?php
session_start();

if (!isset($_SESSION["role"]) || $_SESSION["role"] != "manager") {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="bg-gray-100 grid place-items-center min-h-screen">
        <div class="w-1/2 h-1/2 bg-blue-200 p-5">
            <h1 class="text-2xl font-semibold text-center uppercase">welcome to manager Panel</h1>
            <h4 class="text-xl font-semibold capitalize mt-3">Hello,
                <?php echo $_SESSION["username"]; ?>
            </h4>
            <h4 class="text-xl font-semibold mt-3">Your Email:
                <?php echo $_SESSION["email"]; ?>
            </h4>
            <h4 class="text-xl font-semibold capitalize mt-2">You are logged in as
                <?php echo $_SESSION["role"]; ?>
            </h4>
            <div class="mt-2">
                <a class="bg-blue-500 text-white px-3 py-1 text-center rounded" href="logout.php">Logout</a>
            </div>
        </div>
    </div>
</body>

</html>