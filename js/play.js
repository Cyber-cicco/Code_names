var btnDecouvrir = document.querySelector("#btnDecouvrir");
var btnSuivant;
var btnVoter;
var btnName;
var btnReturn;
var btnFin;

var fnc_return = function(){
    var txtResponse = document.querySelector("#response");
    if(txtResponse != null){
        txtResponse = txtResponse.value;
    } else {
        txtResponse = "666"       
    }
    let http = new XMLHttpRequest();
    http.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.querySelector("#annonce").innerHTML = this.responseText;
            btnReturn = document.querySelector("#suivant");
            if(btnReturn !=  null){
                btnReturn.addEventListener("click", fnc_voter);
            } else {
                btnFin = document.querySelector("#fin");
                if (btnFin != null){
                    btnFin.addEventListener("click", function(){
                        window.location.href = '/white.php';
                    })
                }
            }
        }
    }
    http.open('GET',"/includes/winhandler.php?q="+txtResponse, true);
    http.send();
}

var fnc_avote = function (){
    let http = new XMLHttpRequest();
    http.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.querySelector("#annonce").innerHTML = this.responseText;
            btnVoter = document.querySelector("#checkifwin")
            if(btnVoter !=  null){
                console.log("fncreturnhandlercrated")
                btnVoter.addEventListener("click", fnc_return);
            }
        }
    }
    http.open('GET',"/includes/votehandler2.php?q="+this.innerHTML, true);
    http.send();
}

var fnc_suivant = function(){
    let http = new XMLHttpRequest();
    http.onreadystatechange = function(){
        document.querySelector("#annonce").innerHTML = this.responseText;
        btnVoter = document.querySelector("#voter");
        if(btnVoter == null){
            btnDecouvrir = document.querySelector("#btnDecouvrir");
            if (btnDecouvrir != null){
                btnDecouvrir.addEventListener("click", fnc_decouvrir);
            }     
        } else {
            btnVoter.addEventListener("click", fnc_voter);
        }
        
    }
    http.open('GET',"/includes/suivanthandler.php", true);
    http.send();
}

var fnc_voter = function(){
    let http = new XMLHttpRequest();
    http.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.querySelector("#annonce").innerHTML = this.responseText;
            btnName = document.querySelectorAll("#perso")
            if(btnName !=  null){
                btnName.forEach(element => {
                    element.addEventListener("click", fnc_avote);
                });                
            }
        }
    }
    http.open('GET',"/includes/votehandler.php", true);
    http.send();
}

var fnc_decouvrir =  function(){
    let http = new XMLHttpRequest();
    http.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.querySelector("#annonce").innerHTML = this.responseText;
            btnSuivant = document.querySelector("#suivant");
            btnSuivant.addEventListener("click", fnc_suivant)
        }
    }
    http.open('GET',"/includes/cardhandler.php", true);
    http.send();
}

btnDecouvrir.addEventListener("click", fnc_decouvrir);