<?php

$limit = 10;
$table = "laws";

// Set page parameters
$page = $_GET['page'] ?? 1;

// Check if search form submitted
$search_column = $_GET['column'] ?? "";
$search_term = $_GET['search'] ?? "";
$result = viewAll($conn, $table, $page, $limit, $search_column, $search_term);

// Get total number of records 
$total_rows = getTotalRecords($conn, $table, $search_column, $search_term);

// Calculate total number of pages
$total_pages = ceil($total_rows / $limit);
