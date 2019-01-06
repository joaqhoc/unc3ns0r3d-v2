<?php require_once 'templates/header.php';?>
<script>

function trimSpaces(s){
        var res;
        var i;
        res = "";
        for (i = 0; i < s.length; i++){
                if ((s.charAt(i) != " ") && (s.charAt(i) != "-"))
                        res += s.charAt(i);
        }
        return res;
}

function isValidInput(s){
        for (i = 0; i < s.length; i++){
                var i;
                if ((s.charAt(i) < "0") || (s.charAt(i) > "9"))
                        return false;
        }
        return true;
}


function fix(num){
        if (num <= 9) return num; else return (num - 9);
}

function check(number){
        var i;
        var ganjil;
        var genap;
        var tanda;

        genap = 0;
        ganjil = 0;
        //sign = 1 significa el número impar de dígitos
        if (number.length % 2) tanda = 0; else tanda = 1;
        for (i = 0; i < number.length; i++) {
                if ((i + tanda) % 2) //impar
                        ganjil += fix(2 * (number.charAt(i)));
                else
                        genap += parseInt(number.charAt(i), 10);
        }
        return (((ganjil + genap) % 10) == 0);
}


function validateInput(inp){
        var tmp;
        var Msg;
        var Msg2;
        tmp = trimSpaces(inp.nomor.value)
        if ((tmp == "") || (!isValidInput(tmp))){
                alert("El número de tarjeta que ingresó es incorrecto !!");
                return false;
        }
        Msg = "Esta carta ";
        Msg2 = "";
        if (check(tmp))
                alert(Msg + "\n\nVALIDO!!\n\n" + Msg2);
        else
                alert(Msg + "\n\nNO ES VALIDO!!\nerifique nuevamente para el número de tarjeta.\n\n" + Msg2);
        return false;
}

//busca algunos números válidos cerca del número dado
function findN(formName){
        var start;
        var startn;
        var res;
        var i;
    var exp;
    var cvv;
    var delim;

        expH = trimSpaces(formName.exp.value);
        cvvH = trimSpaces(formName.cvv.value);
        delimH = trimSpaces(formName.delim.value);
        start = trimSpaces(formName.nomor.value);
        if ((start == "") || (!isValidInput(start))){
                alert("Check Form Please!!");
                return;
        }
        res = "";
        startn = parseInt(start,10);
        for (i=-50; i<100; i++)  {
                num = "" + (parseInt(start,10)+i);
                if (check(num)) {
                        res += (startn + i) + delimH + expH + delimH + cvvH + "\n";
                }
        }
        formName.hasil.value = res;
}

      
</script>
    <div class="content">
        <div class="container">
            <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="well text-center">
                    <p><h3>Extrapolar CC</h3></p>
                         <hr>
                       <form name="InpForm" onSubmit="return validateInput(this);">
                            <div class="form-group">
                              <label for="host">CC a Extrapolar:</label>
                              <br />
                              <input type="TEXT" class="form-inline" name="nomor" maxlength="16" placeholder="5148958066510604">
                              <input type="TEXT" class="form-inline" name="exp" maxlength="4" placeholder="EXP">
                              <br />
                              <br />
                              <input type="TEXT" class="form-inline" name="cvv" maxlength="4" placeholder="CVV">
                              <input type="HIDDEN" name="delim" value="|" size="1" ><br>
                            </div>
                            <br />
                            <br />
                            <div class="form-group">
                                <input class="btn btn-success" type="BUTTON" name="buat" onClick="findN(InpForm)" VALUE="Extrapolar">
                            </div>
                            <hr>
                            <textarea class="form-inline" name="hasil" cols="60" rows="10" style="margin: 0px 0px 10px; width: 312px; height: 254px;"></textarea>
                            <div id="jumlah" style="display: none;"></div>
                        </form>
                </div>
                <br>
            </div>
               <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="well text-center">
                         <p><h3>Información</h3></p>
                         <hr>
                         Extrapolar CC es una herramienta de creación de tarjetas generadas por una cc haciendo asi el uso de multiples tarjetas de diferentes digitos pero con la misma fecha y CVV
                         <p> 
                    </div>
                    <br>
                    
                    
               </div>
            <?php require_once 'templates/sidebar.php';?>
            
        </div>
    </div> <!-- /container -->
<?php require_once 'templates/footer.php';?>