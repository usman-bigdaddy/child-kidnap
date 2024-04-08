<?php
// Check if the case_id query string parameter is set
if (isset($_GET['id'])) {
    // Get the case_id from the query string
    $case_id = $_GET['id'];
    include '../connect.php';
    $sql = "UPDATE tb_cases SET case_status = 'Solved' WHERE case_id = $case_id";

    if ($conn->query($sql) === TRUE) {
        echo "Case solved successfully.";
    } else {
        echo "Error updating case status: " . $conn->error;
    }

    // Close connection
    $conn->close();
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
} else {
    echo "No case ID specified.";
}
