<?php
   if($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    $email = $_POST["email"];
    $password = $_POST["password"];

    $roles = [];
    $emails = [];
    $passwords = [];
    $usernames = [];

    $fp = fopen("./data/users.txt","r");
    while($line = fgets($fp)) {
        $line = trim($line);
        $data = explode(",", $line);
        array_push($roles, $data[0]);
        array_push($emails, $data[1]);
        array_push($passwords, $data[2]);
        array_push($usernames, $data[3]);
    }
    fclose($fp);
   

    for( $i = 0; $i < count($roles); $i++ ) {
   
       if($email == $emails[$i] && $password == $passwords[$i]) {
           $_SESSION["role"] = $roles[$i];
           $_SESSION["email"] = $emails[$i];
           $_SESSION["password"] = $passwords[$i];
           $_SESSION["username"] = $usernames[$i];
           header("Location: index.php");
       }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12">
        <div class="relative py-3 sm:max-w-xl sm:mx-auto">
            <div
                class="absolute inset-0 bg-gradient-to-r from-blue-300 to-blue-600 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
            </div>
            <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
                <div class="max-w-md mx-auto">
                    <div>
                        <h1 class="text-2xl font-semibold">Login Your Account</h1>
                    </div>
                    <form action="login.php" method="POST" class="divide-y divide-gray-200">
                        <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                            <div class="relative">
                                <input autocomplete="off" id="email" name="email" type="text"
                                    class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600"
                                    placeholder="Email address" />
                                <label for="email"
                                    class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Email
                                    Address</label>
                            </div>
                            <div class="relative">
                                <input autocomplete="off" id="password" name="password" type="password"
                                    class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600"
                                    placeholder="Password" />
                                <label for="password"
                                    class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Password</label>
                            </div>
                            <div class="relative">
                                <button type="submit" class="bg-blue-500 text-white rounded-md px-2 py-1">Login</button>
                            </div>
                        </div>
                        <div>
                            <p>Not registered? <a class="text-blue-500 underline" href="register.php">Register</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>