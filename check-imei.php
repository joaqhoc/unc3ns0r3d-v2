<?php require_once 'templates/header.php';?>
	<div class="content">
     	<div class="container">
     		<div class="col-md-8 col-sm-8 col-xs-12">
     			<div class="well text-center">
	     			<p><h3>Chequear IMEI IPhone</h3></p>
                         <hr>
							<form class="form-inline" name="form1" action="" method="post" onsubmit="document.getElementById('btn').disabled=true;">
						    <div class="form-group">
						      <p><label for="host">IMEI</label></p>

						      <input class="form-inline" type="text" name="imei" value="" size="22" autofocus="autofocus" />
						    </div>
						    <br />
						    <br />
						    <input type="submit" name="btn" id="btn" value="Check" class="btn btn-default" onclick="this.value='Please wait...';" />
						</form>
     			</div>
     			<br>
     		</div>
               <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="well text-center">
                         <p><h3>Resultado</h3></p>
                         <hr>
                         <p> 
                         <?php 	
	
	
			if(isset($_POST['imei']) AND !empty($_POST['imei'])) //verify if the imei or serial number exists and It's not empty
			{
				
				$file = file_get_contents('https://selfsolve.apple.com/warrantyChecker.do?sn=' . $_POST['imei']); //fetch the URL's response body into a variable
						
				$replace_values = array('null(', ')');
				$file = str_replace($replace_values, '', $file);
					
				$file = json_decode($file, true); //decode the json object into an array
					
				if(array_key_exists('ERROR_CODE', $file)) //verify wether the server has sent an error or not
				{
				
					echo '<div id="wrong_number" > Error de IMEI o es incorrecto </div>';
					
				}
				
				
				else
				{
					?>
					
					<table class="table">
					
						
						<tr>
							<td>Familia</td>
							<td><?php echo $file['DEVICE_FAMILY']; ?></td>
						</tr>

						<tr>
							<td>Modelo</td>
							<td><?php echo $file['PART_DESCR']; ?></td>
						</tr>	
						
						<tr>
							<td><?php if($file['IS_IPHONE'] = 'Y') {echo 'iOS Version';} else{echo 'Version';} ?></td>
							<td><?php echo $file['PROD_VERSION']; ?></td>
						</tr>
						
						<tr>
							<td>Carrier</td>
							<td><?php if($file['CARRIER'] != '') {echo $file['CARRIER'];} else { echo'No disponible';} ?></td>
						</tr>
						
						<tr>
							<td>IMEI</td>
							<td><?php echo $file['AP_IMEI_NUM']; ?></td>
						</tr>
						
						<tr>
							<td>Codigo Pais</td>
							<td><?php echo $file['COUNTRY_CODE']; ?></td>
						</tr>
						
						<tr>
							<td>País de compra</td>
							<td><?php echo $file['PURCH_COUNTRY']; ?></td>
						</tr>
						
						<tr>
							<td>Estado de la garantía</td>
							<td><?php echo $file['HW_COVERAGE_DESC'];?></td>
						</tr>
						
						<tr>
							<td>La garantía termina en</td>
							<td><?php echo $file['COV_END_DATE']; ?></td>
						</tr>
						
						<tr>
							<td>Estado de activación</td>
							<td><?php if($file['ACTIVATION_STATUS'] = 'Y') { echo 'Activado';} else { echo 'No Activado';} ?></td>
						</tr>
						
						<tr>
							<td>SIM Bloqueado</td>
							<td><?php if($file['CARRIER'] = '') {echo 'NO';} else{ echo'SI';}; ?></td>
						</tr>

						<tr>
							<td>Sistema creado por SkarYxD</td>
						</tr>
					
					
					
					</table>
					
				
			<?php	}
			
			
			

			}	
		
					
			?>
                    </div>
                    <br>
                    
                    
               </div>
     		<?php require_once 'templates/sidebar.php';?>
     		
     	</div>
    </div> <!-- /container -->
<?php require_once 'templates/footer.php';?>