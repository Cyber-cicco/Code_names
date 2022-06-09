var arrButtons = document.querySelectorAll(".group");
var btnOk;
var btnVoter;
var fncGotoplay = function() {
    window.location.href = "/html/play.php";
}
var fncSendata = function (){ 
    let http = new XMLHttpRequest();
    http.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            document.querySelector(".showGroup").innerHTML = this.responseText;
            btnOk = document.querySelector("#ok");
            btnOk.addEventListener("click", fncGotoplay);
        }
    }
    console.log("groupname=" + this.innerHTML);
    http.open('GET',"/includes/group.php?q="+this.innerHTML, true)
    http.send();
    console.log("request sent");
 }
for (let i = 0; i < arrButtons.length; i++){
    arrButtons[i].addEventListener("click", fncSendata)
}
