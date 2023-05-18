<?php

// System admin add empty input check
function saAddEmptyInput($name, $email, $password)
{
    return empty($name) || empty($email) || empty($password);
}

// Add system admin profile details
function saAdd($con, $name, $email)
{
    $sql = "INSERT INTO system_admin (name, email, created_at) VALUES (?, ?, now());";
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: /E-FINE/view/system-admin/sa-register.php?error=stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $name, $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function viewAll($conn, $table, $page, $limit, $search_column = "", $search_term = "")
{
    // Calculate offset
    $offset = ($page - 1) * $limit;

    // Prepare and execute query
    if ($search_column && $search_term) {
        $stmt = $conn->prepare("SELECT * FROM $table WHERE $search_column LIKE '$search_term%' ORDER BY id DESC LIMIT ?, ?");
    } else {
        $stmt = $conn->prepare("SELECT * FROM $table ORDER BY id DESC LIMIT ?, ?");
    }
    $stmt->bind_param("ii", $offset, $limit);
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

// Get total number of records
function getTotalRecords($con, $table, $search_column = "", $search_term = "")
{
    if ($search_column && $search_term) {
        $sql = "SELECT COUNT(*) as count FROM $table WHERE $search_column LIKE '$search_term%'";
    } else {
        $sql = "SELECT COUNT(*) as count FROM $table";
    }
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];
    return $count;
}

// Law add empty input check
function lawAddEmptyInput($part_number, $chapter_number, $section_number, $title, $law_text, $fine_amount, $points_deducted)
{
    return empty($part_number) || empty($chapter_number) || empty($section_number) || empty($title) || empty($law_text) || empty($fine_amount) || empty($points_deducted);
}

// Add law
function lawAdd($con, $act, $part_number, $chapter_number, $section_number, $title, $law_text, $law_type, $fine_amount, $points_deducted, $user_id)
{
    $sql = "INSERT INTO laws (act, part_number, chapter_number, section_number, title, law_text, law_type, fine_amount, points_deducted, added_by, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, now());";
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: /E-FINE/view/system-admin/law-add.php?error=stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "siiisssiii", $act, $part_number, $chapter_number, $section_number, $title, $law_text, $law_type, $fine_amount, $points_deducted, $user_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: /E-FINE/view/system-admin/law-view.php?error=none");
    exit();
}

function lawGetData($con)
{
    if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) {
        header("location: /E-FINE/view/system-admin/law-view.php?error=stmtFailed");
        exit();
    }

    $id = $_GET['id'];
    $sql = "SELECT * FROM laws WHERE id = ?";
    $stmt = mysqli_prepare($con, $sql);
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

// Law update empty input check
function lawUpdateEmptyInput($fine_amount, $points_deducted)
{
    return empty($fine_amount) || empty($points_deducted);
}

function lawUpdate($con, $id, $fine_amount, $points_deducted, $user_id)
{
    $sql = "UPDATE laws SET fine_amount=?, points_deducted=?, latest_update_by=?, latest_update_at=now() WHERE id=?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "iiii", $fine_amount, $points_deducted, $user_id, $id);
    $update_query = mysqli_stmt_execute($stmt);

    if ($update_query) {
        header("location: /E-FINE/view/system-admin/law-view.php?error=updated");
        exit();
    } else {
        header("location: /E-FINE/view/system-admin/law-view.php?error=cantUpdate");
        exit();
    }
}

// Delete law
function lawDelete($con)
{
    if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) {
        header("location: /E-FINE/view/system-admin/law-view.php?error=cantDelete");
        exit();
    }

    $id = $_GET['id'];
    $sql = "DELETE FROM laws WHERE id = ?;";
    $stmt = mysqli_stmt_init($con);

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

// // Police officer add empty input check
// function poAddEmptyInput($name, $service_number, $email)
// {
//     return empty($name) || empty($service_number) || empty($email);
// }

// // Add police officer profile details
// function poAdd($con, $name, $service_number, $rank, $police_station, $email, $user_id)
// {
//     $sql = "INSERT INTO police_officer (name, service_number, rank, police_station, email, added_by, created_at) VALUES (?, ?, ?, ?, ?, ?, now());";
//     $stmt = mysqli_stmt_init($con);
//     if (!mysqli_stmt_prepare($stmt, $sql)) {
//         header("location: /E-FINE/view/system-admin/po-add.php?error=stmtFailed");
//         exit();
//     }

//     mysqli_stmt_bind_param($stmt, "sisssi", $name, $service_number, $rank, $police_station, $email, $user_id);
//     mysqli_stmt_execute($stmt);
//     mysqli_stmt_close($stmt);
// }

// function poGetData()
// {
// }

// function poUpdate()
// {
// }

// function poDelete()
// {
// }

// Police station admin add empty input check
function psaAddEmptyInput($police_station, $email)
{
    return empty($police_station) || empty($email);
}

// Add police station admin profile details
function psaAdd($con, $province, $district, $police_station, $email, $court_name, $user_id)
{
    $sql = "INSERT INTO police_station_admin (province, district, name, email, court_name, added_by, created_at) VALUES (?, ?, ?, ?, ?, ?, now());";
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: /E-FINE/view/system-admin/psa-add.php?error=stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sssssi", $province, $district, $police_station, $email, $court_name, $user_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function psaGetData($con)
{
    if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) {
        header("location: /E-FINE/view/system-admin/psa-view.php?error=stmtFailed");
        exit();
    }

    $id = $_GET['id'];
    $sql = "SELECT * FROM police_station_admin WHERE id = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        return $row;
    } else {
        header("location: /E-FINE/view/system-admin/psa-view.php?error=stmtFailed");
        exit();
    }

    mysqli_stmt_close($stmt);
}

function psaUpdateEmptyInput($email)
{
    return empty($email);
}

function psaUpdate($con, $email)
{
    $sql = "UPDATE police_station_admin SET email=?, latest_update_by=?, latest_update_at=now() WHERE id=?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "iii", $email, $user_id, $id);
    $update_query = mysqli_stmt_execute($stmt);

    if ($update_query) {
        header("location: /E-FINE/view/system-admin/psa-view.php?error=updated");
        exit();
    } else {
        header("location: /E-FINE/view/system-admin/psa-view.php?error=cantUpdate");
        exit();
    }
}

// Delete police station admin
function psaDelete($con)
{
    if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) {
        header("location: /E-FINE/view/system-admin/psa-view.php?error=cantDelete");
        exit();
    }

    $id = $_GET['id'];
    $sql = "DELETE FROM police_station_admin WHERE id = ?;";
    $stmt = mysqli_stmt_init($con);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: /E-FINE/view/system-admin/psa-view.php?error=cantDelete");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        header("location: /E-FINE/view/system-admin/psa-view.php?error=deleted");
        exit();
    } else {
        header("location: /E-FINE/view/system-admin/psa-view.php?error=cantDelete");
        exit();
    }

    mysqli_stmt_close($stmt);
}

// Add RMV admin profile details
function rmvAdd($con, $name, $email, $user_id)
{
    $sql = "INSERT INTO rmv_admin (name, email, added_by, created_at) VALUES (?, ?, ?, now());";
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: /E-FINE/view/system-admin/rmv-add.php?error=stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssi", $name, $email, $user_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function rmvGetData()
{
}

function rmvUpdate()
{
}

function rmvDelete()
{
}
