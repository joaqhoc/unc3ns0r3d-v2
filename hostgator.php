<?php require_once 'templates/header.php';?>
<style type="text/css">
	<style>
		.business{
			font-weight:bold;
			color:yellow;
		}
		.premier{
			font-weight:bold;
			color:#00FF00;
		}
		.verified{
			font-weight:bold;
			color:#006DB0;
		}
		.fieldset{
			border: 1px dashed #cccccc;
			margin-top: 20px;
		}
		.tvmit_live{
			border: 1px dashed #cccccc;
			color:yellow;
			font-weight:bold;
		}
		.tvmit_die{
			border: 1px dashed #cccccc;
			color:red;
			font-weight:bold;
		}
		#result{
			display:none;
		}
</style>
<script type="text/javascript">

		var ajaxCall;

		Array.prototype.remove = function(value){
			var index = this.indexOf(value);
			if(index != -1){
				this.splice(index, 1);
			}
			return this;
		};
		function enableTextArea(bool){
			$('#mailpass').attr('disabled', bool);
		}
		function tvmit_liveUp(){
			var count = parseInt($('#tvmit_live_count').html());
			count++;
			$('#tvmit_live_count').html(count+'');
		}
		function tvmit_dieUp(){
			var count = parseInt($('#tvmit_die_count').html());
			count++;
			$('#tvmit_die_count').html(count+'');
		}

		function stopLoading(bool){
			$('#loading').attr('src', 'clear.gif');
			var str = $('#checkStatus').html();
			$('#checkStatus').html(str.replace('Checking','Stopped'));
			enableTextArea(false);
			$('#submit').attr('disabled', false);
			$('#stop').attr('disabled', true);
			if(bool){
				alert('Done');
			}else{
				ajaxCall.abort();
			}
			updateTitle('Hostgator Account Checker');
		}
		function updateTitle(str){
			document.title = str;
		}
		function updateTextBox(mp){
			var mailpass = $('#mailpass').val().split("\n");
			mailpass.remove(mp);
			$('#mailpass').val(mailpass.join("\n"));
		}
		function OKTY(lstMP, curMP,  delim, cEmail, maxFail, failed){
			
			if(lstMP.length<1 ||curMP>=lstMP.length){
				stopLoading(true);
				return false;
			}
			if(failed>=maxFail){
			
				OKTY(lstMP, curMP, delim, cEmail, maxFail, 0);
				return false;
			}
			updateTextBox(lstMP[curMP]);
			
			ajaxCall = $.ajax({
				url: 'include/function.php',
				dataType: 'json',
				cache: false,
				type: 'POST',
				beforeSend: function (e) {
					updateTitle(lstMP[curMP] + ' - Hostgator Account Checker');
					$('#checkStatus').html('Checking: ' + lstMP[curMP]).effect("highlight", {color:'#00ff00'}, 1000);
					$('#loading').attr('src', 'include/loading.gif');
				},
				data: 'ajax=1&do=check&mailpass='+encodeURIComponent(lstMP[curMP])
						+'&delim='+encodeURIComponent(delim)+'&email='+cEmail,
				success: function(data) {
					switch(data.error){
						case -1:
							curMP++;
							$('#wrong').append(data.msg+'<br />').effect("highlight", {color:'#ff0000'}, 1000);
							break;
						case 1:
						case 3:
							$('#badsock').append(data.msg+'<br />').effect("highlight", {color:'#ff0000'}, 1000);
							break;
						case 2:
							curMP++;
							$('#tvmit_die').append(data.msg+'<br />').effect("highlight", {color:'#ff0000'}, 1000);
							failed++;
							tvmit_dieUp();
							break;
						case 0:
							curMP++;
							$('#tvmit_live').append(data.msg+'<br />').effect("highlight", {color:'#00ff00'}, 1000);
							tvmit_liveUp();
							break;
					}
					OKTY(lstMP, curMP, delim, cEmail, maxFail, failed);
				}
			});
			return true;
		}
		function filterMP(mp, delim){
			var mps = mp.split("\n");
			var filtered = new Array();
			var lstMP = new Array();
			for(var i=0;i<mps.length;i++){
				if(mps[i].indexOf('@')!=-1){
					var infoMP = mps[i].split(delim);
					for(var k=0;k<infoMP.length;k++){
						if(infoMP[k].indexOf('@')!=-1){
							var email = $.trim(infoMP[k]);
							var pwd = $.trim(infoMP[k+1]);
							if(filtered.indexOf(email.toLowerCase())==-1){
								filtered.push(email.toLowerCase());
								lstMP.push(email+'|'+pwd);
								break;
							}
						}
					}
				}
			}
			return lstMP;
		}
		$(document).ready(function(){
			$('#stop').attr('disabled', true).click(function(){
			  stopLoading(false);  
			});
			$('#submit').click(function(){
				var delim = $('#delim').val().trim();
				var mailpass = filterMP($('#mailpass').val(), delim);
				var bank = $('#bank').is(':checked') ? 1 : 0;
				var card = $('#card').is(':checked') ? 1 : 0;
				var infor = $('#info').is(':checked') ? 1 : 0;
				var cEmail = $('#email').is(':checked') ? 1 : 0;
				var maxFail = parseInt($('#fail').val());
				var failed = 0;
				if($('#mailpass').val().trim()==''){
					alert('No Mail/Pass found!');
					return false;
				}
			
				$('#mailpass').val(mailpass.join("\n")).attr('disabled', true);
				$('#result').show();
				$('#submit').attr('disabled', true);
				$('#stop').attr('disabled', false);
				OKTY(mailpass,  0, delim, cEmail, maxFail, 0);
				return false; 
			});
		});
