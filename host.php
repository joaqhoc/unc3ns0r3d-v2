<?php

if (!isset($_POST["submit"])) {
	$host = "HOST/IP";
	$port = "PUERTO";
	$status = '<span class="label label-success"><i class="far fa-smile"></i></span> o <span class="label label-danger"><i class="far fa-frown"></i></span>';
	$response = 0;
} else {
	$host = $_POST['host'];
	$port = $_POST['port'];
	$status = '<span class="label label-danger">No Valido</span>';
	$response = getStatus($host, $port);
	//validation
	if (!is_numeric($port) || $port < 0 || $port > 65535) {
		echo '<meta http-equiv="refresh" content="0" />';
		echo '<script>alert("El puerto no es Valido")</script>';
	}else{
		if ($response > 0) {
			$status = '<span class="label label-success"><i class="far fa-smile"></i></span>';
		} else {
			$status = '<span class="label label-danger"><i class="far fa-frown"></i></span>';
		}
	}
}


function getStatus($host, $port)
{
	$start_time = microtime(TRUE);
	$timeout = 2;
	$socket = @fsockopen($host, $port, $errorNo, $errorStr, $timeout);
	if (!$socket) {
		return 0;
	}
	else {
		$end_time = microtime(TRUE);
		$time_taken = $end_time - $start_time;
		$time_taken = round($time_taken,5);
		return $time_taken * 1000;
	}
}
?>
<?php require_once 'templates/header.php';?>
	<div class="content">
     	<div class="container">
     		<div class="col-md-8 col-sm-8 col-xs-12">
     			<div class="well text-center">
	     			<p><h3>Chequear Estado del Servidor</h3></p>
                         <hr>
						<form class="form-inline" action="" method="post">
						    <div class="form-group">
						      <label for="host">Host:</label>
						      <input type="host" class="form-control" id="host" placeholder="HOST/IP" name="host" required>
						    </div>
						    <br />
						    <br />
						    <div class="form-group">
						      <label for="port">Puerto:</label>
						      <input type="text" class="form-control" id="port" placeholder="PUERTO" name="port" required>
						    </div>
						    <br />
						    <br />
						    <button name="submit" class="btn btn-default" id="submit" >Chequear</button>
						</form>
     			</div>
     			<br>
     		</div>
               <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="well text-center">
                         <p><h3>Resultado</h3></p>
                         <hr>
                         <p> 
                    <table class="table">
                        <tr>
							<th class="text-center">Host/IP</th>
							<th class="text-center">Puerto</th>
							<th class="text-center">Estado</th>
							<th class="text-center">Tiempo</th>
						</tr>
						<tr>
							<td class="text-center"><?= $host ?></td>
							<td class="text-center"><?= $port ?></td>
							<td class="text-center"><?= $status ?></td>
							<td class="text-center"><?= $response ?> ms</td>
						</tr>
					</table>
                    </div>
                    <br>
                    
                    
               </div>
     		<?php require_once 'templates/sidebar.php';?>
     		
     	</div>
    </div> <!-- /container -->
<?php require_once 'templates/footer.php';?>