<html>

<head>
    <title>E-FINE</title>
    <link rel="stylesheet/less" type="text/css" href="css/main.less" />
    <script src="js/less.js" type="text/javascript"></script>
</head>

<body>

    <nav class="nav-login">
        <div class="logo">
            <a href="index.php">
                <img src="assets/logo.png">
            </a>
            <a href="system-admin/register.php" style="opacity: 0%;">
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
            <?php include("system-admin/errors.php"); ?>
        </div>
    </div>

</body>

</html>