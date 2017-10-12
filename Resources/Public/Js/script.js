$('.jqClick').click(function(e) {
	
	//alert("start");
	console.log("start");
	
    var action = $(this).attr("href"); 
    
    $.ajax({
        url: action,
        type: 'Post',
	}).done(function (data) {
	    //Unser Controller Ergebnis ist in der variable "data"
	    //Einfaches Beispiel: $('.irgendeineKlasse).html(data);
		console.log("done"+data);

	}).fail(function () {
            //Irgendwas ist schief gelaufen, hier könnt ihr eine Meldung ausgeben
	    //Einfaches Beispiel: $('.irgendeineKlasse).html('Ein Fehler ist aufgetreten');
		console.log("fail");

	}).always(function () {
	    //Zuletzt noch der Teil der immer ausgeführt wird.
            //Einfaches Beispiel: $('.irgendeineHinweisKlasse).html('Daten wurden verarbeitet');
		console.log("always");	
			
	});
});



















//global definierter fülltext um Darstellungen testen zu können
var sometext = "Zeitanzeige: analog<br>Form: rund<br>Größe: 406 mm Außendurchmesser<br>Gehäuse: Aluminium (Farbe grau gem. RAL 7037)<br>Schutzklasse: IP 54 (feuchtraumsicher)<br>Zifferblatt: Alu-Blech, weiß lackiert, Stunden- und Minutenstriche schwarz<br>Zeiger: Aluminium, schlank konisch, schwarz<br>Schutzglas: gewölbt<br>Uhrwerk: Nebenuhrwerk<br>Stromaufnahme: 10 mA bei 24V DC<br>Fortschaltung: Durch pol. Minutenimpulse 24 V DC<br>Verwendbar: innen und außen<br><br>Erweiterungen:<br>WWNFR40B Beleuchtung mit Anschluss 230 V AC (Plexiglaszifferblatt) WWNFR40PD<br>Doppelseitige Uhr mit Deckenpende<bWWNFR40WA  Doppelseitige Uhr mit Wandarm"

//initial ist der viewstate, also die Ansicht '0'. Die viewState ist die Resultview - also die Art wie die ergebnisse angezeigt werden.
//gearbeitet wird damit in "changeResultView"
var viewState=0 ;

//die Klasse 'Product' wird hier definiert.
function Product(teaserImageSrc, number, name, downloadLink, productText, productPicture1, productPicture2){
  this.teaserImageSrc = teaserImageSrc;
  this.number = number;
  this.name = name;
  this.downloadLink = downloadLink;
  this.productText = productText;
  this.productPicture1 = productPicture1;
  this.productPicture2 = productPicture2;
}

