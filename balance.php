<?php require_once 'templates/header.php';?>
	<div class="content">
     	<div class="container">
     		<div class="col-md-8 col-sm-8 col-xs-8">
     			<div class="well text-center">
	     			<p><h3>Verificar saldo en múltiples direcciones BTC</h3></p>
                         <hr>
					      <b>Ingrese las direcciones que desea ver</b>
					      <br />
					      <br />          
					      <textarea class="form-control" id="enderecos01" rows="15" placeholder="(Separar las direcciones con saltos en linea)"></textarea> 
					      <br />
					      <button type="button" class="btn btn-dark" onclick="consultarApi(document.getElementById('enderecos01').value)">Chequear</button><br>
					      <p id="totalEnderecos"></p>      
     			</div>
     			<br>
     		</div>
               <div class="col-md-4 col-sm-4 col-xs-8">
                    <div class="well text-center">
                         <p><h3>Resultados</h3></p>
                         <hr>
                         <p> 
                        <b>Balance - Address consulted</b>
                        <br />
                        <br />          
					      <textarea class="form-control" id="enderecos02" rows="15" placeholder="Se insertará el resultado de las direcciones consultadas en la API Blockchain" disabled="true"></textarea>
					      <p id="totalEnderecosConsultados"></p> 
                    </div>
                    <br>
                    
                    
               </div>
     		<?php require_once 'templates/sidebar.php';?>
     		
     	</div>
    </div> <!-- /container -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <script type="text/javascript">
    	function consultarApi(enderecos) {
        document.getElementById('enderecos02').value = '';
        //enderecos=trim(enderecos);
        document.getElementById('totalEnderecos').innerHTML = 'Direcciones totales para consultar: ' + enderecos.split('\n').length;
        var url = "https://blockchain.info/es/q/addressbalance"; 
        var apiCode = "?api_code=20c9f53d4f-1e9c-4045-9ab0-1e05094567ce"; 
        var cont = 0;
        for(let i=0;i<enderecos.split('\n').length;i++){
            urlTemp= url + enderecos.split("\n")[i] + apiCode;
            let xmlHttp = new XMLHttpRequest(); 
            xmlHttp.open("GET", urlTemp, true); // true for asynchronous
              
            xmlHttp.onreadystatechange = function() { 
                if (xmlHttp.readyState === XMLHttpRequest.DONE && xmlHttp.status === 200){
                    callback(xmlHttp.responseText, enderecos.split("\n")[i]); 
                    cont++;                   
                    document.getElementById('totalEnderecosConsultados').innerHTML = 'Direcciones referidas ' + cont;
                }
                
            }
          xmlHttp.send();
          function callback(resposta, enderecoConsultado){
          document.getElementById('enderecos02').value = document.getElementById('enderecos02').value + resposta + " - " + enderecoConsultado + "\n";          
          }
          //remover espaços excedentes
          function trim(str) {
            if (Array.isArray(str))  {
            var strArray=[str.length];
              for(let i=0; i<str.length;i++)
                strArray[i] = str[i].replace(/^\s+|\s+$/g,"");
              return strArray;
            }
            else
              return str.replace(/^\s+|\s+$/g,"");
            }
        }
	    }
    </script>
<?php require_once 'templates/footer.php';?>