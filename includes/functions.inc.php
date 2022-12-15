<?php

// MAIN FUNCTIONS

// SYSTEM ADMIN FUNCTIONS

// Increment next id
function nextId($conn, $table)
{
    $sql = "SELECT MAX(id) AS id FROM $table;";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        return $result;
        exit();
    }
}

// Login empty input check
function loginEmptyInput($email, $pwd)
{
    if (empty($email)  || empty($pwd)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

// Login validation
function adminLogin($conn, $email, $pwd, $table)
{
    $emailExists = emailExists($conn, $email);

    if ($emailExists === false) {
        header("location: ../index.php?error=invalidLogin");
        exit();
    }

    $pwdHashed = $emailExists["password"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../index.php?error=invalidLogin");
        exit();
    } else if ($checkPwd === true) {
        session_start();
        $_SESSION["id"] = $emailExists["id"];
        $_SESSION["email"] = $emailExists["email"];
        $_SESSION["role"] = $emailExists["role"];
        if ($_SESSION["role"] == "System Admin") {
            header("location: ../system-admin/sa-home.php");
            exit();
        }
        if ($_SESSION["role"] == "Police Officer") {
            header("location: ../system-admin/po-home.php");
            exit();
        }
        if ($_SESSION["role"] == "Police Station Admin") {
            header("location: ../system-admin/psa-home.php");
            exit();
        }
        if ($_SESSION["role"] == "RMV Admin") {
            header("location: ../system-admin/rmv-home.php");
            exit();
        } else {
            header("location: ../index.php?error=invalidLogin");
            exit();
        }
    }
}

// Existing email check
function emailExists($conn, $email)
{
    $sql = "SELECT * FROM admin_login WHERE email = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../system-admin/register.php?error=stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

// System admin register empty input check
function saRegEmptyInput($name, $email, $pwd)
{
    if (empty($name)  || empty($email)  || empty($pwd)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}


// Invalid name check (Must be A-Z, a-z) 
function invalidName($name)
{
    if (!preg_match("/^[a-zA-Z]*$/", $name)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

// Invalid email check
function invalidEmail($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

// Invalid password check (Must be at least 4 characters) 
function invalidPwd($pwd)
{
    if (strlen($pwd) >= 4) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

// Add system admin profile details
function saAdd($conn, $name, $email)
{
    $sql = "INSERT INTO system_admin (name, email, timestamp) VALUES (?, ?, now());";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../../system-admin/register.php?error=stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $name, $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

// Add admin login credentials
function adminRegister($conn, $email, $pwd, $role, $table)
{
    $sql = "INSERT INTO admin_login (id, email, password, role, timestamp) VALUES ((SELECT MAX(id) FROM $table), ?, ?, ?, now());";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../../system-admin/register.php?error=stmtFailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss", $email, $hashedPwd, $role);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

// Law add empty input check
function lawAddEmptyInput($part, $chapter, $section, $title, $law, $fine, $points)
{
    if (empty($part) || empty($chapter) || empty($section) || empty($title) || empty($law) || empty($fine) || empty($points)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

// Add law
function lawAdd($conn, $act, $part, $chapter, $section, $title, $law, $fine, $points)
{
    $sql = "INSERT INTO laws (act, part, chapter, section, title, law, fine, points, timestamp) VALUES (?, ?, ?, ?, ?, ?, ?, ?, now());";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../../system-admin/law-add.php?error=stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "siiissii", $act, $part, $chapter, $section, $title, $law, $fine, $points);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../../system-admin/law-add.php?error=none");
    exit();
}

// View laws
function lawView($conn)
{
    $sql = "SELECT * FROM laws;";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        return $result;
        exit();
    } else {
        // echo "<p>There are no data available!</p>";
        exit();
    }
}

// Police officer add empty input check
function poAddEmptyInput($name, $sNo, $email)
{
    if (empty($name) || empty($sNo) || empty($email)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

// Add police officer profile details
function poAdd($conn, $name, $sNo, $rank, $pStation, $email)
{
    $sql = "INSERT INTO police_officer (name, sNo, rank, pStation, email, timestamp) VALUES (?, ?, ?, ?, ?, now());";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../../system-admin/po-add.php?error=stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sisss", $name, $sNo, $rank, $pStation, $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

// View police officers
function poView($conn)
{
    $sql = "SELECT * FROM police_officer;";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        return $result;
        exit();
    } else {
        // echo "<p>There are no data available!</p>";
        exit();
    }
}

// Police station admin add empty input check
function psaAddEmptyInput($name, $email)
{
    if (empty($name) || empty($email)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

// Add police station admin profile details
function psaAdd($conn, $province, $district, $name, $email)
{
    $sql = "INSERT INTO police_station_admin (province, district, name, email, timestamp) VALUES (?, ?, ?, ?, now());";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../../system-admin/psa-add.php?error=stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssss", $province, $district, $name, $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

// View police station admins
function psaView($conn)
{
    $sql = "SELECT * FROM police_station_admin;";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        return $result;
        exit();
    } else {
        // echo "<p>There are no data available!</p>";
        exit();
    }
}

// RMV admin add empty input check
function rmvAddEmptyInput($name, $email)
{
    if (empty($name) || empty($email)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

// Add RMV admin profile details
function rmvAdd($conn, $name, $email)
{
    $sql = "INSERT INTO rmv_admin (name, email, timestamp) VALUES (?, ?, now());";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../../system-admin/po-add.php?error=stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $name, $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

// View police station admins
function rmvView($conn)
{
    $sql = "SELECT * FROM rmv_admin;";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        return $result;
        exit();
    } else {
        // echo "<p>There are no data available!</p>";
        exit();
    }
}