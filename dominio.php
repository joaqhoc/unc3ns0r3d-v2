<?php require_once 'templates/header.php';?>
    <div class="content">
        <div class="container">
            <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="well text-center">
                    <p><h3>Check Dominio</h3></p>
                         <?php
                            require './dominio/vendor/autoload.php';
                            use Helge\Loader\JsonLoader;
                            use Helge\Client\SimpleWhoisClient;
                            use Helge\Service\DomainAvailability;
                            $whoisClient = new SimpleWhoisClient();
                            $dataLoader = new JsonLoader("./dominio/vendor/helgesverre/domain-availability/src/data/servers.json");
                            $service = new DomainAvailability($whoisClient, $dataLoader);
                            ?>
                         <hr>
                        <form action="" method="get" style="align-content: center;" >
                             <div class="form-group input-group">
                             
                             <input type="text" class="form-control" name="domain" id="domain" placeholder="google.com">
                             <input type="submit" value="Chequear" class="btn btn-lg btn-primary btn-block">
                             </div>    
                         </form>
                        <table border="1" cellpadding="5" class="table">
					        <tr>
					            <td>Status</td>
					            <td>
					                <?php
					                try {
					                    if (isset($_GET["domain"])) {
					                        if ($service->isAvailable($_GET["domain"])) {
					                            echo "<span style='color:green;'>Disponible</span>";
					                        } else {
					                            echo "<span style='color:red;'>Ocupado</span>";
					                        }
					                    }
					                } catch (\Exception $e) {
					                    echo $e->getMessage();
					                }
					                ?>
					            </td>
					        </tr>
					        <tr>
					            <td>WHOIS Server</td>
					            <td><?= $whoisClient->getServer() ?></td>
					        </tr>
					        <tr>
					            <td>Server Port</td>
					            <td><?= $whoisClient->getPort() ?></td>
					        </tr>
					        <tr>
					            <td colspan="2">
					                <pre><?= $whoisClient->getResponse(); ?></pre>
					            </td>
					        </tr>
					    </table>

                         
                </div>
                <br>
            </div>
               <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="well text-center">
                    	<form style="margin: 10px;" action="" method="get">
                            <input type="text" name="tld" id="tld" value="list" hidden>
                            <input type="submit" value="Dominios Soportados" class="btn btn-lg btn-primary btn-block">
                        </form>
 						
                       <?php if (isset($_GET["tld"]) && $_GET["tld"] == "list" ) : ?>
				            <?php foreach ($service->supportedTlds() as $tld) : ?>
				                <?= $tld; ?><hr>
				            <?php endforeach; ?>
				        
				    <?php endif; ?>
                    </div>
                    <br>
                    
                    
               </div>
            <?php require_once 'templates/sidebar.php';?>
            
        </div>
    </div> <!-- /container -->
<?php require_once 'templates/footer.php';?>