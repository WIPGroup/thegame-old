function variables(){
	mb = {}; //vytvoreni potrebnych varu
	cpu = {};
	psu = {};
	ram = new Array({},{},{},{},{},{},{},{});
	hdd = new Array({},{},{},{});
	gpu = new Array({},{},{},{});
	ramcounter = 0, hddcounter = 0, gpucounter = 0, ramindex = 0, hddindex = 0, gpuindex = 0;
}
function initIsotope() {
  // init Isotope
  var $grid = $('.grid').isotope({
    itemSelector: '.grid-item',
    layoutMode: 'packery',
    filter: function() {
      return qsRegex ? $(this).text().match(qsRegex) : true;
    },
    getSortData: {
      name: '.name',
      power: '.power parseInt',
      count: '.count parseInt',
      tier: '[data-tier]',
      type: '[data-type]',
    },
    sortAscending: {
      name: true,
      power: false,
      count: false,
      tier: true,
      type: true
    }
  });
  // filter items on button click
  $('.filter-button-group').on('click', 'a', function() {
    var filterValue = $(this).attr('data-filter');
    $grid.isotope({
      filter: filterValue
    });
  });
  $('.sort-by-button-group').on('click', 'a', function() {
    var sortByValue = $(this).attr('data-sort-by');
    $grid.isotope({
      sortBy: sortByValue
    });
  });
  var qsRegex;
  // use value of search field to filter
  var $quicksearch = $('.quicksearch').keyup(debounce(function() {
    qsRegex = new RegExp($quicksearch.val(), 'gi');
    $grid.isotope({
      filter: function() {
        return qsRegex ? $(this).text().match(qsRegex) : true;
      },
    });
  }, 200));

  // debounce so filtering doesn't happen every millisecond
  function debounce(fn, threshold) {
    var timeout;
    return function debounced() {
      if (timeout) {
        clearTimeout(timeout);
      }

      function delayed() {
        fn();
        timeout = null;
      }
      timeout = setTimeout(delayed, threshold || 100);
    };
  }
  console.log('initIsotope');
}
function itemInfo() { //pri kliknuti na item se zobrazi info o nem
	$(".grid-item").click(function() { 
		var idveci = $(this).attr("data-idveci");
		console.log('Id veci je ' + idveci);
		$.ajax({
			data: {
			id: idveci
		},
			type: "GET",
			url: "components/getinfo.php",
			success: function(data) {
				$("#infoitemu").html(data);
			}
		});
	});
}
function shouldReturnArray(x){ //doplnujici funkce pro ostatni funkce, zjisti jestli se s tim ma pocitat jako s polem nebo jen jednim objektem
	switch(x){
		case "mb":
			return false;
		case "cpu":
			return false;
		case "ram":
			return true;
		case "hdd":
			return true;
		case "psu":
			return false;
		case "gpu":
			return true;
	}
}
function initForm(){ //inicializace funkcionality pridavani itemu
	itemInfo();
	showCurrentBuild();
	$(".grid button").click(function(){ //po kliknuti na přidat
		var toto = $(this).closest("div");
		var typ = toto.data("type");
		console.log("typ "+typ);
		var badge =	$(this).siblings(".badge");
		var count = badge.text();
		count--; //snížit počet
		badge.text(count);
		if (typ === "mb"){
			variables(); //reset všeho
			mb.gpu = toto.data("pci");
			mb.hdd = toto.data("hdd");
			mb.ram = toto.data("ram");
		}
		if (mb.gpu === undefined){
			alert('Nejdříve vyberte základovku');
		} else {
			if (shouldReturnArray(typ) === true){ //pokud je to array
				var pocet = window[typ+"counter"];
				var index = window[typ+"index"];
				var maximalnipocet = mb[typ];
				if (pocet<maximalnipocet){ //pokud se tam jeste muze neco pridat
					window[typ][index].nazev = toto.find("abbr").attr("title");
					window[typ][index].idveci = toto.data("idveci");
					window[typ][index].tier = toto.data("tier");
					window[typ][index].type = toto.data("type");
					console.log(toto.find("abbr").attr("title"));
					window[typ+"counter"]++;
					window[typ+"index"]++;
				}
			}else{
				window[typ].idveci = toto.data("idveci");
				window[typ].nazev = toto.find("abbr").attr("title");
				window[typ].tier = toto.data("tier");
				window[typ].type = toto.data("type");
				console.log(toto.find("abbr").attr("title"));
			}
		}
		showCurrentBuild();
	});
}
function showCurrentBuild(){ //ukazani aktualniho stavu staviciho se pocitace
	$("#currentbuild ul").each(function(){ //naplneni seznamu pro kazdou komponentu
		var x = $(this).attr("id");
		var htmlcontent = "";
		if (mb.nazev !== undefined){
			if (shouldReturnArray(x) === true){
				for (i=0;i<mb[x];i++){
					if (window[x][i].nazev != undefined){
						htmlcontent += '<li>'+window[x][i].nazev;
						htmlcontent += '<button class="btn btn-xs btn-danger odobrat" data-type="'+x+'" data-index="'+i+'" data-value="'+window[x][i].idveci+'">Odobrať</button>';
						htmlcontent += '</li>';
					}else{
						htmlcontent += '<li>Nic</li>';
					}
				}
			}else{
				if (window[x].nazev != undefined){
					htmlcontent += "<li>"+window[x].nazev;
					htmlcontent += '<button class="btn btn-xs btn-danger odobrat" data-type="'+x+'" data-index="-1" data-value="'+window[x].idveci+'">Odobrať</button>';
					htmlcontent += '</li>';
				}else{
					htmlcontent += '<li>Nic</li>';
				}
			}
		}else{
			htmlcontent += "<li>Musíte vybrat základní desku</li>";
		}
		$(this).html(htmlcontent);
	});
	$(".odobrat").click(function(){ //zprovozneni odobrat tlacitek
		typis = $(this).data("type");
		indexis = $(this).data("index");
		valuis = $(this).data("value");
		odebrat(typis,indexis,valuis);
	});
	displayProperly();//reload isotope
}
function displayProperly(){ //funkce pro schovani veci ktere se do pocitace uz nemuzou pridat atd.
	if(mb.nazev === undefined){
		$(".grid").isotope({filter:'.mb'});
	} else {
		$(".grid").isotope({
			filter:function(){
				var count = $(this).find(".count").find(".badge").html();
				if(count==0){
					return false;
				} else {
					var typ = $(this).data("type");
					if(typ==="mb"){ //už je nastavená základovka, pokud to je mb, neukázat
						return false;
					}else{
						if((typ==="cpu") && (cpu.nazev===undefined)){ //pokud je to cpu a nemáme ho nastavený
							var tier = $(this).data("tier");
							if(tier===mb.tier){ //pokud odpovídají tiery
								return true;
							}else{
								return false;
							}
						}else{
							if((shouldReturnArray(typ)===true) && (window[typ+"counter"]<mb[typ])){
								return true;
							}else{
								if((shouldReturnArray(typ)===false) && (window[typ].nazev===undefined)){
									return true;
								}else{
									return false;
								}
							}
						}
					}
				}
			}
		});
	}
//	$('.grid').isotope('reloadItems').isotope(); 
}
function odebrat(type,index,value){ //pro odebirani
	if (index===-1){
		window[type] = {};
	}else{
		window[type][index] = {};
		window[type+"counter"]--;
		for(i=0;i<window[type].length;i++){ //najiti prazdneho indexu kam se muze dat nova komponenta
			if(window[type][i].nazev===undefined){
				window[type+"index"] = i;
				break;
			}
		}
	}
	var badge = $(".grid").find("[data-idveci="+value+"]").find(".count").find(".badge"); //zvyseni poctu
	var pocet = badge.text();
	pocet++;
	badge.text(pocet);
	showCurrentBuild();
}
function reloadSestavy() { //nacte sestavy
	$.ajax({
		url: "components/sestavy.php", //vykona se to co je v url
		success: function(data) { //prijdou zpatky nejake data
			$("#sestavy").html(data); //data se hodi do neceho s id inventar, easy
			console.log('reloadSestavy');
			$('.disass').click(function() {
				var idsestavy = $(this).data('idsestavy');
				disass(idsestavy);
				return false;
			});
			$('.switch').click(function() {
				var idsestavy = $(this).data('idsestavy');
				zmenit(idsestavy);
				return false;
			});
			$(".sestavahidden").each(function(){
				var toto = $(this);
				var seznam = ["mb","cpu","ram","gpu","hdd","psu"];
				seznam.forEach(function(name){
					var obsah = $("."+name,toto);
					obsah.each(function(index,value){
						$(".sestava"+name,toto.siblings(".sestava")).append("<li>"+$(value).html()+"</li>");
					});
				});
				toto.remove();
			});
		}
	});
}
function reloadSkladaniSestav() { //nacte seznam komponent pro nove sestavy
	$.ajax({
		url: "components/stavbakomponenty.php", //vykona se to co je v url
		success: function(data) { //prijdou zpatky nejake data
			$("#build").html(data); //data se hodi do neceho s id inventar, easy
			variables();
			console.log('reloadSkladaniSestav');
			initIsotope();
			initForm();	
			$('#sestavit').click(function(){
				computer = {};
				populateObject("mb");	
				populateObject("cpu");
				populateObject("gpu");
				populateObject("ram");
				populateObject("hdd");
				populateObject("psu");
				var computerstring = $.param(computer);
				console.log(computerstring);
				$.ajax({
					data: computerstring,
					type: "GET",
					url: "components/sestavit.php",
					success: function(data) {
						if (isNaN(data)===true){
							swal({
								title:'Chyba!',
								text:data,
								type:'error'
							});
						} else {
							if(data==""){
								swal({
									title:'Chyba!',
									text:'Musíš vybrat základní desku!',
									type:'error'
								});
							}else{
								reloadSestavy();
								reloadSkladaniSestav();
								swal({
									title:'Gratulujeme!',
									text:'Úspešne si zostavil počítač o výkone '+data,
									type:'success'
								});
							}
						}
					}
				});
			});
		}
	});
}
function disass(idsestavy) {
	 console.log('ID sestavy, ktera se bude rusit, je ' + idsestavy); //TODO potvrzovaci tlacitko
	 $.ajax({
		url: "components/sestavit.php",
		type: "GET",
		data: {
			disass: idsestavy
		},
		success: function(data) {
			reloadSestavy();
			reloadSkladaniSestav();
			if (data !== '') {
				swal(data);
			}
		}
	});
}
function zmenit(idsestavy) {
	$.ajax({
		url: "components/sestavit.php",
		type: "GET",
		data: {
			switch: idsestavy
		},
		success: function(data) {
			reloadSestavy();
			if (data !== '') {
				swal(data);
			}
		}
	});
}
function populateObject(type){
	if(shouldReturnArray(type)===true){
		for(i=0;i<window[type].length;i++){
			if(window[type][i].idveci===undefined){
			//	computer[type+(i+1)] = -1;
			} else {
				computer[type+(i+1)] = window[type][i].idveci
			}
		}
	} else {
		if(window[type].idveci===undefined){
		//	computer[type] = -1;
		} else {
			computer[type] = window[type].idveci;
		}
	}
}
$(function() {
	reloadSestavy();
	reloadSkladaniSestav();

//	$("html").css("overflow-y":"scroll");
});
