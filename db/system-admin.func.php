<?php

// System admin add empty input check
function saAddEmptyInput($name, $email, $pwd)
{
    if (empty($name) || empty($email) || empty($pwd)) {
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
        header("location: ../../public/system-admin/main/register.php?error=stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $name, $email);
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
function lawAdd($conn, $act, $part, $chapter, $section, $title, $law, $fine, $points, $userId)
{
    $sql = "INSERT INTO laws (act, part, chapter, section, title, law, fine, points, addedBy, timestamp) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, now());";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../../public/system-admin/law/law-add.php?error=stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "siiissiii", $act, $part, $chapter, $section, $title, $law, $fine, $points, $userId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../../public/system-admin/law/law-add.php?error=none");
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
        header("location: ../../public/system-admin/law/law-view.php?error=noData");
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
function poAdd($conn, $name, $sNo, $rank, $pStation, $email, $userId)
{
    $sql = "INSERT INTO police_officer (name, sNo, rank, pStation, email, addedBy, timestamp) VALUES (?, ?, ?, ?, ?, ?, now());";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../../public/system-admin/po/po-add.php?error=stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sisssi", $name, $sNo, $rank, $pStation, $email, $userId);
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
        header("location: ../../public/system-admin/po/po-view.php?error=noData");
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
function psaAdd($conn, $province, $district, $name, $email, $userId)
{
    $sql = "INSERT INTO police_station_admin (province, district, name, email, addedBy, timestamp) VALUES (?, ?, ?, ?, ?, now());";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../../public/system-admin/psa/psa-add.php?error=stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssssi", $province, $district, $name, $email, $userId);
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
        header("location: ../../public/system-admin/psa/psa-view.php?error=noData");
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
function rmvAdd($conn, $name, $email, $userId)
{
    $sql = "INSERT INTO rmv_admin (name, email, addedBy, timestamp) VALUES (?, ?, ?, now());";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../../public/system-admin/rmv/rmv-add.php?error=stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssi", $name, $email, $userId);
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
        header("location: ../../public/system-admin/rmv/rmv-view.php?error=noData");
        exit();
    }
}
