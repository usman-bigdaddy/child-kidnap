<?php
if (isset($_GET["id"]) && !empty($_GET["id"])) {
    include '../connect.php';
    $case_id = $_GET["id"];
    $sql_fetch_image = "SELECT cover_image FROM tb_cases WHERE case_id = $case_id"; // Replace 'your_table_name' with the actual name of your table
    $result_fetch_image = $conn->query($sql_fetch_image);

    if ($result_fetch_image->num_rows > 0) {
        $row_fetch_image = $result_fetch_image->fetch_assoc();
        $image_filename = $row_fetch_image["cover_image"];

        // Delete the image file from the uploads folder
        $image_path = '../uploads/' . $image_filename; // Adjust the path as needed
        if (file_exists($image_path)) {
            unlink($image_path);
        }

        // Delete the case record from the database
        $sql_delete_case = "DELETE FROM tb_cases WHERE case_id = $case_id";
        if ($conn->query($sql_delete_case) === TRUE) {
            echo "Case deleted successfully";
        } else {
            echo "Error deleting case: " . $conn->error;
        }
    }
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
} else {
    // If election ID is not provided, redirect to the previous page
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
}
