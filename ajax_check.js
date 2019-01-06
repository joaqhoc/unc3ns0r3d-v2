var max=0;var index=1;var http=getHTTPObject();var checked=0;var t_live=0;var t_die=0;function getlist(){var sockslist=document.frm.sockslist.value;var fuck=sockslist.match(/\d{1,3}([.])\d{1,3}([.])\d{1,3}([.])\d{1,3}((:)|(\s)+)\d{1,8}/g);if(fuck){var list="";for(var i=0;i<fuck.length;i++){if(fuck[i].match(/\d{1,3}([.])\d{1,3}([.])\d{1,3}([.])\d{1,3}(\s)+\d{1,8}/g)){fuck[i]=fuck[i].replace(/(\s)+/,':');}
list=list+fuck[i];if(i!=(fuck.length-1)){list=list+"\n";}}
document.frm.sockslist.value=list;}
else{document.frm.sockslist.value="";}}
function getHTTPObject(){var xmlhttp;if(!xmlhttp&&typeof XMLHttpRequest!='undefined'){try{xmlhttp=new XMLHttpRequest();}catch(e){xmlhttp=false;}}
return xmlhttp;}
var dem=0;var live=0;function checkfrm(){dem=0;live=0;document.getElementById('pp').innerHTML='';document.getElementById('bl').innerHTML='';document.getElementById('live').innerHTML='';document.getElementById('die').innerHTML='';document.getElementById('time').innerHTML='';document.getElementById('pp').style.display='none';document.getElementById('bl').style.display='none';document.getElementById('live').style.display='none';document.getElementById('die').style.display='none';document.getElementById('time').style.display='none';if(document.frm.sockslist.value=="")
alert("Please put socks5");else
{Begin();document.getElementById('check').innerHTML='<center><img src="loading.gif"/></center>';}}
function check(id,pp,px,tong){if(document.getElementById){var x=(window.ActiveXObject)?new ActiveXObject("Microsoft.XMLHTTP"):new XMLHttpRequest();}
var url="func.php?socks="+id+"&checkpp="+pp+"&proxystop="+px;if(x){x.onreadystatechange=function(){if(x.readyState==4&&x.status==200){checked++;if(checked==tong)
document.getElementById('check').innerHTML='';st=x.responseText+"<br/>";if(pp=="yes"){var patt1=/Clear PP/;if(st.match(patt1)){document.getElementById('pp').style.display='block';document.getElementById('pp').innerHTML+=st;t_live++;}
patt1=/Blacklist/;if(st.match(patt1)){t_live++;document.getElementById('bl').style.display='block';document.getElementById('bl').innerHTML+=st;}
patt1=/Time Out/;if(st.match(patt1)){t_live++;document.getElementById('time').style.display='block';document.getElementById('time').innerHTML+=st;}
patt1=/DIE/;if(st.match(patt1)){t_die++;document.getElementById('die').style.display='block';document.getElementById('die').innerHTML+=st;}}else{var patt1=/LIVE/;if(st.match(patt1)){t_live++;document.getElementById('live').style.display='block';document.getElementById('live').innerHTML+=st;}
patt1=/DIE/;if(st.match(patt1)){t_die++;document.getElementById('die').style.display='block';document.getElementById('die').innerHTML+=st;}}
var phantram=Math.round((checked/tong)*100);document.getElementById('ketqua').innerHTML="All: <font color=violet><b>"+tong+"</b></font> | Checked: <font color=green><b>"+checked+"</b></font> | Live: <font color=red><b>"+t_live+"</b></font> | Die: <font color=blue><b>"+t_die+"</b></font>";document.getElementById('csspro').innerHTML="<style>#progressbar div { background-color: lime;   width: "+phantram+"%;    height: 5px;   border-radius: 2px;	}</style>";document.getElementById('phantram').innerHTML=phantram+"%";}}
x.open("GET",url,true);x.send(null);}}
function Begin(){var temp=document.frm.sockslist.value;var xlist=temp.split("\n");var pp="";var px="no";if(document.getElementById('proxystop').checked)
{px=document.getElementById('proxystop').value;}
checked=0;t_live=0;t_die=0;xlist=xlist.filter(function(elem,pos){return xlist.indexOf(elem)==pos;})
document.getElementById('ketqua').innerHTML="All: <font color=violet><b>"+xlist.length+"</b></font>| Checked: <font color=green><b>"+checked+"</b></font> | Live: <font color=red><b>"+t_live+"</b></font> | Die: <font color=blue><b>"+t_die+"</b></font>";for(i=0;i<xlist.length;i++){check(xlist[i],pp,px,xlist.length);}}