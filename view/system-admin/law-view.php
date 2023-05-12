<?php
include_once("sa-dbh.inc.php");
include_once("sa-head.php");
include_once("sa-sidebar.php");
include_once("sa-navbar.php");

$options_column = array(
    "id" => "Id",
    "act" => "Act",
    "part_number" => "Part",
    "chapter_number" => "Chapter",
    "section_number" => "Section",
    "title" => "Title",
    "law_text" => "Law",
    "fine_amount" => "Fine",
    "points_deducted" => "Points",
    "added_by" => "Added by",
    "created_at" => "Created at",
    "latest_update_by" => "Latest update by",
    "latest_update_at" => "Latest update at"
);

$options_act = array(
    "Motor Traffic (AMENDMENT) Act, No. 8 of 2009" => "Motor Traffic (AMENDMENT) Act, No. 8 of 2009"
);

?>

<section class="home-section">

    <div class="content">

        <div class="title-bar">
            <div class="heading">
                <h1>Traffic Violation Laws</h1>
            </div>
            <div class="btn-group">
                <!-- <div class="quick-search">
                    <input type="text" name="quick-search" id="quick-search" placeholder="Quick Search...">
                </div> -->
                <a href="law-add.php"><button class="btn btn-primary">Add New</button></a>
            </div>
        </div>

        <div class="container">
            <form method="get">
                <div class="search-by">
                    <div class="search-by-left">
                        <span>Search by</span>
                        <select name="column" id="column" onchange="changeInputType()">
                            <?php foreach ($options_column as $value => $label) {
                                $selected = '';
                                if (isset($_GET['column']) && $_GET['column'] == $value) {
                                    $selected = 'selected';
                                }
                                echo "<option value='$value' $selected>$label</option>";
                            } ?>
                        </select>
                        <span id="search-input-container">
                            <?php
                            $search_term = isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '';
                            $search_column = isset($_GET['column']) ? $_GET['column'] : '';
                            if ($search_column === "act") {
                                echo "<select name='search' id='search' ><option value=''>Motor Traffic (AMENDMENT) Act, No. 8 of 2009</option></select>";
                            } else if ($search_column === "title" || $search_column === "law_text") {
                                echo "<input type='text' name='search' id='search' value='$search_term'>";
                            } else if ($search_column === "created_at" || $search_column === "latest_update_at") {
                                echo "<input type='date' name='search' id='search' value='$search_term'>";
                            } else if ($search_column === "id" || $search_column === "part_number" || $search_column === "chapter_number" || $search_column === "section_number" || $search_column === "fine_amount" || $search_column === "points_deducted" || $search_column === "added_by" || $search_column === "latest_update_by") {
                                echo "<input type='number' name='search' id='search' value='$search_term'>";
                            } else {
                                echo "<input type='number' name='search' id='search' value='$search_term'>";
                            }
                            ?>
                        </span>
                    </div>
                    <div class="search-by-right btn-group">
                        <div>
                            <button class="btn btn-secondary" type="button" onclick="location.href='?page=1'">Clear</button>
                        </div>
                        <div>
                            <button class="btn btn-primary" type="submit">Search</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="container">
            <?php
            include("../../includes/system-admin/law-view.inc.php");

            // Display records
            if ($result->num_rows > 0) {
            ?>
                <div class="table">
                    <table>
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Act</th>
                                <th>Title</th>
                                <th>Fine (Rs.)</th>
                                <th>Points</th>
                                <th>Created at</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php if (strlen($row['act']) > 50) {
                                            echo substr($row['act'], 0, 50) . "...";
                                        } else {
                                            echo $row['act'];
                                        } ?></td>
                                    <td><?php if (strlen($row['title']) > 100) {
                                            echo substr($row['title'], 0, 100) . "...";
                                        } else {
                                            echo $row['title'];
                                        } ?></td>
                                    <td><?php echo $row['fine_amount']; ?></td>
                                    <td><?php echo $row['points_deducted']; ?></td>
                                    <td><?php echo $row['created_at']; ?></td>
                                    <td><a href="law-details.php?id=<?php echo $row['id']; ?>"><i class='bx bx-detail'></i></a></td>
                                    <td><a href="law-edit.php?id=<?php echo $row['id']; ?>"><i class='bx bxs-edit'></i></a></td>
                                    <td><a href="../../includes/system-admin/law-delete.inc.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Do you really want to delete this record?')"><i class="bx bx-trash delBtn"></i></a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php include("../../includes/main/alerts.inc.php"); ?>
                </div>
            <?php
            }
            ?>

            <?php include("pagination.php"); ?>

        </div>

    </div>

</section>

<script src="../../public/js/search-by-law.js"></script>
<!-- <script src="../../public/js/quick-search-law.js"></script> -->