<?php
require_once 'lib/utils.php';

$id = $_GET['id'] ?? null;

$db = connectToDB();
$query = 'SELECT image_type, image_data FROM ideas WHERE id=?';

    try {
        $stmt = $db->prepare($query);
        $stmt->execute([$id]);
        $idea = $stmt->fetch();

        // Failed to get an image back?
        if (!$idea) throw new Exception();
    }
    catch (Exception $e) {
        // Failed, so 404
        http_response_code(404);
        die();
    }

    header('Content-type: ' . $idea['image_type']);
    echo $idea['image_data'];

    ?>