//hier wird zu Testzwecken ein neuer Array mit neuen Objekten des Typen 'Product' gefüllt
var myProductList = [
  new Product('http://www.mattig-schauer.at/typo3temp/pics/dc71a3642a.jpg', "WWNFR40", "Außenbereich", "index.html", sometext,"http://www.mattig-schauer.at/typo3temp/pics/dc71a3642a.jpg" ,"http://www.mattig-schauer.at/typo3temp/pics/ac9fc1add8.jpg"),
  new Product('http://www.mattig-schauer.at/typo3temp/pics/eb92508ee3.jpg', "WWNFR60", "Außenbereich", "index.html", sometext),
  new Product('http://www.mattig-schauer.at/typo3temp/pics/63b67ff478.jpg', "WWNFR90", "Außenbereich", "index.html", sometext, "http://www.mattig-schauer.at/typo3temp/pics/63b67ff478.jpg"),
  new Product('http://www.mattig-schauer.at/typo3temp/pics/63b67ff478.jpg', "WWNFR90", "Außenbereich", "index.html", sometext, "http://www.mattig-schauer.at/typo3temp/pics/63b67ff478.jpg"),
  new Product('http://www.mattig-schauer.at/typo3temp/pics/dc71a3642a.jpg', "WWNFR40", "Außenbereich", "index.html", sometext,"http://www.mattig-schauer.at/typo3temp/pics/dc71a3642a.jpg" ,"http://www.mattig-schauer.at/typo3temp/pics/ac9fc1add8.jpg"),
  new Product('http://www.mattig-schauer.at/typo3temp/pics/eb92508ee3.jpg', "WWNFR60", "Außenbereich", "index.html", sometext),
  new Product('http://www.mattig-schauer.at/typo3temp/pics/63b67ff478.jpg', "WWNFR90", "Außenbereich", "index.html", sometext, "http://www.mattig-schauer.at/typo3temp/pics/63b67ff478.jpg"),
  new Product('http://www.mattig-schauer.at/typo3temp/pics/63b67ff478.jpg', "WWNFR90", "Außenbereich", "index.html", sometext, "http://www.mattig-schauer.at/typo3temp/pics/63b67ff478.jpg"),
  new Product('http://www.mattig-schauer.at/typo3temp/pics/dc71a3642a.jpg', "WWNFR40", "Außenbereich", "index.html", sometext,"http://www.mattig-schauer.at/typo3temp/pics/dc71a3642a.jpg" ,"http://www.mattig-schauer.at/typo3temp/pics/ac9fc1add8.jpg"),
  new Product('http://www.mattig-schauer.at/typo3temp/pics/eb92508ee3.jpg', "WWNFR60", "Außenbereich", "index.html", sometext),
  new Product('http://www.mattig-schauer.at/typo3temp/pics/63b67ff478.jpg', "WWNFR90", "Außenbereich", "index.html", sometext, "http://www.mattig-schauer.at/typo3temp/pics/63b67ff478.jpg"),
  new Product('http://www.mattig-schauer.at/typo3temp/pics/63b67ff478.jpg', "WWNFR90", "Außenbereich", "index.html", sometext, "http://www.mattig-schauer.at/typo3temp/pics/63b67ff478.jpg"),
  new Product('http://www.mattig-schauer.at/typo3temp/pics/dc71a3642a.jpg', "WWNFR40", "Außenbereich", "index.html", sometext,"http://www.mattig-schauer.at/typo3temp/pics/dc71a3642a.jpg" ,"http://www.mattig-schauer.at/typo3temp/pics/ac9fc1add8.jpg"),
  new Product('http://www.mattig-schauer.at/typo3temp/pics/eb92508ee3.jpg', "WWNFR60", "Außenbereich", "index.html", sometext),
  new Product('http://www.mattig-schauer.at/typo3temp/pics/63b67ff478.jpg', "WWNFR90", "Außenbereich", "index.html", sometext, "http://www.mattig-schauer.at/typo3temp/pics/63b67ff478.jpg"),
  new Product('http://www.mattig-schauer.at/typo3temp/pics/63b67ff478.jpg', "WWNFR90", "Außenbereich", "index.html", sometext, "http://www.mattig-schauer.at/typo3temp/pics/63b67ff478.jpg")
]


//initiale onload Funktion
window.onload = function(){
  goToSection();
  //poluteOptions("cat1-name", "Kategorie", "analog_kat", ["Außenbereich", "Innenbereich", "Zubehör"]);
  //poluteOptions("cat2-name", "Uhrenwerk", "analog_uw", ["Uhrwerk1", "Uhrwerk2", "Uhrwerk3", "Uhrwerk4", "diverses Uhrwerk"]);

  try{
    //showResults(myProductList);
    changeResultView();
    expandResult();
  }catch(er){
    console.log(er);
  }

};


//die funktion kümmert sich um die Befüllung der Kategorien. Die Liste der Kategorien kann später auch aus den vorhandenen Uhren selber geschaffen werden.
function poluteOptions(cat_id, cat_value, id, array){
  try{
    document.getElementById(cat_id).innerHTML = (cat_value + ":");
    for(var i = 0; i<array.length; i++){
      var opt = document.createElement('option');
      opt.innerHTML = array[i];
      opt.value = array[i];
      document.getElementById(id).appendChild(opt);
    }
  }catch(err){
    console.log(err);
  }
}

