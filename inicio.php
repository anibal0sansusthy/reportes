 <html> 
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Grafico especialidades</title>
		<script type="text/javascript" src="query-3.0.0.js"></script>
		<style type="text/css"></style>
    <script type="text/javascript"></script>
   </head>
   <body>
    <form action="controlador.php" class="form-inline" role="form" METHOD="POST">
      <div class="form-group">
        <label for="fecha" class="col-sm-12 text-danger">FECHA DE INICIO</label>
          <div class="col-lg-12">                                                
            <input type="date" name="fecha_ini" class="form-control" value='2016-09-01' required/>                                                
          </div>                                       
      </div>
      <div class="form-group">
        <label for="fecha" class="col-sm-12 text-danger">FECHA DE FIN</label>
          <div class="col-lg-12">                                                
            <input type="date" name="fecha_fin" class="form-control" value='2016-09-30'required/>                                                
          </div>                                       
      </div>
       <div class="form-group">
          <div class="col-sm-offset-0 col-sm-12">
            <button class="btn btn-primary">BUSCAR</button>
          </div>
        </div>
    </form>
   </body>
</html>