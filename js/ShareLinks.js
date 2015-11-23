
var mousex;
var mousey;
var move = false;
var ldivx = 50;
var ldivy = 350;

(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

function init() {
var d = document.getElementById('dragme');
d.onmousedown = mousedown;
d.onmouseup = mouseup;
d.onmousemove = mousemove;
d.style.left = ldivx +'px';
d.style.top = ldivy +'px';
d.style.display = 'block';
}

function mousedown(e) {
document.getElementById('dragme').style.color = 'red';
move = true;
mousex = e.clientX; 
mousey = e.clientY;
}

function mouseup(e) {
document.getElementById('dragme').style.color = 'black';
move = false;
}

function mousemove(e) {
if(move){
ldivx = ldivx + e.clientX - mousex;
ldivy = ldivy + e.clientY - mousey;
mousex = e.clientX;
mousey = e.clientY;
var d = document.getElementById('dragme');
d.style.left = ldivx +'px';
d.style.top = ldivy +'px';
}
}
