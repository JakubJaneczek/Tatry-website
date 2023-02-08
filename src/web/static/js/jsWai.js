function countdown()
{
  var today = new Date();

  var day = today.getDate();
  var month = today.getMonth() + 1;
  var year = today.getUTCFullYear();

  var hour = today.getHours();
  if (hour<10) hour="0" + hour;
  var minute = today.getMinutes();
  if (minute<10) minute="0" + minute;
  var second = today.getSeconds();
  if (second<10) second="0" + second;

  document.getElementById("clock").innerHTML = day + "/" + month + "/" + year +" | " + hour + ":" + minute + ":" + second;

  setTimeout("countdown()", 1000);
}
function ciekawostka()
{
  var funfact = document.createElement("P");
  document.getElementById("funfact").innerHTML = "Najwyższym szczytem położonym w całości na terenie Polski jest Kozi Wierch (2291 m).";
  document.body.appendChild(funfact);
}

function znizka() {
  if(typeof(Storage) !== "undefined") {
    if (localStorage.clickcount) {
      localStorage.clickcount = Number(localStorage.clickcount)+1;
    } else {
      localStorage.clickcount = 1;
    }
    if (localStorage.clickcount == 1){
      document.getElementById("kupon").innerHTML = "Jednorazowy kod zniżkowy: KFAS98NF34";
    }
    if (localStorage.clickcount >1)
    document.getElementById("kupon").innerHTML = "Już odebrałeś swoj kod.";
  }
}

function ciekawostka2()
{
  if(typeof(Storage) !== "undefined") {
    if (sessionStorage.clickcount) {
      sessionStorage.clickcount = Number(sessionStorage.clickcount)+1;
    } else {
      sessionStorage.clickcount = 1;
    }
    if (sessionStorage.clickcount == 10)
    document.getElementById("funfact2").innerHTML = "Proces formowania się Tatr rozpoczął się 200 milionów lat temu.";
    if (sessionStorage.clickcount > 10)
    document.getElementById("funfact2").innerHTML = "Swoje już się naklikałeś, kolejnych Ci oszczędzę :D Proces formowania się Tatr rozpoczął się 200 milionów lat temu.";
  } 
}

