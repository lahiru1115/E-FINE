<html>

<head>
    <title>E-FINE</title>
    <link rel="stylesheet/less" type="text/css" href="less/main.less" />
    <script type="text/javascript" src="js/less.js"></script>
</head>

<body>

    <nav class="nav-login">
        <div class="logo">
            <a href="#">
                <img src="img/logo.png">
            </a>
            <a href="../view/system-admin/sa-register.php" style="opacity: 0%;">
                <img src="img/logo.png">
            </a>
        </div>
    </nav>

    <div class="content content-login">
        <div class="container container-login">
            <h1 class="heading">Admin Login</h1><br>
            <form method="post" action="../includes/main/admin-login.inc.php">
                <label>Email</label>
                <input type="text" placeholder="Enter your email" name="email" id="email">
                <label>Password</label>
                <input type="password" placeholder="Enter your password" name="pwd" id="pwd">
                 <?php include("../includes/main/alerts.inc.php"); ?>
                <button class="btn btn-primary" type="submit" name="submit">LOGIN</button>
            </form>
           
        </div>
    </div>

</body>

</html>