//hier wird das einzelne ergebniss erstellt.
function createResult(product, parentId, downloadText, readMoreText){
  var frame = document.createElement("div");
  var teaserContainer = document.createElement("div");
  var teaserImageContainer = document.createElement("div");
  var teaserTextContainer = document.createElement("div");
  var readMoreContainer = document.createElement("div");
  var infoContainer = document.createElement("div");
  var innerInfoContainer = document.createElement("div");
  var innerPictureContainer = document.createElement("div");

  var pseudoElement = document.createElement("div");

  teaserContainer.className="big-frame teaser-result-container";

  teaserImageContainer.className="col-sm-3 result-teaser-image";
  teaserImageContainer.appendChild(document.createElement("img"));
  teaserImageContainer.getElementsByTagName('img')[0].src=product.teaserImageSrc;

  teaserTextContainer.className="col-sm-8 result-teaser-text";
  teaserTextContainer.appendChild(document.createElement("p"));
  teaserTextContainer.appendChild(document.createElement("h5"));
  teaserTextContainer.appendChild(document.createElement("a"));
  teaserTextContainer.getElementsByTagName("p")[0].innerHTML=product.number;
  teaserTextContainer.getElementsByTagName("p")[0].style.marginBottom = "0px";
  teaserTextContainer.getElementsByTagName("h5")[0].innerHTML=product.name;
  teaserTextContainer.getElementsByTagName("a")[0].innerHTML=downloadText;
  teaserTextContainer.getElementsByTagName("a")[0].style.width="100% ";
  teaserTextContainer.getElementsByTagName("a")[0].href=product.downloadLink;
  teaserTextContainer.appendChild(document.createElement("a"));
  teaserTextContainer.getElementsByTagName("a")[1].innerHTML=readMoreText;
  teaserTextContainer.getElementsByTagName("a")[1].className="readMore-Text";

  teaserContainer.appendChild(teaserImageContainer);
  teaserContainer.appendChild(teaserTextContainer);
  teaserContainer.appendChild(infoContainer);


  infoContainer.className="big-frame info-container";

  innerInfoContainer.className="col-sm-8 result-inner-text";
  innerInfoContainer.appendChild(document.createElement("p"));
  innerInfoContainer.getElementsByTagName("p")[0].innerHTML=product.productText;
  infoContainer.appendChild(innerInfoContainer);

  innerPictureContainer.className="col-sm-4 result-inner-picture";
  innerPictureContainer.appendChild(document.createElement("img"));
  innerPictureContainer.appendChild(document.createElement("img"));

  if(product.productPicture1 !== undefined)
  innerPictureContainer.getElementsByTagName("img")[0].src=product.productPicture1;

  if(product.productPicture2 !== undefined)
  innerPictureContainer.getElementsByTagName("img")[1].src=product.productPicture2;

  infoContainer.appendChild(innerPictureContainer);
  infoContainer.value="closed";

  document.getElementById(parentId).appendChild(teaserContainer);
  document.getElementById(parentId).appendChild(infoContainer);

  var x = document.querySelector("a");
  x.dataset.content ="../images/linkpfeil-rot.gif";
}


function expandResult(){
  for(var i=0; i<document.getElementsByClassName("teaser-result-container").length; i++){
    //Expand element:
      document.getElementsByClassName("teaser-result-container")[i].onclick = function(){
        this.nextElementSibling.classList.toggle('info-container-open');
        this.classList.toggle('teaser-container-open');
      }
    }
}

