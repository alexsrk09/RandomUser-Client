<?php
require_once '../Model/RandomUsers.php';

// Verificar si la solicitud es una llamada AJAX mediante GET
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
  // Obtener el número de usuarios solicitado desde los parámetros GET
  $count = isset($_GET['count']) ? intval($_GET['count']) : 10;
  $randomUsers = new RandomUsers();
  $users = $randomUsers->getUsers($count);
  // Devolver la respuesta en formato JSON
  header('Content-Type: application/json');
  echo json_decode($users);
  exit;
} else {
  // Si la solicitud no es una llamada AJAX o no es mediante GET, retornar un error
  http_response_code(400);
  echo json_encode(['error' => 'Invalid request']);
  exit;
}
?>