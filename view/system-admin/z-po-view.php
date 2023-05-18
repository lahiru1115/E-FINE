<?php
include_once("sa-dbh.inc.php");
include_once("sa-head.php");
include_once("sa-sidebar.php");
include_once("sa-navbar.php");
require("delete-dialog.php");

ob_start(); // All output generated by the included file will be stored in a buffer instead of being sent directly to the browser.
include "../../includes/main/alerts.inc.php";
$alert = ob_get_clean(); // Retrieves the contents of the output buffer, clears the buffer, and returns the contents as a string.

$options_column = array(
    "officer_id" => "Officer Id",
    "name" => "Name",
    "email" => "Email",
    "police_station" => "Police Station",
    "address" => "Address",
    "phone_no" => "Phone No"
);

$options_police = array(
    "Fine" => "Fine"
);

?>

<section class="home-section">

    <div class="content">

        <div class="title-bar">
            <div class="heading">
                <h1>Police Officers</h1>
            </div>
            <div class="btn-group">
                <!-- <a href="po-add.php"><button class="btn btn-primary">Add New</button></a> -->
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

                            if ($search_column === "police_station") {
                                echo "<select name='search' id='search'>";
                                foreach ($options_police as $option) {
                                    echo "<option value='" . $option . "' " . (($search_term ===  $option) ? "selected" : "") . ">" . $option . "</option>";
                                }
                                echo "</select>";
                            } else {
                                echo "<input type='text' name='search' id='search' value='$search_term'>";
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
            include("../../includes/system-admin/po-view.inc.php");

            // Display records
            if ($result->num_rows > 0) {
            ?>
                <div class="table">
                    <table>
                        <thead>
                            <tr>
                                <th>Officer Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Police Station</th>
                                <th>Address</th>
                                <th>Phone No</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td><?php echo $row['officer_id']; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['police_station']; ?></td>
                                    <!-- Use ternary operators to simplify the if-else statements -->
                                    <td><?php echo (strlen($row['address']) > 100) ? substr($row['address'], 0, 100) . "..." : $row['address']; ?></td>
                                    <td><?php echo $row['phone_no']; ?></td>
                                    <td><a href="law-details.php?id=<?php echo $row['id']; ?>"><i class='bx bx-detail'></i></a></td>
                                    <td><a href="law-edit.php?id=<?php echo $row['id']; ?>"><i class='bx bxs-edit'></i></a></td>
                                    <td>
                                        <a href="../../includes/system-admin/law-delete.inc.php?id=<?php echo $row['id']; ?>" onclick="showDeleteDialog(this); return false;">
                                            <i class="bx bx-trash delBtn"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php echo $alert; ?>
                </div>
            <?php
            }
            ?>

            <?php include("pagination.php"); ?>

        </div>

    </div>

</section>

<script src="../../public/js/search-by-po.js"></script>
<script src="../../public/js/delete-dialog.js"></script>