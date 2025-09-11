<?php
$conn = new mysqli("localhost", "root", "", "info");

if (!$conn) {
    echo "Error in connection";
    exit;
}

// === Insert ===
if (isset($_POST["sname"]) && isset($_POST["smarks"])) {
    $name = $_POST["sname"];
    $marks = $_POST["smarks"];

    $stat = $conn->prepare("insert into userinfo (Name, Mark) values(?, ?)");
    $stat->bind_param("si", $name, $marks);

    if ($stat->execute()) {
        echo "Data inserted successfully";
    } else {
        echo "Insert failed";
    }
}

// === Delete ===
if (isset($_POST["delete_name"])) {
    $name = $_POST["delete_name"];

    $stat = $conn->prepare("delete from userinfo where Name=?");
    $stat->bind_param("s", $name);

    if ($stat->execute()) {
        echo "Data deleted successfully";
    } else {
        echo "Delete failed";
    }
}

// === Update Name ===
if (isset($_POST["old_name"]) && isset($_POST["new_name"])) {
    $old = $_POST["old_name"];
    $new = $_POST["new_name"];

    $stat = $conn->prepare("update userinfo set Name=? where Name=?");
    $stat->bind_param("ss", $new, $old);

    if ($stat->execute()) {
        echo "Name updated successfully";
    } else {
        echo "Update failed";
    }
}

// === Update Marks ===
if (isset($_POST["update_name"]) && isset($_POST["update_marks"])) {
    $name = $_POST["update_name"];
    $marks = $_POST["update_marks"];

    $stat = $conn->prepare("update userinfo set Mark=? where Name=?");
    $stat->bind_param("is", $marks, $name);

    if ($stat->execute()) {
        echo "Marks updated successfully";
    } else {
        echo "Update failed";
    }
}

// === Display All ===
if (isset($_GET["fetch_all"])) {
    $result = $conn->query("select Name, Mark from userinfo");
    $rows = [];

    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }

    echo json_encode($rows);
}
?>
