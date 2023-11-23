<?php
require_once 'dbconfig.php';

$database = new Database();
$db = $database->dbConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $course = new Course($db);
    $course->id = $_POST['course_id'];
    $course->name = $_POST['course_name'];

    switch ($_POST['action']) {
        case 'add':
            if ($course->create()) {
                echo "Corso aggiunto con successo.";
            } else {
                echo "Errore durante l'aggiunta del corso.";
            }
            break;
        case 'edit':
            if ($course->update()) {
                echo "Corso modificato con successo.";
            } else {
                echo "Errore durante la modifica del corso.";
            }
            break;
        case 'delete':
            if ($course->delete()) {
                echo "Corso eliminato con successo.";
            } else {
                echo "Errore durante l'eliminazione del corso.";
            }
            break;
    }
}
?>
