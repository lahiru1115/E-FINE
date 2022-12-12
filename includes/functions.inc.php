<?php

function nextId($conn, $table)
{
    $sql = "SELECT MAX(id) AS id FROM $table;";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        return $result;
        exit();
    } else {
        echo "<p>There are no data available!</p>";
        exit();
    }
}

function lawAddEmptyInput($part, $chapter, $section, $title, $law, $fine, $points)
{
    if (empty($part) || empty($chapter) || empty($section) || empty($title) || empty($law) || empty($fine) || empty($points)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

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

function lawView($conn)
{
    $sql = "SELECT * FROM laws;";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        return $result;
        exit();
    } else {
        echo "<p>There are no data available!</p>";
        exit();
    }
}