</script>
	<div class="content">
     	<div class="container">
     		<div class="col-md-8 col-sm-8 col-xs-12">
     			<div class="well text-center">
	     			<p><h3>Checker Hostgator Account</h3></p>
                         <hr>
						<form class="form-inline" action="" method="post">
						    <div class="form-group">
						      <textarea placeholder="example@email.com|Password" name="mailpass" id="mailpass" cols="60" rows="10" style="margin: 0px 0px 10px; width: 494px; height: 200px;"></textarea>
							      <?php 
							      		echo $emailArea;
							      	?>
						      </textarea>
						    </div>
						    <br />
						    <br />
						    <div class="form-group">
						     <b>Delim:</b> 
								<input type="text" name="delim" id="delim" value="|"  cols="30" rows="10" style="margin: 0px; height: 20px; width: 10px;" />
								<br />
								<br />
								<input type="button" class = "btn btn-success" value="Submit" id="submit" />
								<input type="button" class = "btn btn-danger" value="STOP" id="stop" />
								<br />
								<br />
						        <img id="loading" src="img/clear.gif" />
						        <br />
						        <span id="checkStatus">
						        	
						        </span>
						    </div>
						</form>
     			</div>
				<div id="result">
				<!--/span-->
				    <div class="row-fluid">
				    <!-- block -->
				        <div class="block">
				            <div class="navbar navbar-inner block-header">
				                <div class="muted pull-left">
				        			<font color="black"><i class="icon-th-list"></i><b> Live </b></font><span class="badge badge-success" class="pull-right" id="tvmit_live_count">0</span>
								</div>
                            </div>
                        <div class="block-content collapse in">
	        				<div id="tvmit_live">
	                        </div>
                        </div>
                        </div>
                            <!-- /block -->
                    </div>                    
                    <div class="row-fluid">
                    <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">
        							<font color="black"><i class="icon-th-list"></i><b> Die </b></font><span class="badge badge-important" class="pull-right" id="tvmit_die_count">0</span>
    							</div>
                            </div>
                            <div class="block-content collapse in">
        						<div id="tvmit_die"></div>
							</div>
                        </div>
                    </div>
                </div>
     			<br>
     		</div>
               <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="well text-center">
                         <p><h3>Información</h3></p>
                         <hr>
                         <p> 

                    </div>
                    <br>
                    
                    
               </div>
     		<?php require_once 'templates/sidebar.php';?>
     		
     	</div>
    </div> <!-- /container -->
<?php require_once 'templates/footer.php';?>