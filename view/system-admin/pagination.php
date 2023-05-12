<?php

$search_term = isset($_GET['search']) ? $_GET['search'] : '';
$search_column = isset($_GET['column']) ? $_GET['column'] : '';

// Sanitize input variables
$search_term = htmlspecialchars($search_term, ENT_QUOTES);
$search_column = htmlspecialchars($search_column, ENT_QUOTES);

// Determine the start and end limits for the current page
$start_limit = ($page - 1) * $limit;
$end_limit = min($start_limit + $limit, $total_rows);

// Output the pagination HTML using sprintf
$output = '<div class="pagination">';
$output .= '<div class="pagination-left">';
$output .= sprintf('Showing %d to %d of %d records', $start_limit + 1, $end_limit, $total_rows);
$output .= '</div>';
$output .= '<div class="pagination-right">';
if ($total_pages > 1) {
    if ($page > 1) {
        $output .= sprintf('<a href="?column=%s&search=%s&page=%d">Previous</a>', $search_column, $search_term, $page - 1);
    } else {
        $output .= '<span class="pagination-disabled">Previous</span>';
    }
    for ($i = 1; $i <= $total_pages; $i++) {
        if ($i == $page) {
            $output .= sprintf(' <span class="pagination-active">%d</span> ', $i);
        } else {
            $output .= sprintf('<a href="?column=%s&search=%s&page=%d">%d</a>', $search_column, $search_term, $i, $i);
        }
    }
    if ($page < $total_pages) {
        $output .= sprintf(' <a href="?column=%s&search=%s&page=%d">Next</a>', $search_column, $search_term, $page + 1);
    } else {
        $output .= '<span class="pagination-disabled">Next</span>';
    }
}
$output .= '</div>';
$output .= '</div>';

echo $output;

// Sanitize input variables: The $search_term and $search_column variables are taken directly from the URL parameters,
// which could potentially lead to SQL injection attacks or other security vulnerabilities. 
// It's a good idea to sanitize or validate these variables before using them in a query or other sensitive operation.

// Cache database queries: If the $total_rows and $total_pages variables are based on a database query,
// it's a good idea to cache the results to avoid executing the same query multiple times.

// Use sprintf or concatenation: Instead of concatenating strings with the . operator, you can use sprintf() function to make
// the code more readable and easier to modify in the future.

// Reduce the number of database calls: If the data set is small enough,
// it's possible to fetch all data from the database once and store it in an array, rather than making a separate query for each page.
// This can greatly reduce the number of database calls and improve performance.

// Use a template engine: Instead of hard-coding the HTML markup in the PHP code,
// consider using a template engine like Twig or Blade. This can make the code more readable and easier to modify,
// especially for front-end developers who are not familiar with PHP.