function changeResultView(viewState){
  //change view:
  document.getElementById("toggle-result-view").onclick = function(){
    toggleResultView(viewState);
  }
}
function toggleResultView(){
  var icon = document.getElementById("toggle-result-view");
  if(viewState == null ||	viewState == 0) viewState = 1;
  else viewState = 0;


  for(var i = 0; i<document.getElementsByClassName("teaser-result-container").length; i++){
    if(viewState == 0){ //narrow view
      icon.getElementsByTagName("span")[0].className = "glyphicon glyphicon-th-list";
      document.getElementsByClassName("teaser-result-container")[i].className = "small-frame teaser-result-container";
      document.getElementsByClassName("result-teaser-image")[i].className = "col-sm-4 result-teaser-image";
      document.getElementsByClassName("result-teaser-text")[i].className = "col-sm-5 result-teaser-text";
  //    document.getElementsByClassName("result-readmore")[i].className = "col-sm-3 result-readmore";
      document.getElementsByClassName("info-container")[i].style.width = (document.getElementsByClassName("teaser-result-container")[i].offsetWidth*2+30+"px");
    }
    else{
      icon.getElementsByTagName("span")[0].className = "glyphicon glyphicon-th-large";
      document.getElementsByClassName("teaser-result-container")[i].className = "big-frame teaser-result-container";
      document.getElementsByClassName("result-teaser-image")[i].className = "col-sm-3 result-teaser-image";
      document.getElementsByClassName("result-teaser-text")[i].className = "col-sm-8 result-teaser-text";
      document.getElementsByClassName("info-container")[i].style.width = (document.getElementsByClassName("teaser-result-container")[i].offsetWidth+"px");
    }
  }
}
function keepResultView(viewState){
  var icon = document.getElementById("toggle-result-view");


  for(var i = 0; i<document.getElementsByClassName("teaser-result-container").length; i++){
    if(viewState == 0){
      icon.getElementsByTagName("span")[0].className = "glyphicon glyphicon-th-list";
      document.getElementsByClassName("teaser-result-container")[i].className = "small-frame teaser-result-container";
      document.getElementsByClassName("result-teaser-image")[i].className = "col-sm-4 result-teaser-image";
      document.getElementsByClassName("result-teaser-text")[i].className = "col-sm-5 result-teaser-text";
  //    document.getElementsByClassName("result-readmore")[i].className = "col-sm-3 result-readmore";
      document.getElementsByClassName("info-container")[i].style.width = (document.getElementsByClassName("teaser-result-container")[i].offsetWidth*2+30+"px");
    }
    else{
      icon.getElementsByTagName("span")[0].className = "glyphicon glyphicon-th-large";
      document.getElementsByClassName("teaser-result-container")[i].className = "big-frame teaser-result-container";
      document.getElementsByClassName("result-teaser-image")[i].className = "col-sm-3 result-teaser-image";
      document.getElementsByClassName("result-teaser-text")[i].className = "col-sm-8 result-teaser-text";
      document.getElementsByClassName("info-container")[i].style.width = (document.getElementsByClassName("teaser-result-container")[i].offsetWidth+"px");
    }
  }
}
function showResults(productList){
  var numResults = 10;  //default state
  var currentPage = 1;    //Default state is page 1
  //Default state:
  document.getElementById("show-10").className = "btn btn-default max-items active-button";

      var redrawRes = function(){
        while (document.getElementById("generated-results").firstChild) {
          document.getElementById("generated-results").removeChild(document.getElementById("generated-results").firstChild);
        }
        if(productList.length <= numResults){
          //there is only one page of results
          for(var i = 0; i<productList.length; i++){
              createResult(productList[i], "generated-results", "Download", "Details");
          }
        }
        else{
          //there is more than one page of results. determin which results to show
          for(var i = (currentPage*numResults-numResults); i<(currentPage*numResults); i++){
            if(productList[i]!=null)
              createResult(productList[i], "generated-results", "Download", "Details");
          }
        }
        keepResultView(viewState);

        var numPages = Math.ceil(productList.length/numResults);
        var pages = document.createElement("div");
        pages.className = "col-sm-12 text-center pages-container"

        for(var i=0; i<numPages; i++){
          pages.appendChild(document.createElement("span"))
          pages.getElementsByTagName("span")[i].innerHTML = i+1;
          pages.getElementsByTagName("span")[i].value = i+1;
          if(i+1 == currentPage){
            pages.getElementsByTagName("span")[i].style.fontWeight = "bold";
            pages.getElementsByTagName("span")[i].style.fontSize = "20px";


          }
          pages.getElementsByTagName("span")[i].onclick = function(){

          //  currentPage = pages.getElementsByTagName("span").indexOf(this)+1;
            console.log(this.value);
            currentPage = this.value;
            redrawRes();
          }
        }
        document.getElementById("generated-results").appendChild(pages);

        expandResult();
      }

      redrawRes();

  document.getElementById("show-5").onclick = function(){
      numResults = 5;
      this.className = "btn btn-default max-items active-button";
      document.getElementById("show-10").className = "btn btn-default max-items";
      document.getElementById("show-25").className = "btn btn-default max-items";
      redrawRes();
  }
  document.getElementById("show-10").onclick = function(){
      numResults = 10;
      this.className = "btn btn-default max-items active-button";
      document.getElementById("show-5").className = "btn btn-default max-items";
      document.getElementById("show-25").className = "btn btn-default max-items";
      redrawRes();
  }
  document.getElementById("show-25").onclick = function(){
      numResults = 25;
      this.className = "btn btn-default max-items active-button";
      document.getElementById("show-5").className = "btn btn-default max-items";
      document.getElementById("show-10").className = "btn btn-default max-items";
      redrawRes();
  }




}



//nicht relevant für darstellung der Uhren
function goToSection(){
  for(var i=0; i<document.getElementsByClassName("page-menu-button").length; i++){
    document.getElementsByClassName("page-menu-button")[i].onclick = function(){
      console.log($(this));
      console.log(this.getAttribute("data-destiny"))

      $('html, body').animate({
        scrollTop: $(this.getAttribute("data-destiny")).offset().top -250
      }, 1000);
    }
  }
}
