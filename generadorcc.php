<?php require_once 'templates/header.php';?>
<body onload="n1ght();" class="  pace-done">
    <div class="content">
        <div class="container">
            <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="well text-center">
                    <p><h3>Generador de Bins</h3></p>
                         <hr>
                           <form>
                              <div class="form-group">
                                <label for="inputAddress">BIN</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="498505xxxxxxxxxx">
                              </div>
                              <div class="form-group">
                                <select name="ccnsp" style="display:none;">
                                        <option selected="selected">Ninguno</option>
                                </select>
                             </div>

                             <div class="form-group col-md-3" style="display:none;">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox"id="ccexpdat" name="ccexpdat" checked>
                                  <label class="form-check-label" for="gridCheck">
                                    Datos
                                  </label>
                                </div>
                              </div>
                              <div class="form-group col-md-3" style="display:none;">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" id="ccvi" name="ccvi" checked>
                                  <label class="form-check-label" for="gridCheck">
                                    CVV
                                  </label>
                                </div>
                              </div>
                              <div class="form-group col-md-3" style="display:none;">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" id="ccbank" name="ccbank">
                                  <label class="form-check-label" for="gridCheck">
                                    Banco
                                  </label>
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="inputState">MES</label>
                                  <select id="inputState" class="form-control">
                                            <option value="rnd">Rnd</option>
                                            <option value="01">01</option>
                                            <option value="02">02</option>
                                            <option value="03">03</option>
                                            <option value="04">04</option>
                                            <option value="05">05</option>
                                            <option value="06">06</option>
                                            <option value="07">07</option>
                                            <option value="08">08</option>
                                            <option value="09">09</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                  </select>
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="inputState">AÑO</label>
                                  <select id="inputState" class="form-control">
                                            <option value="rnd">Rnd</option>
                                            <option value="2018">18</option>
                                            <option value="2019">19</option>
                                            <option value="2020">20</option>
                                            <option value="2021">21</option>
                                            <option value="2022">22</option>
                                            <option value="2023">23</option>
                                            <option value="2024">24</option>
                                            <option value="2025">25</option>
                                            <option value="2026">26</option>
                                            <option value="2027">27</option>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputAddress">BIN</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="498505xxxxxxxxxx">
                              </div>
                              <button type="submit" class="btn btn-primary">Sign in</button>
                            </form>
                </div>
                <br>
            </div>
               <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="well text-center">
                    	<form style="margin: 10px;" action="" method="get">
                            <input type="text" name="tld" id="tld" value="list" hidden>
                            <input type="submit" value="Dominios Soportados" class="btn btn-lg btn-primary btn-block">
                        </form>
               </div>
            <?php require_once 'templates/sidebar.php';?>
            </div>
        </div>
    </div> <!-- /container -->
<?php require_once 'templates/footer.php';?>