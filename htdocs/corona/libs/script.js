
function changeTab(e) {
  var n = document.getElementsByClassName("topnav")[0].childNodes;
  for(var i=0; i < n.length; i++)
	n[i].className = '';
  e.className = 'active';
 }