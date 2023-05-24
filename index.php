<?php
// dejo las pruebas hechas para mostrar con la mayor transparencia posible
// el proceso de creacion de la prueba solicitada
// include_once "Model/RandomUsers.php";
// $randomUser= new RandomUsers;
// echo $randomUser->getUsers(1)["results"][0]["gender"];
// echo json_encode($randomUser->getUsers(1));
?>
<!DOCTYPE html>
<html>
<head>
  <title>Consulta de usuarios aleatorios</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#btnFetchUsers').click(function() {
        var count = $('#userCount').val();

        $.ajax({
          url: 'Controller/randomUserController.php',
          type: 'GET',
          data: { count: count },
          dataType: 'json',
          success: function(response) {
            // Manipular la respuesta JSON recibida aquí
            console.log(response);
          },
          error: function(xhr, status, error) {
            // Manejar errores de la solicitud AJAX aquí
            console.error(error);
          }
        });
      });
    });
  </script>
</head>
<body>
  <h1>Consulta de usuarios aleatorios</h1>
  <label for="userCount">Número de usuarios:</label>
  <input type="number" id="userCount" value="10">
  <button id="btnFetchUsers">Obtener usuarios</button>
</body>
</html>