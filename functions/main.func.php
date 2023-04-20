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
function loginEmptyInput($email, $password)
{
    return empty($email) || empty($password);
}

// Login validation
function adminLogin($conn, $email, $password, $table)
{
    $emailExists = emailExists($conn, $email);

    if (!$emailExists) {
        header("location: /E-FINE/public/index.php?error=invalidLogin");
        exit();
    }

    $hashedPassword = $emailExists["password"];
    $checkPassword = password_verify($password, $hashedPassword);

    if (!$checkPassword) {
        header("location: /E-FINE/public/index.php?error=invalidLogin");
        exit();
    }

    session_start();
    $_SESSION["user_id"] = $emailExists["user_id"];
    $_SESSION["email"] = $emailExists["email"];
    $_SESSION["user_role"] = $emailExists["user_role"];

    switch ($_SESSION["user_role"]) {
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
    $sql = "SELECT * FROM user_login WHERE email = ?";
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
function invalidPassword($password)
{
    return strlen($password) >= 4;
}

// Add login credentials for SA, PO, PSA and RMV
function adminRegister($conn, $email, $password, $user_role, $table)
{
    $sql = "INSERT INTO user_login (user_id, email, password, user_role, created_at) VALUES ((SELECT MAX(id) FROM $table), ?, ?, ?, now());";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: /E-FINE/view/system-admin/sa-register.php?error=stmtFailed");
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss", $email, $hashedPassword, $user_role);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}
