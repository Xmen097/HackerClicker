<!DOCTYPE html>
<html>
<head>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
	<meta charset="Utf-8">
<script type="text/javascript">
	var stat = {
		money: 1,
		mps: 1,
	}
	var price = {
		MP3: 'BOUGHT',
		OldPC: 10,
		Mobile: 100,
		NB: 1000,
		PC: 10000,
		Server: 1000,
		Company: 10000,
		Bank: 10000,
		State: 100000,
		World: 1000000,
	}
	var targets = {
		MP3: {cost: 'BOUGHT', name: 'MP3 Přehrávač', mps: 1, progress: 2},
		OldPC: {cost: 10, name: 'Starý školní počítač', mps: 5, progress: 2},
		Mobile: {cost: 100, name: 'Mobilní telefon', mps: 20, progress: 2},
		NB: {cost: 1000, name: 'Notebook', mps: 50, progress: 2},
		PC: {cost: 10000, name: 'Stolní počítač', mps: 200, progress: 2},
		Server: {cost: 1000, name: 'Server', mps: 500, progress: 2},
		Company: {cost: 10000, name: 'Společnost', mps: 1000, progress: 2},
		Bank: {cost: 10000, name: 'Banka', mps: 5000, progress: 2},
		State: {cost: 100000, name: 'Stát', mps: 10000, progress: 2},
		World: {cost: 100000000, name: 'Svět', mps: 100000, progress: 2}
	}
	var message = {
		already: 'Již koupeno!',
		bought: 'Nákup úspěšný',
		funds: 'Nemáte dostatek peněz',
	}
	function menureload() {
	menu = {
		clickers: 'Clickers',
		clickerupgrades: 'ClickersUpgrades',
		upgrades: 'upgrades',
		targets: '<div class="menuitem" id="MP3">'+targets.MP3.name+'<div class="cost">'+targets.MP3.cost+'</div></div><div class="menuitem" id="OldPC">'+targets.OldPC.name+'<div class="cost">'+targets.OldPC.cost+'</div></div><div class="menuitem" id="Mobile">'+targets.Mobile.name+'<div class="cost">'+targets.Mobile.cost+'</div></div></div><div class="menuitem" id="NB">'+targets.NB.name+'<div class="cost">'+targets.NB.cost+'</div></div></div><div class="menuitem" id="PC">'+targets.PC.name+'<div class="cost">'+targets.PC.cost+'</div></div></div><div class="menuitem" id="Server">'+targets.Server.name+'<div class="cost">'+targets.Server.cost+'</div></div></div><div class="menuitem" id="Company">'+targets.Company.name+'<div class="cost">'+targets.Company.cost+'</div></div></div><div class="menuitem" id="Bank">'+targets.Bank.name+'<div class="cost">'+targets.Bank.cost+'</div></div></div><div class="menuitem" id="State">'+targets.State.name+'<div class="cost">'+targets.State.cost+'</div></div></div><div class="menuitem" id="World">'+targets.World.name+'<div class="cost">'+targets.World.cost+'</div></div>',
		level: 'level'
		}
	}
	menureload();
	$(document).ready(function() {
	console.log('Page loaded!')
		$('#target').click(function() {
			stat.money = parseInt(stat.money) + stat.mps;
			$('#money').text(stat.money);
		});
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
			$('#shop').html(menu.targets);
			$('#MP3').click(function() {
				alert(message.already);
			});
			$('#OldPC').click(function() {
				if (targets.OldPC.cost == 'BOUGHT') {alert(message.already);} //je koupeno?
				else if (stat.money >= targets.OldPC.cost) {
					alert(message.bought);
					stat.money = parseInt(stat.money) - targets.OldPC.cost;	//odečtení peněz
					$('#money').text(stat.money); 						//aktualizování peněz
					targets.OldPC.cost = 'BOUGHT'; 							//nastavení stavu na koupeno
					menureload(); 										//znovunačtení cen
					stat.mps = targets.OldPC.mps; 							//aktualizace přidávání peněz
					$('#targetdiv').html('<img src="img/targets/OldPC.png" id="target">') //načtení obrázku
					$('#target').click(function() {stat.money = parseInt(stat.money) + stat.mps;$('#money').text(stat.money);});//přičítání peněz
					$('#OldPC').html('Starý školní počítač<div class="cost">'+targets.OldPC.cost+'</div>'); //zavření meny
				} else {alert(message.funds);} //málo peněz
			});
			$('#Mobile').click(function() {
				if (targets.Mobile.cost == 'BOUGHT') {alert(message.already);} //je koupeno?
				else if (stat.money >= targets.Mobile.cost) {
					alert(message.bought);
					stat.money = parseInt(stat.money) - targets.Mobile.cost;	//odečtení peněz
					$('#money').text(stat.money); 						//aktualizování peněz
					targets.Mobile.cost = 'BOUGHT'; 							//nastavení stavu na koupeno
					menureload(); 										//znovunačtení cen
					stat.mps = targets.Mobile.mps; 							//aktualizace přidávání peněz
					$('#targetdiv').html('<img src="img/targets/Mobile.png" id="target">') //načtení obrázku
					$('#target').click(function() {stat.money = parseInt(stat.money) + stat.mps;$('#money').text(stat.money);});//přičítání peněz
					$('#Mobile').html('Mobil<div class="cost">'+targets.Mobile.cost+'</div>'); //aktualizace menu
				} else {alert(message.funds);} //málo peněz
			});
			$('#NB').click(function() {
				if (targets.NB.cost == 'BOUGHT') {alert(message.already);} //je koupeno?
				else if (stat.money >= targets.NB.cost) {
					alert(message.bought);
					stat.money = parseInt(stat.money) - targets.NB.cost;	//odečtení peněz
					$('#money').text(stat.money); 						//aktualizování peněz
					targets.NB.cost = 'BOUGHT'; 							//nastavení stavu na koupeno
					menureload(); 										//znovunačtení cen
					stat.mps = targets.NB.mps; 							//aktualizace přidávání peněz
					$('#targetdiv').html('<img src="img/targets/NB.png" id="target">') //načtení obrázku
					$('#target').click(function() {stat.money = parseInt(stat.money) + stat.mps;$('#money').text(stat.money);});//přičítání peněz
					$('#NB').html('Notebook<div class="cost">'+targets.NB.cost+'</div>'); //aktualizace menu
				} else {alert(message.funds);} //málo peněz
			});
			$('#PC').click(function() {
				if (targets.PC.cost == 'BOUGHT') {alert(message.already);} //je koupeno?
				else if (stat.money >= targets.PC.cost) {
					alert(message.bought);
					stat.money = parseInt(stat.money) - targets.PC.cost;	//odečtení peněz
					$('#money').text(stat.money); 						//aktualizování peněz
					targets.PC.cost = 'BOUGHT'; 							//nastavení stavu na koupeno
					menureload(); 										//znovunačtení cen
					stat.mps = targets.PC.mps; 							//aktualizace přidávání peněz
					$('#targetdiv').html('<img src="img/targets/PC.png" id="target">') //načtení obrázku
					$('#target').click(function() {stat.money = parseInt(stat.money) + stat.mps;$('#money').text(stat.money);});//přičítání peněz
					$('#PC').html('Stolní počítač<div class="cost">'+targets.PC.cost+'</div>'); //aktualizace menu
				} else {alert(message.funds);} //málo peněz
			});
			$('#Server').click(function() {
				if (targets.Server.cost == 'BOUGHT') {alert(message.already);} //je koupeno?
				else if (stat.money >= targets.Server.cost) {
					alert(message.bought);
					stat.money = parseInt(stat.money) - targets.Server.cost;	//odečtení peněz
					$('#money').text(stat.money); 						//aktualizování peněz
					targets.Server.cost = 'BOUGHT'; 							//nastavení stavu na koupeno
					menureload(); 										//znovunačtení cen
					stat.mps = targets.Server.mps; 							//aktualizace přidávání peněz
					$('#targetdiv').html('<img src="img/targets/Server.png" id="target">') //načtení obrázku
					$('#target').click(function() {stat.money = parseInt(stat.money) + stat.mps;$('#money').text(stat.money);});//přičítání peněz
					$('#Server').html('Server<div class="cost">'+targets.Server.cost+'</div>'); //aktualizace menu
				} else {alert(message.funds);} //málo peněz
			});
			$('#Company').click(function() {
				if (targets.Company.cost == 'BOUGHT') {alert(message.already);} //je koupeno?
				else if (stat.money >= targets.Company.cost) {
					alert(message.bought);
					stat.money = parseInt(stat.money) - targets.Company.cost;	//odečtení peněz
					$('#money').text(stat.money); 						//aktualizování peněz
					targets.Company.cost = 'BOUGHT'; 							//nastavení stavu na koupeno
					menureload(); 										//znovunačtení cen
					stat.mps = targets.Company.mps; 							//aktualizace přidávání peněz
					$('#targetdiv').html('<img src="img/targets/Company.png" id="target">') //načtení obrázku
					$('#target').click(function() {stat.money = parseInt(stat.money) + stat.mps;$('#money').text(stat.money);});//přičítání peněz
					$('#Company').html('Společnost<div class="cost">'+targets.Company.cost+'</div>'); //aktualizace menu
				} else {alert(message.funds);} //málo peněz
			});
			$('#Bank').click(function() {
				if (targets.Bank.cost == 'BOUGHT') {alert(message.already);} //je koupeno?
				else if (stat.money >= targets.Bank.cost) {
					alert(message.bought);
					stat.money = parseInt(stat.money) - targets.Bank.cost;	//odečtení peněz
					$('#money').text(stat.money); 						//aktualizování peněz
					targets.Bank.cost = 'BOUGHT'; 							//nastavení stavu na koupeno
					menureload(); 										//znovunačtení cen
					stat.mps = targets.Bank.mps; 							//aktualizace přidávání peněz
					$('#targetdiv').html('<img src="img/targets/Bank.png" id="target">') //načtení obrázku
					$('#target').click(function() {stat.money = parseInt(stat.money) + stat.mps;$('#money').text(stat.money);});//přičítání peněz
					$('#Bank').html('Bank<div class="cost">'+targets.Bank.cost+'</div>'); //aktualizace menu
				} else {alert(message.funds);} //málo peněz
			});
			$('#State').click(function() {
				if (targets.State.cost == 'BOUGHT') {alert(message.already);} //je koupeno?
				else if (stat.money >= targets.State.cost) {
					alert(message.bought);
					stat.money = parseInt(stat.money) - targets.State.cost;	//odečtení peněz
					$('#money').text(stat.money); 						//aktualizování peněz
					targets.State.cost = 'BOUGHT'; 							//nastavení stavu na koupeno
					menureload(); 										//znovunačtení cen
					stat.mps = targets.State.mps; 							//aktualizace přidávání peněz
					$('#targetdiv').html('<img src="img/targets/State.png" id="target">') //načtení obrázku
					$('#target').click(function() {stat.money = parseInt(stat.money) + stat.mps;$('#money').text(stat.money);});//přičítání peněz
					$('#State').html('Stát<div class="cost">'+targets.State.cost+'</div>'); //aktualizace menu
				} else {alert(message.funds);} //málo peněz
			});
			$('#World').click(function() {
				if (targets.World.cost == 'BOUGHT') {alert(message.already);} //je koupeno?
				else if (stat.money >= targets.World.cost) {
					alert(message.bought);
					stat.money = parseInt(stat.money) - targets.World.cost;	//odečtení peněz
					$('#money').text(stat.money); 						//aktualizování peněz
					targets.World.cost = 'BOUGHT'; 							//nastavení stavu na koupeno
					menureload(); 										//znovunačtení cen
					stat.mps = targets.World.mps; 							//aktualizace přidávání peněz
					$('#targetdiv').html('<img src="img/targets/World.png" id="target">') //načtení obrázku
					$('#target').click(function() {stat.money = parseInt(stat.money) + stat.mps;$('#money').text(stat.money);});//přičítání peněz
					$('#World').html('Svět<div class="cost">'+targets.World.cost+'</div>'); //aktualizace menu
				} else {alert(message.funds);} //málo peněz
			});
		});
		$('#levelMenu').click(function() {
			$('#shop').html(menu.level);
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
	<div id="moneydiv"><span id="money">0</span>  <span id="dolar">$$</span> </div>
			<div id="targetdiv">
				<img src="img/targets/MP3.png" id="target">
			</div>
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
