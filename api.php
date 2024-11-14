<?php
require_once 'config.php';

header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        $sql = "SELECT * FROM horarios";
        $result = $conn->query($sql);
        $horarios = [];
        while ($row = $result->fetch_assoc()) {
            $horarios[] = $row;
        }
        echo json_encode($horarios);
        break;

    case 'POST':
        $data = json_decode(file_get_contents('php://input'), true);
        $dia = $conn->real_escape_string($data['dia']);
        $hora = $conn->real_escape_string($data['hora']);
        $materia = $conn->real_escape_string($data['materia']);

        $sql = "INSERT INTO horarios (dia, hora, materia) VALUES ('$dia', '$hora', '$materia')";
        if ($conn->query($sql) === TRUE) {
            echo json_encode(['message' => 'Horario creado exitosamente']);
        } else {
            echo json_encode(['error' => 'Error al crear el horario: ' . $conn->error]);
        }
        break;

    case 'PUT':
        $data = json_decode(file_get_contents('php://input'), true);
        $id = $conn->real_escape_string($data['id']);
        $dia = $conn->real_escape_string($data['dia']);
        $hora = $conn->real_escape_string($data['hora']);
        $materia = $conn->real_escape_string($data['materia']);

        $sql = "UPDATE horarios SET dia='$dia', hora='$hora', materia='$materia' WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            echo json_encode(['message' => 'Horario actualizado exitosamente']);
        } else {
            echo json_encode(['error' => 'Error al actualizar el horario: ' . $conn->error]);
        }
        break;

    case 'DELETE':
        $id = $conn->real_escape_string($_GET['id']);
        $sql = "DELETE FROM horarios WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            echo json_encode(['message' => 'Horario eliminado exitosamente']);
        } else {
            echo json_encode(['error' => 'Error al eliminar el horario: ' . $conn->error]);
        }
        break;

    default:
        echo json_encode(['error' => 'Método no permitido']);
        break;
}

$conn->close();
?>