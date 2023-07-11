<?php
session_start();
require 'config.php';

if (isset($_GET['id'])) {
    $deleteResult = $collection->deleteOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);

    if ($deleteResult->getDeletedCount() > 0) {
        $_SESSION['success'] = "Stamp deleted successfully";
    } else {
        $_SESSION['error'] = "Stamp not found";
    }
}

header("Location: index.php");
?>
