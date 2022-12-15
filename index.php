<html>

<head>
    <title>E-FINE</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>

    <nav class="nav-login">
        <div class="logo">
            <a href="index.php">
                <img src="assets/logo.png">
            </a>
        </div>
    </nav>

    <div class="content content-login">
        <div class="container container-login">
            <h1 class="heading">Admin Login</h1><br>
            <form method="post" action="includes/admin-login.inc.php">
                <label>Email</label>
                <input type="text" placeholder="Enter your email" name="email" id="email">
                <label>Password</label>
                <input type="password" placeholder="Enter your password" name="pwd" id="pwd">
                <button class="btn btn-primary" type="submit" name="submit">LOGIN</button>
            </form>
            <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptyInput") {
                    echo "<p>Fill in all the fields!</p>";
                } else if ($_GET["error"] == "invalidLogin") {
                    echo "<p>Invalid Email or Password!</p>";
                }
            }
            ?>
        </div>
    </div>

</body>

</html>