<?php

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
        header("location: ../../index.php?error=invalidLogin");
        exit();
    }

    $pwdHashed = $emailExists["password"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../../index.php?error=invalidLogin");
        exit();
    } else if ($checkPwd === true) {
        session_start();
        $_SESSION["id"] = $emailExists["id"];
        $_SESSION["email"] = $emailExists["email"];
        $_SESSION["role"] = $emailExists["role"];
        if ($_SESSION["role"] == "System Admin") {
            header("location: ../../public/system-admin/main/sa-home.php");
            exit();
        }
        if ($_SESSION["role"] == "Police Officer") {
            header("location: ../../public/police-officer/main/po-home.php");
            exit();
        }
        if ($_SESSION["role"] == "Police Station Admin") {
            header("location: ../../public/police-station-admin/main/psa-home.php");
            exit();
        }
        if ($_SESSION["role"] == "RMV Admin") {
            header("location: ../../public/rmv-admin/main/rmv-home.php");
            exit();
        } else {
            header("location: ../../index.php?error=invalidLogin");
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
        header("location: ../../public/system-admin/main/register.php?error=stmtFailed");
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

// Invalid name check (Must be A-Z, a-z or space) 
function invalidName($name)
{
    if (!preg_match("/^[a-zA-Z\s]*$/", $name)) {
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

// Add login credentials for SA, PO, PSA and RMV
function adminRegister($conn, $email, $pwd, $role, $table)
{
    $sql = "INSERT INTO admin_login (id, email, password, role, timestamp) VALUES ((SELECT MAX(id) FROM $table), ?, ?, ?, now());";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../../public/system-admin/main/register.php?error=stmtFailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss", $email, $hashedPwd, $role);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}
