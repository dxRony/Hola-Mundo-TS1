<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Hola Mundo TS1</title>
  <link rel="stylesheet" href="style.css">
  <base href="/">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
  <h3> #2 - Rony Mauricio Rojas Aguilar - 202031191</h3>
  <div class="main-container">

    <h2 id="js-msj"><?php echo "HOLA MUNDO!!!!"; ?></h2>
    <button onclick="ocultarMensaje()">Ocultar/Mostrar Hola Mundo</button>
  </div>

  <div class="tool-section">
    <h1>Para este hola mundo estoy utilizando:</h1>
    <div class="tool-cards">
      <div class="tool-card">
        <h2>CSS</h2>
        <img src="images/CSS.svg" alt="Imagen de CSS" width="100">
      </div>
      <div class="tool-card">
        <h2>HTML</h2>
        <img src="images/HTML.png" alt="Imagen de HTML" width="100">
      </div>
      <div class="tool-card">
        <h2>JavaScript</h2>
        <img src="images/JS.png" alt="Imagen de JS" width="100">
      </div>
      <div class="tool-card">
        <h2>PHP</h2>
        <img src="images/PHP.svg" alt="Imagen de PHP" width="100">
      </div>
    </div>
  </div>
  

  <div class="form-container">
    <h2>Registro de Estudiantes</h2>   
    <form action="controllers/EstudianteController.php" method="POST">
      <div class="form-group">
        <label for="carnet">Carnet:</label>
        <input type="text" id="carnet" name="carnet" required>
      </div>

      <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
      </div>

      <div class="form-group">
        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad" min="16" max="100" required>
      </div>

      <div class="form-group">
        <label for="genero">Género:</label>
        <select id="genero" name="genero" required>
          <option value="">Elija una opcion</option>
          <option value="M">Masculino</option>
          <option value="F">Femenino</option>
        </select>
      </div>
      <button type="submit">Registrar Estudiante</button>
    </form>
  </div>

  <script src="script.js"></script>
</body>

</html>