<?php require_once 'templates/header.php';?>
  <script src="http://maps.google.com/maps?file=api&v=2&key=AIzaSyB8WA1ixWF0p1q5pSV51_pjj45IaOzQzX0" type="text/javascript"></script>
  <script language="JavaScript" src="http://www.geoplugin.net/javascript.gp" type="text/javascript"></script>
 
  <script type="text/javascript">
    function load() {
      if (GBrowserIsCompatible()) {
        var map = new GMap2(document.getElementById("map"));
        map.addControl(new GLargeMapControl());
        map.addControl(new GMapTypeControl());
        map.setCenter(new GLatLng(geoplugin_latitude(), geoplugin_longitude()), 12);
      }
    }
  </script>
<?php
$IP = '';
  if (getenv('HTTP_CLIENT_IP')) {
    $IP =getenv('HTTP_CLIENT_IP');
  } elseif (getenv('HTTP_X_FORWARDED_FOR')) {
    $IP =getenv('HTTP_X_FORWARDED_FOR');
  } elseif (getenv('HTTP_X_FORWARDED')) {
    $IP =getenv('HTTP_X_FORWARDED');
  } elseif (getenv('HTTP_VIA')) {
    $IP = getenv('HTTP_VIA');
  } elseif (getenv('HTTP_USERAGENT_VIA')) {
    $IP = getenv('HTTP_USERAGENT_VIA');
  } elseif (getenv('HTTP_X_CLUSTER_CLIENT_IP')) {
    $IP =getenv('HTTP_X_CLUSTER_CLIENT_IP');
  } elseif (getenv('HTTP_FORWARDED_FOR')) {
    $IP =getenv('HTTP_FORWARDED_FOR');
  } elseif (getenv('HTTP_FORWARDED')) {
    $IP = getenv('HTTP_FORWARDED');
  } elseif (getenv('HTTP_PROXY_CONNECTION')) {
    $IP = getenv('HTTP_PROXY_CONNECTION');
  } elseif (getenv('HTTP_XPROXY_CONNECTION')) {
    $IP = getenv('HTTP_XPROXY_CONNECTION');
  } elseif (getenv('HTTP_PC_REMOTE_ADDR')) {
    $IP = getenv('HTTP_PC_REMOTE_ADDR');
  } else {
    $IP = $_SERVER['REMOTE_ADDR'];
  }
?>

<div class="content">
      <div class="container">

          <h1>Tu Información:</h1>
<p>

        <div class="row mb-2">
        <div class="col-md-6">
          <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <strong class="d-inline-block mb-2 text-primary">IP</strong>
                <form class="form-inline">
                  <div class="form-group mx-sm-3 mb-2">
                    <input type="text" class="form-control" value="<?php echo($IP);?>" disabled="1">
                  </div>
                </p> 
                <p>
                    <strong class="d-inline-block mb-2 text-primary">SO</strong>
                    <div class="form-group mx-sm-3 mb-2"> 
                    <input type="text" class="form-control" value="<?php include 'include/sistema.php'; ?>" disabled="1">
                  </div>
                </p> 
                <p>
                    <strong class="d-inline-block mb-2 text-primary">NAVEGADOR</strong>
                    <div class="form-group mx-sm-3 mb-2"> 
                    <input type="text" class="form-control" value="<?php include 'include/navegador.php'; ?>" disabled="1">
                  </div>
                </p> 
                </form>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
                <strong class="d-inline-block mb-2 text-primary">Usuario</strong>
                <form class="form-inline">
                  <div class="form-group mx-sm-3 mb-2">
                    <input type="text" class="form-control" value="<?php echo $_SESSION['name']; ?>" disabled="1">
                  </div>
                </p> 
                <p>
                    <strong class="d-inline-block mb-2 text-primary">Email</strong>
                    <div class="form-group mx-sm-3 mb-2"> 
                    <input type="text" class="form-control" value="<?php echo $_SESSION['email']; ?>" disabled="1">
                  </div>
                </p> 
                <p>
                    <strong class="d-inline-block mb-2 text-primary">Tipo de Cuenta</strong>
                    <div class="form-group mx-sm-3 mb-2"> 
                    <input type="text" class="form-control" value="<?php echo $_SESSION['level']; ?>" disabled="1">
                  </div>
                </p> 
                </form>
          </div>
        </div>
      </div>
    </div>

        <br>
        <center>
        <?php
          $query = @unserialize(file_get_contents('http://ip-api.com/php/'.$IP));
          if($query && $query['status'] == 'success') {
            echo 'Hello visitor from '.$query['country'].', '.$query['city'].'!';
          } else {
            echo 'No hay localizacion actual';
          }
        ?>
        <hr>
            <div id="map" style="width: 500px; height: 300px"></div>
              <script>load();</script>
        </center>
        <br><br>
        
        </div>
     		<?php require_once 'templates/sidebar.php';?>
     		
    </div> <!-- /container -->
<?php require_once 'templates/footer.php';?>
	

