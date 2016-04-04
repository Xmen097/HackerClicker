<!DOCTYPE html>
<html>
<head>
	<script src="libs/jquery.js" type="text/javascript"></script>
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
	<meta charset="Utf-8">
	<link rel="stylesheet" href="libs/font awesome/css/font-awesome.min.css">
<script type="text/javascript">
	var stat = {
		money: 0,
		mps: 1,
		progress: 2
	}
	var targets = {
		MP3: 	{cost: 'BOUGHT', name: 'MP3 Přehrávač', 	  mps: 1, 	   progress: 2},
		OldPC:  {cost: 10,		 name: 'Starý školní počítač',mps: 5, 	   progress: 3},
		Mobile: {cost: 100,      name: 'Mobilní telefon', 	  mps: 20, 	   progress: 5},
		NB: 	{cost: 1000,	 name: 'Notebook', 			  mps: 50, 	   progress: 10},
		PC: 	{cost: 10000, 	 name: 'Stolní počítač', 	  mps: 200,    progress: 20},
		Server: {cost: 1000, 	 name: 'Server', 			  mps: 500,    progress: 50},
		Company:{cost: 10000, 	 name: 'Společnost', 		  mps: 1000,   progress: 100},
		Bank:   {cost: 100000, 	 name: 'Banka', 			  mps: 5000,   progress: 200},
		State:  {cost: 100000, 	 name: 'Stát',				  mps: 10000,  progress: 500},
		World:  {cost: 100000000,name: 'Svět', 				  mps: 100000, progress: 1000},
	}
	var message = {
		already: 'Již koupeno!',
		bought:  'Nákup úspěšný',
		funds:   'Nemáte dostatek peněz',
		unknown: 'Kupte předchozí věc k odemknutí'
	}
	function menureload() {
	menu = {
		clickers: 		 'Clickers',
		clickerupgrades: 'ClickersUpgrades',
		upgrades: 	     'upgrades',
		targets:  		 '<div class="menuitem" id="MP3">'+targets.MP3.name+'<div class="cost">'+targets.MP3.cost+'</div></div><div class="menuitem" id="OldPC">'+targets.OldPC.name+'<div class="cost">'+targets.OldPC.cost+'</div></div>#<div class="menuitem" id="Mobile">'+targets.Mobile.name+'<div class="cost">'+targets.Mobile.cost+'</div></div>#<div class="menuitem" id="NB">'+targets.NB.name+'<div class="cost">'+targets.NB.cost+'</div></div>#<div class="menuitem" id="PC">'+targets.PC.name+'<div class="cost">'+targets.PC.cost+'</div></div>#<div class="menuitem" id="Server">'+targets.Server.name+'<div class="cost">'+targets.Server.cost+'</div></div>#<div class="menuitem" id="Company">'+targets.Company.name+'<div class="cost">'+targets.Company.cost+'</div></div>#<div class="menuitem" id="Bank">'+targets.Bank.name+'<div class="cost">'+targets.Bank.cost+'</div></div>#<div class="menuitem" id="State">'+targets.State.name+'<div class="cost">'+targets.State.cost+'</div></div>#<div class="menuitem" id="World">'+targets.World.name+'<div class="cost">'+targets.World.cost+'</div></div>#',
		level:    		 'level',
		unknown:  		 '<div class="menuitem" id="Unknown">??????????<div class="cost">??????????</div></div>'
		}
	}
	menureload();
	function Target() {
		$('#target').click(function() {
			progress = parseFloat($('#progress').css('width'));
			percent = progress / 250 * 100;
			
			console.log(progress);
			if (progress >= 250) {progress = 0;stat.money = parseInt(stat.money) + stat.mps;}
			else
			progress = progress + 250/(stat.progress - 1);
			console.log(progress);
			$('#progress').css('width', progress);
			$('#money').text(stat.money);<!--ddd
		});
		}
	function targetsfunction() {
		$('#shop').html(menu.targets.split('#')[0]+menu.unknown);
		$('#MP3').click(function() {
			alert(message.already);
		});
		$('#Unknown').click(function() {
			alert(message.unknown);
		});
		targetsarray = Array(targets.OldPC, targets.Mobile, targets.NB, targets.PC, targets.Server, targets.Company, targets.Bank, targets.State, targets.World, 'OldPC', 'Mobile', 'NB', 'PC', 'Server', 'Company', 'Bank', 'State', 'World')
		a=0;
		while (a < (targetsarray.length-1)/2) {
			console.log(targetsarray[a].cost)
			$('#'+targetsarray[a+9]).click(function() {
				if (targetsarray[a].cost == 'BOUGHT') {alert(message.already);} //je koupeno?
				else if (stat.money >= targetsarray[a].cost) {
					alert(message.bought);
					stat.money = parseInt(stat.money) - targetsarray[a].cost;	//odečtení peněz
					$('#money').text(stat.money); 						//aktualizování peněz
					targetsarray[a].cost = 'BOUGHT'; 							//nastavení stavu na koupeno
					menureload(); 										//znovunačtení cen
					stat.mps = targetsarray[a].mps;
					stat.progress = targetsarray[a].progress; 							//aktualizace přidávání peněz
					$('#targetdiv').html('<img src="img/targets/'+targetsarray[a+9]+'.png" id="target">') //načtení obrázku
					Target();
					$('#shop').html(menu.targets.split('#')[a]+menu.unknown);
					targetsfunction();
				} else {alert(message.funds);} //málo peněz
			});
		a++;
		}
	}
	$(document).ready(function() {
		volume = 1;
		$('#Volume').html('<i class="fa fa-volume-up fa-2x"></i>');
	console.log('Page loaded!')
		Target();
		$('#clickersMenu').click(function() {
			$('#shop').html(menu.clickers);
		});
		$('#clickerupgradesMenu').click(function() {
			$('#shop').html(menu.clickerupgrades);
		});
		$('#upgradesMenu').click(function() {
			$('#shop').html(menu.upgrades);
		});
		$('#targetsMenu').click(function() {
			targetsfunction();
		});
		$('#levelMenu').click(function() {
			$('#shop').html(menu.level);
		});
		$('#Volume').click(function() {
			if (volume == 1) {
				volume = 0;
				$('#Volume').html('<i class="fa fa-volume-off fa-2x"></i>');
			}else {
				volume = 1;
				$('#Volume').html('<i class="fa fa-volume-up fa-2x"></i>');
			}
		});
	});
</script>

	<title>Hra</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
<body>
<div class="nadpis">Hra</div>

<div id="game">
	<div id="main">
	<button id="Volume"><i class="fa fa-volume-up fa-2x"></i></button>
		<div id="moneydiv"><span id="money">0</span>  <span id="dolar"><i class="fa fa-money"></i></span></div>
			<div id="targetdiv">
				<img src="img/targets/MP3.png" id="target">
			</div>
		<div id="progressbar"><div id="progress"></div></div>
	</div>

	<div id="menu">
		<div id="shopmenu">
			<div id="clickersMenu"></div>
			<div id="clickerupgradesMenu"></div>
			<div id="upgradesMenu"></div>
			<div id="targetsMenu"></div>
			<div id="levelMenu"></div>
		</div>
		<div id="shop">
			
		</div>
	</div>
		
</div>
</body>
</html>
<?php
console.log('Todle PHP neumí:)')
?>