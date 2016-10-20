 <html> 
  <head>
    <title></title>
    <link rel="stylesheet" href="stylesheets/style.css">
    <link rel="stylesheet" href="semantic/semantic.css">
    <script src="javascripts/jquery-3.0.0.js"></script>
    <script src="semantic/semantic.js"> </script>
    <script src="javascripts/main.js"></script>
   </head>
   <body>
     <div class="ui pointing menu"><a href="http://localhost:3000/indexreportegrafico" class="item">Inicio Grafico</a>
      <a href="http://localhos/reportes/inicioEdad.php" class="item">Reportes Graficos edades</a>
      <a href="http://localhost/reportes/inicio1.php" class="item">Reportes Graficos especialidades</a>
      <a href="http://localhost/reportes/inicioFza.php" class="item">Reportes Graficos fuerzas</a>
      <a href="http://localhost/reportes/inicioMedicos.php" class="item">Reportes Graficos Medicos</a>
      <a href="http://localhost/reportes/inicioTipo.php" class="item">Reportes Graficos Tipo Asegurado</a>
  
    </div>
    <div class="ui container grid stackable">
      <div class="ten wide column">
        <h2 class="ui header blue dividing">Grafico de Reportes por Tipo de Asegurado</h2>
          <div class="form-nuevocargo">
            <form action="controladorTipo.php" method="post" class="ui form">
              <div class="ui field">
                <label for="fechainicio">Fecha Inicio</label>
                <input type="date" name="fecha_ini" placeholder="Fecha inicio"/>
              </div>
              <div class="ui field">
                <label for="fechafin">Fecha Fin</label>
                <input type="date" name="fecha_fin" placeholder="Fecha fin"/>
              </div>
              <button class="ui button basic black">Generar Grafica</button>
             </form>
          </div>
      </div>
    </div>
   </body>
</html>