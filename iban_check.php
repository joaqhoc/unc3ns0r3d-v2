<?php require_once 'templates/header.php';?>
    <div class="content">
        <div class="container">
            <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="well text-center">
                    <p><h3>IBAN Checker</h3></p>
                         <hr>
                        <form class="form-inline" action="iban_check.php" method="post">
                            <div class="form-group">
                              <label for="host">IBAN:</label>
                              <input type="text" name="iban_check" placeholder="enter IBAN" class="form-control">
                            </div>
                            <br />
                            <br />
                            <div class="form-group">
                                <input type="submit" name="submit" value="submit" class="btn btn-primary">
                            </div>
                        </form>
                </div>
                <br>
            </div>
               <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="well text-center">
                         <p><h3>Resultado</h3></p>
                         <hr>
                         <?php include "validity_check.php"; ?>

                        <?php if(isset($_POST['submit'])) {

                            $iban = $_POST['iban_check'];
                            validity_check($iban);
                            echo $result;
                        }

                        ?>
                         <p> 
                    </div>
                    <br>
                    
                    
               </div>
            <?php require_once 'templates/sidebar.php';?>
            
        </div>
    </div> <!-- /container -->
<?php require_once 'templates/footer.php';?>