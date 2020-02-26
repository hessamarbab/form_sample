var check;
function passCheck(){
if(document.getElementById('pass1').value!=document.getElementById('pass2').value)
{document.getElementById('alert3').innerHTML='The pass isn\'t equal!!! ';
check=1;
}else
document.getElementById('alert3').innerHTML='';
}
function fillCheck(){
var n;
check=0;
for(n=0;n<3;n++){
if(document.getElementsByClassName('inpp')[n].value=='')
{document.getElementById('alert'+n).innerHTML='Fill it please!!! ';
check=1;
}else
document.getElementById('alert'+n).innerHTML='';
}
}