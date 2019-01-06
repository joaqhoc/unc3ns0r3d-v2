<?php require_once 'templates/header.php';?>
	<div class="content">
     	<div class="container">
     		<div class="col-md-8 col-sm-8 col-xs-12">
     			<div class="well text-center" >
	     			<p><h3>Generador de Cuentas </h3></p>
                         <hr>
                         <P>Las cuentas aún no aparecen porque se esta haciendo un chequeo extenso del codigo y demás si quieres colaborar en el proyecto envia un mensaje <a href="https://www.facebook.com/joaquincentu"> PRIVADO</a></p>
                         <form name="form_cuenta">
                              <div class="form-group input-group">
                                   <span class="input-group-addon" ><i class="fa fa-user"></i></span>
                                   <div id="tx" class="form-control"></div>
                                   <script>
                                                  var client = new XMLHttpRequest();
                                                  var result;
                                                  var i;
                                                  if(getCookie('id')){
                                                      i=getCookie('id');}
                                                  else{
                                                      i=0;
                                                  }
                                                  client.open('GET', 'http://unc3ns0r3d.ml/cuentasnetflix.txt');
                                                  client.onreadystatechange = function() {
                                                    result = client.responseText;
                                                    document.getElementById("tx").innerHTML = result.split('\n')[i];
                                                    i++;
                                                  }
                                                  client.send();

                                                  function getCookie(cname) {
                                                      var name = cname + "=";
                                                      var decodedCookie = decodeURIComponent(document.cookie);
                                                      var ca = decodedCookie.split(';');
                                                      for(var i = 0; i <ca.length; i++) {
                                                          var c = ca[i];
                                                          while (c.charAt(0) == ' ') {
                                                              c = c.substring(1);
                                                          }
                                                          if (c.indexOf(name) == 0) {
                                                              return c.substring(name.length, c.length);
                                                          }
                                                      }
                                                      return "";
                                                  }

                                                  function setCookie(cname, cvalue, exdays) {
                                                      var d = new Date();
                                                      d.setTime(d.getTime() + (exdays*24*60*60*1000));
                                                      var expires = "expires="+ d.toUTCString();
                                                      document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
                                                  }
                                                  function next(i){
                                                    document.getElementById("tx").innerHTML = result.split('\n')[i];
                                                    if (typeof tx === "Ya has obtenido tu cuenta visitanos dentro de 24hs") {
  														tx = 'Finalizado';
														}
                                                   }
                                                   function nextl(){
                                                   i=getCookie('id');
                                                   next(i);
                                                   i++;
                                                   setCookie('id',i,1);
                                                   }
                                             </script>
                              </div>
                              <div class="form-group input-group" style="text-align: center;" id="center">
                                   <hr>
                                   Tipo de cuenta:<br /><br />
                                   <select class="form-control chosen-select" name="selector" data-placeholder="Tipo de cuentas">
                                        <option id="c_netflix">NetFlix</option>
                                   </select>
                              </div>
                              <hr>
                              <div class="form-group no-margn">
                                   <input type="submit" class="btn btn-success btn-block" value="Generar" onclick="nextl();">
                              </div>
                         </form>
     			</div>
     			<br>
     			
     			
     		</div>
               <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="well text-center">
                         <p><h3>Cuentas en la DB</h3></p>
                         <hr>
                         <p> 
                         <input id="b_generar_2" name="b_generar_2" type="button" class="btn btn-primary" value="5 Cuentas"/>
                         <hr>
                         Sistema configurado para dar 1 cuenta por hora, si este arroja un error mandarme privado.
                         <br />
                         Se busca personas para aportar en la pagina interesados pueden mandarme un <a href="https://www.facebook.com/joaquincentu" target="_blank"> PRIVADO</a>.
                         <hr>
                         <b>No modificar las contraseñas o correos de las cuentas, estare chequeando las cuentas si estas se modifican se dan de baja el sistema durante 24hs</b>
                         </p>
                    </div>
                    <br>
                    
                    
               </div>
     		<?php require_once 'templates/sidebar.php';?>
     		
     	</div>
    </div> <!-- /container -->
<?php require_once 'templates/footer.php';?>
	