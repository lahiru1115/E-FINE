<?php

// Increment next id
function nextId($conn, $table)
{
    $sql = "SELECT MAX(id) AS id FROM $table;";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        return "Unavailable!";
    }

    $row = mysqli_fetch_assoc($result);
    return $row['id'] ? $row['id'] + 1 : 1;
}


// Login empty input check
function loginEmptyInput($email, $pwd)
{
    return empty($email) || empty($pwd);
}

// Login validation
function adminLogin($conn, $email, $pwd, $table)
{
    $emailExists = emailExists($conn, $email);

    if (!$emailExists) {
        header("location: /E-FINE/public/index.php?error=invalidLogin");
        exit();
    }

    $pwdHashed = $emailExists["password"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if (!$checkPwd) {
        header("location: /E-FINE/public/index.php?error=invalidLogin");
        exit();
    }

    session_start();
    $_SESSION["id"] = $emailExists["id"];
    $_SESSION["email"] = $emailExists["email"];
    $_SESSION["role"] = $emailExists["role"];

    switch ($_SESSION["role"]) {
        case "System Admin":
            redirect("/E-FINE/view/system-admin/sa-home.php");
            break;
        case "Police Officer":
            redirect("/E-FINE/view/police-officer/po-home.php");
            break;
        case "Police Station Admin":
            redirect("/E-FINE/view/police-station-admin/psa-home.php");
            break;
        case "RMV Admin":
            redirect("/E-FINE/view/rmv-admin/rmv-home.php");
            break;
        default:
            redirect("/E-FINE/public/index.php?error=invalidLogin");
            break;
    }
}

function redirect($url)
{
    header("location: $url");
    exit();
}

// Existing email check
function emailExists($conn, $email)
{
    $sql = "SELECT * FROM admin_login WHERE email = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: /E-FINE/view/system-admin/sa-register.php?error=stmtFailed");
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
    return !preg_match("/^[a-zA-Z\s]*$/", $name);
}

// Invalid email check
function invalidEmail($email)
{
    return !filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Invalid password check (Must be at least 4 characters) 
function invalidPwd($pwd)
{
    return strlen($pwd) >= 4;
}

// Add login credentials for SA, PO, PSA and RMV
function adminRegister($conn, $email, $pwd, $role, $table)
{
    $sql = "INSERT INTO admin_login (id, email, password, role, timestamp) VALUES ((SELECT MAX(id) FROM $table), ?, ?, ?, now());";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: /E-FINE/view/system-admin/sa-register.php?error=stmtFailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss", $email, $hashedPwd, $role);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}
