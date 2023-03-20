<?php

// System admin add empty input check
function saAddEmptyInput($name, $email, $pwd)
{
    return empty($name) || empty($email) || empty($pwd);
}

// Add system admin profile details
function saAdd($conn, $name, $email)
{
    $sql = "INSERT INTO system_admin (name, email, timestamp) VALUES (?, ?, now());";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: /E-FINE/view/system-admin/sa-register.php?error=stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $name, $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

// View all from any table
function viewAll($conn, $table)
{
    $stmt = $conn->prepare("SELECT * FROM $table");
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return $result;
    } else {
        echo "<div class='alert alert-none alert-info'>
			    <svg><use xlink:href='#info'></use></svg>
				<span>No data available!</span>
			</div>
            <svg style='display: none;'>
                <symbol id='info'>
                    <path d='M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z' />
                </symbol>
            </svg>";
        exit();
    }
}

// Law add empty input check
function lawAddEmptyInput($part, $chapter, $section, $title, $law, $fine, $points)
{
    return empty($part) || empty($chapter) || empty($section) || empty($title) || empty($law) || empty($fine) || empty($points);
}

// Add law
function lawAdd($conn, $act, $part, $chapter, $section, $title, $law, $fine, $points, $userId)
{
    $sql = "INSERT INTO laws (act, part, chapter, section, title, law, fine, points, addedBy, timestamp) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, now());";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: /E-FINE/view/system-admin/law-add.php?error=stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "siiissiii", $act, $part, $chapter, $section, $title, $law, $fine, $points, $userId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: /E-FINE/view/system-admin/law-view.php?error=none");
    exit();
}

function getLawData($conn)
{
    if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) {
        header("location: /E-FINE/view/system-admin/law-view.php?error=stmtFailed");
        exit();
    }

    $id = $_GET['id'];
    $sql = "SELECT * FROM laws WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        return $row;
    } else {
        header("location: /E-FINE/view/system-admin/law-view.php?error=stmtFailed");
        exit();
    }

    mysqli_stmt_close($stmt);
}

function lawUpdate()
{
    // Admin update issue (status)
function adminUpdateIssue($conn, $issueId, $status)
{
    // $sql = "UPDATE issue SET status=" . $status . " WHERE issueId='$issueId';";
    $sql = "UPDATE issue SET status=$status WHERE issueId='$issueId';";
    $update_query = mysqli_query($conn, $sql);

    if ($update_query) {
        header("location: ../admin/issues/viewIssue.php?error=none");
        exit();
    } else {
        header("location: ../admin/issues/viewIssue.php?error=cantUpdate");
        exit();
    }
}
}

// Delete law
function lawDelete($conn)
{
    if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) {
        header("location: /E-FINE/view/system-admin/law-view.php?error=cantDelete");
        exit();
    }

    $id = $_GET['id'];
    $sql = "DELETE FROM laws WHERE id = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: /E-FINE/view/system-admin/law-view.php?error=cantDelete");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        header("location: /E-FINE/view/system-admin/law-view.php?error=deleted");
        exit();
    } else {
        header("location: /E-FINE/view/system-admin/law-view.php?error=cantDelete");
        exit();
    }

    mysqli_stmt_close($stmt);
}

// Police officer add empty input check
function poAddEmptyInput($name, $sNo, $email)
{
    return empty($name) || empty($sNo) || empty($email);
}

// Add police officer profile details
function poAdd($conn, $name, $sNo, $rank, $pStation, $email, $userId)
{
    $sql = "INSERT INTO police_officer (name, sNo, rank, pStation, email, addedBy, timestamp) VALUES (?, ?, ?, ?, ?, ?, now());";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: /E-FINE/view/system-admin/po-add.php?error=stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sisssi", $name, $sNo, $rank, $pStation, $email, $userId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function poUpdate()
{
}

function poDelete()
{
}

// Police station admin and RMV admin add empty input check
function psarmvAddEmptyInput($name, $email)
{
    return empty($name) || empty($email);
}


// Add police station admin profile details
function psaAdd($conn, $province, $district, $name, $email, $userId)
{
    $sql = "INSERT INTO police_station_admin (province, district, name, email, addedBy, timestamp) VALUES (?, ?, ?, ?, ?, now());";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: /E-FINE/view/system-admin/psa-add.php?error=stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssssi", $province, $district, $name, $email, $userId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function psaUpdate()
{
}

function psaDelete()
{
}

// Add RMV admin profile details
function rmvAdd($conn, $name, $email, $userId)
{
    $sql = "INSERT INTO rmv_admin (name, email, addedBy, timestamp) VALUES (?, ?, ?, now());";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: /E-FINE/view/system-admin/rmv-add.php?error=stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssi", $name, $email, $userId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function rmvUpdate()
{
}

function rmvDelete()
{
}