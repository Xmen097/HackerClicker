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
		World: 1000000
	}
	var targets = {
		MP3: {cost: 'BOUGHT', name: 'MP3 Přehrávač', mps: 1, progress: 2},
		OldPC: {cost: 10, name: 'Starý školní počítač', mps: 5, progress: 3},
		Mobile: {cost: 100, name: 'Mobilní telefon', mps: 20, progress: 5},
		NB: {cost: 1000, name: 'Notebook', mps: 50, progress: 10},
		PC: {cost: 10000, name: 'Stolní počítač', mps: 200, progress: 20},
		Server: {cost: 1000, name: 'Server', mps: 500, progress: 50},
		Company: {cost: 10000, name: 'Společnost', mps: 1000, progress: 100},
		Bank: {cost: 10000, name: 'Banka', mps: 5000, progress: 200},
		State: {cost: 100000, name: 'Stát', mps: 10000, progress: 500},
		World: {cost: 100000000, name: 'Svět', mps: 100000, progress: 1000},
		unknown: '<div class="menuitem" </div>id="Unknown">??????????<div class="cost">??????????</div></div>'
	}
	var message = {
		already: 'Již koupeno!',
		bought: 'Nákup úspěšný',
		funds: 'Nemáte dostatek peněz',
		unknown: 'Kupte předchozí věc k odemknutí'
	}
	function menureload() {
	menu = {
		clickers: 'Clickers',
		clickerupgrades: 'ClickersUpgrades',
		upgrades: 'upgrades',
		targets: '<div class="menuitem" id="MP3">'+targets.MP3.name+'<div class="cost">'+targets.MP3.cost+'</div></div><div class="menuitem" id="OldPC">'+targets.OldPC.name+'<div class="cost">'+targets.OldPC.cost+'</div></div><div class="menuitem" id="Unknown">??????????<div class="cost">??????????</div></div>',
		level: 'level'
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
			$('#money').text(stat.money);
		});
		}
	function targetsfunction() {
		$('#shop').html(menu.targets);
			$('#MP3').click(function() {
				alert(message.already);
			});
			$('#Unknown').click(function() {
				alert(message.unknown);
			});
			targetsarray = Array(targets.MP3.cost, targets.OldPC.cost, targets.Mobile.cost, targets.NB.cost, targets.PC.cost, targets.Server.cost, targets.Company.cost, targets.Bank.cost, targets.State.cost, targets.World.cost, targets.MP3.mps, targets.OldPC.mps, targets.Mobile.mps, targets.NB.mps, targets.PC.mps, targets.Server.mps, targets.Company.mps, targets.Bank.mps, targets.State.mps, targets.World.mps)
			$('#OldPC').click(function() {
				if (targets.OldPC.cost == 'BOUGHT') {alert(message.already);} //je koupeno?
				else if (stat.money >= targets.OldPC.cost) {
					alert(message.bought);
					stat.money = parseInt(stat.money) - targets.OldPC.cost;	//odečtení peněz
					$('#money').text(stat.money); 						//aktualizování peněz
					targets.OldPC.cost = 'BOUGHT'; 							//nastavení stavu na koupeno
					menureload(); 										//znovunačtení cen
					stat.mps = targets.OldPC.mps;
					stat.progress = targets.OldPC.progress; 							//aktualizace přidávání peněz
					$('#targetdiv').html('<img src="img/targets/OldPC.png" id="target">') //načtení obrázku
					Target();
					menu.targets = '<div class="menuitem" id="MP3">'+targets.MP3.name+'<div class="cost">'+targets.MP3.cost+'</div></div><div class="menuitem" id="OldPC">'+targets.OldPC.name+'<div class="cost">'+targets.OldPC.cost+'</div></div><div class="menuitem" id="Mobile">'+targets.Mobile.name+'<div class="cost">'+targets.Mobile.cost+'</div></div><div class="menuitem" id="Unknown">??????????<div class="cost">??????????</div></div>'
					$('#shop').html('<div class="menuitem" id="MP3">'+targets.MP3.name+'<div class="cost">'+targets.MP3.cost+'</div></div><div class="menuitem" id="OldPC">'+targets.OldPC.name+'<div class="cost">'+targets.OldPC.cost+'</div></div><div class="menuitem" id="Mobile">'+targets.Mobile.name+'<div class="cost">'+targets.Mobile.cost+'</div></div><div class="menuitem" id="Unknown">??????????<div class="cost">??????????</div></div>'); //aktualizace menu
					targetsfunction();
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
					stat.mps = targets.Mobile.mps; 	
					stat.progress = targets.Mobile.progress; 							//aktualizace přidávání peněz
					$('#targetdiv').html('<img src="img/targets/Mobile.png" id="target">') //načtení obrázku
					Target();
					menu.targets = '<div class="menuitem" id="MP3">'+targets.MP3.name+'<div class="cost">'+targets.MP3.cost+'</div></div><div class="menuitem" id="OldPC">'+targets.OldPC.name+'<div class="cost">'+targets.OldPC.cost+'</div></div><div class="menuitem" id="Mobile">'+targets.Mobile.name+'<div class="cost">'+targets.Mobile.cost+'</div></div><div class="menuitem" id="NB">'+targets.NB.name+'<div class="cost">'+targets.NB.cost+'</div></div><div class="menuitem" id="Unknown">??????????<div class="cost">??????????</div></div>'; //aktualizace menu
					$('#shop').html('<div class="menuitem" id="MP3">'+targets.MP3.name+'<div class="cost">'+targets.MP3.cost+'</div></div><div class="menuitem" id="OldPC">'+targets.OldPC.name+'<div class="cost">'+targets.OldPC.cost+'</div></div><div class="menuitem" id="Mobile">'+targets.Mobile.name+'<div class="cost">'+targets.Mobile.cost+'</div></div><div class="menuitem" id="NB">'+targets.NB.name+'<div class="cost">'+targets.NB.cost+'</div></div><div class="menuitem" id="Unknown">??????????<div class="cost">??????????</div></div>'); //aktualizace menu
					targetsfunction();
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
					stat.mps = targets.NB.mps; 		
					stat.progress = targets.NB.progress; 					//aktualizace přidávání peněz
					$('#targetdiv').html('<img src="img/targets/NB.png" id="target">') //načtení obrázku
					Target();
					menu.targets = '<div class="menuitem" id="MP3">'+targets.MP3.name+'<div class="cost">'+targets.MP3.cost+'</div></div><div class="menuitem" id="OldPC">'+targets.OldPC.name+'<div class="cost">'+targets.OldPC.cost+'</div></div><div class="menuitem" id="Mobile">'+targets.Mobile.name+'<div class="cost">'+targets.Mobile.cost+'</div></div><div class="menuitem" id="NB">'+targets.NB.name+'<div class="cost">'+targets.NB.cost+'</div></div><div class="menuitem" id="PC">'+targets.PC.name+'<div class="cost">'+targets.PC.cost+'</div></div><div class="menuitem" id="Unknown">??????????<div class="cost">??????????</div></div>'; //aktualizace menu
					$('#shop').html('<div class="menuitem" id="MP3">'+targets.MP3.name+'<div class="cost">'+targets.MP3.cost+'</div></div><div class="menuitem" id="OldPC">'+targets.OldPC.name+'<div class="cost">'+targets.OldPC.cost+'</div></div><div class="menuitem" id="Mobile">'+targets.Mobile.name+'<div class="cost">'+targets.Mobile.cost+'</div></div><div class="menuitem" id="NB">'+targets.NB.name+'<div class="cost">'+targets.NB.cost+'</div></div><div class="menuitem" id="PC">'+targets.PC.name+'<div class="cost">'+targets.PC.cost+'</div></div><div class="menuitem" </div>id="Unknown">??????????<div class="cost">??????????</div></div>'); //aktualizace menu
					targetsfunction();
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
					stat.mps = targets.PC.mps; 		
					stat.progress = targets.PC.progress; 					//aktualizace přidávání peněz
					$('#targetdiv').html('<img src="img/targets/PC.png" id="target">') //načtení obrázku
					Target();
					menu.targets = '<div class="menuitem" id="MP3">'+targets.MP3.name+'<div class="cost">'+targets.MP3.cost+'</div></div><div class="menuitem" id="OldPC">'+targets.OldPC.name+'<div class="cost">'+targets.OldPC.cost+'</div></div><div class="menuitem" id="Mobile">'+targets.Mobile.name+'<div class="cost">'+targets.Mobile.cost+'</div></div><div class="menuitem" id="NB">'+targets.NB.name+'<div class="cost">'+targets.NB.cost+'</div></div><div class="menuitem" id="PC">'+targets.PC.name+'<div class="cost">'+targets.PC.cost+'</div></div><div class="menuitem" id="Server">'+targets.Server.name+'<div class="cost">'+targets.Server.cost+'</div></div><div class="menuitem" id="Unknown">??????????<div class="cost">??????????</div></div>'; //aktualizace menu
					$('#shop').html('<div class="menuitem" id="MP3">'+targets.MP3.name+'<div class="cost">'+targets.MP3.cost+'</div></div><div class="menuitem" id="OldPC">'+targets.OldPC.name+'<div class="cost">'+targets.OldPC.cost+'</div></div><div class="menuitem" id="Mobile">'+targets.Mobile.name+'<div class="cost">'+targets.Mobile.cost+'</div></div><div class="menuitem" id="NB">'+targets.NB.name+'<div class="cost">'+targets.NB.cost+'</div></div><div class="menuitem" id="PC">'+targets.PC.name+'<div class="cost">'+targets.PC.cost+'</div></div><div class="menuitem" id="Server">'+targets.Server.name+'<div class="cost">'+targets.Server.cost+'</div></div><div class="menuitem" id="Unknown">??????????<div class="cost">??????????</div></div>'); //aktualizace menu
					targetsfunction();
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
					stat.mps = targets.Server.mps; 
					stat.progress = targets.Server.progress; 							//aktualizace přidávání peněz
					$('#targetdiv').html('<img src="img/targets/server.png" id="target">') //načtení obrázku
					Target();
					menu.targets = '<div class="menuitem" id="MP3">'+targets.MP3.name+'<div class="cost">'+targets.MP3.cost+'</div></div><div class="menuitem" id="OldPC">'+targets.OldPC.name+'<div class="cost">'+targets.OldPC.cost+'</div></div><div class="menuitem" id="Mobile">'+targets.Mobile.name+'<div class="cost">'+targets.Mobile.cost+'</div></div><div class="menuitem" id="NB">'+targets.NB.name+'<div class="cost">'+targets.NB.cost+'</div></div><div class="menuitem" id="PC">'+targets.PC.name+'<div class="cost">'+targets.PC.cost+'</div></div><div class="menuitem" id="Server">'+targets.Server.name+'<div class="cost">'+targets.Server.cost+'</div></div><div class="menuitem" id="Company">'+targets.Company.name+'<div class="cost">'+targets.Company.cost+'</div></div><div class="menuitem" id="Unknown">??????????<div class="cost">??????????</div></div>'; //aktualizace menu
					$('#shop').html('<div class="menuitem" id="MP3">'+targets.MP3.name+'<div class="cost">'+targets.MP3.cost+'</div></div><div class="menuitem" id="OldPC">'+targets.OldPC.name+'<div class="cost">'+targets.OldPC.cost+'</div></div><div class="menuitem" id="Mobile">'+targets.Mobile.name+'<div class="cost">'+targets.Mobile.cost+'</div></div><div class="menuitem" id="NB">'+targets.NB.name+'<div class="cost">'+targets.NB.cost+'</div></div><div class="menuitem" id="PC">'+targets.PC.name+'<div class="cost">'+targets.PC.cost+'</div></div><div class="menuitem" id="Server">'+targets.Server.name+'<div class="cost">'+targets.Server.cost+'</div></div><div class="menuitem" id="Company">'+targets.Company.name+'<div class="cost">'+targets.Company.cost+'</div></div><div class="menuitem" id="Unknown">??????????<div class="cost">??????????</div></div>'); //aktualizace menu
					targetsfunction();
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
					stat.mps = targets.Company.mps;
					stat.progress = targets.Company.progress; 							//aktualizace přidávání peněz
					$('#targetdiv').html('<img src="img/targets/Company.png" id="target">') //načtení obrázku
					Target();
					menu.targets = '<div class="menuitem" id="MP3">'+targets.MP3.name+'<div class="cost">'+targets.MP3.cost+'</div></div><div class="menuitem" id="OldPC">'+targets.OldPC.name+'<div class="cost">'+targets.OldPC.cost+'</div></div><div class="menuitem" id="Mobile">'+targets.Mobile.name+'<div class="cost">'+targets.Mobile.cost+'</div></div><div class="menuitem" id="NB">'+targets.NB.name+'<div class="cost">'+targets.NB.cost+'</div></div><div class="menuitem" id="PC">'+targets.PC.name+'<div class="cost">'+targets.PC.cost+'</div></div><div class="menuitem" id="Server">'+targets.Server.name+'<div class="cost">'+targets.Server.cost+'</div></div><div class="menuitem" id="Company">'+targets.Company.name+'<div class="cost">'+targets.Company.cost+'</div></div><div class="menuitem" id="Bank">'+targets.Bank.name+'<div class="cost">'+targets.Bank.cost+'</div></div><div class="menuitem" id="Unknown">??????????<div class="cost">??????????</div></div>'; //aktualizace menu
					$('#shop').html('<div class="menuitem" id="MP3">'+targets.MP3.name+'<div class="cost">'+targets.MP3.cost+'</div></div><div class="menuitem" id="OldPC">'+targets.OldPC.name+'<div class="cost">'+targets.OldPC.cost+'</div></div><div class="menuitem" id="Mobile">'+targets.Mobile.name+'<div class="cost">'+targets.Mobile.cost+'</div></div><div class="menuitem" id="NB">'+targets.NB.name+'<div class="cost">'+targets.NB.cost+'</div></div><div class="menuitem" id="PC">'+targets.PC.name+'<div class="cost">'+targets.PC.cost+'</div></div><div class="menuitem" id="Server">'+targets.Server.name+'<div class="cost">'+targets.Server.cost+'</div></div><div class="menuitem" id="Company">'+targets.Company.name+'<div class="cost">'+targets.Company.cost+'</div></div><div class="menuitem" id="Bank">'+targets.Bank.name+'<div class="cost">'+targets.Bank.cost+'</div></div><div class="menuitem" id="Unknown">??????????<div class="cost">??????????</div></div>'); //aktualizace menu
					targetsfunction();
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
					stat.mps = targets.Bank.mps; 
					stat.progress = targets.Bank.progress; 							//aktualizace přidávání peněz
					$('#targetdiv').html('<img src="img/targets/Bank.png" id="target">') //načtení obrázku
					Target();
					menu.targets = '<div class="menuitem" id="MP3">'+targets.MP3.name+'<div class="cost">'+targets.MP3.cost+'</div></div><div class="menuitem" id="OldPC">'+targets.OldPC.name+'<div class="cost">'+targets.OldPC.cost+'</div></div><div class="menuitem" id="Mobile">'+targets.Mobile.name+'<div class="cost">'+targets.Mobile.cost+'</div></div><div class="menuitem" id="NB">'+targets.NB.name+'<div class="cost">'+targets.NB.cost+'</div></div><div class="menuitem" id="PC">'+targets.PC.name+'<div class="cost">'+targets.PC.cost+'</div></div><div class="menuitem" id="Server">'+targets.Server.name+'<div class="cost">'+targets.Server.cost+'</div></div><div class="menuitem" id="Company">'+targets.Company.name+'<div class="cost">'+targets.Company.cost+'</div></div><div class="menuitem" id="Bank">'+targets.Bank.name+'<div class="cost">'+targets.Bank.cost+'</div></div><div class="menuitem" id="State">'+targets.State.name+'<div class="cost">'+targets.State.cost+'</div></div><div class="menuitem" id="Unknown">??????????<div class="cost">??????????</div></div>'; //aktualizace menu
					$('#shop').html('<div class="menuitem" id="MP3">'+targets.MP3.name+'<div class="cost">'+targets.MP3.cost+'</div></div><div class="menuitem" id="OldPC">'+targets.OldPC.name+'<div class="cost">'+targets.OldPC.cost+'</div></div><div class="menuitem" id="Mobile">'+targets.Mobile.name+'<div class="cost">'+targets.Mobile.cost+'</div></div><div class="menuitem" id="NB">'+targets.NB.name+'<div class="cost">'+targets.NB.cost+'</div></div><div class="menuitem" id="PC">'+targets.PC.name+'<div class="cost">'+targets.PC.cost+'</div></div><div class="menuitem" id="Server">'+targets.Server.name+'<div class="cost">'+targets.Server.cost+'</div></div><div class="menuitem" id="Company">'+targets.Company.name+'<div class="cost">'+targets.Company.cost+'</div></div><div class="menuitem" id="Bank">'+targets.Bank.name+'<div class="cost">'+targets.Bank.cost+'</div></div><div class="menuitem" id="State">'+targets.State.name+'<div class="cost">'+targets.State.cost+'</div></div><div class="menuitem" id="Unknown">??????????<div class="cost">??????????</div></div>'); //aktualizace menu
					targetsfunction();
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
					stat.mps = targets.State.mps;
					stat.progress = targets.State.progress; 							//aktualizace přidávání peněz
					$('#targetdiv').html('<img src="img/targets/State.png" id="target">') //načtení obrázku
					Target();
					menu.targets = '<div class="menuitem" id="MP3">'+targets.MP3.name+'<div class="cost">'+targets.MP3.cost+'</div></div><div class="menuitem" id="OldPC">'+targets.OldPC.name+'<div class="cost">'+targets.OldPC.cost+'</div></div><div class="menuitem" id="Mobile">'+targets.Mobile.name+'<div class="cost">'+targets.Mobile.cost+'</div></div><div class="menuitem" id="NB">'+targets.NB.name+'<div class="cost">'+targets.NB.cost+'</div></div><div class="menuitem" id="PC">'+targets.PC.name+'<div class="cost">'+targets.PC.cost+'</div></div><div class="menuitem" id="Server">'+targets.Server.name+'<div class="cost">'+targets.Server.cost+'</div></div><div class="menuitem" id="Company">'+targets.Company.name+'<div class="cost">'+targets.Company.cost+'</div></div><div class="menuitem" id="Bank">'+targets.Bank.name+'<div class="cost">'+targets.Bank.cost+'</div></div><div class="menuitem" id="State">'+targets.State.name+'<div class="cost">'+targets.State.cost+'</div></div><div class="menuitem" id="World">'+targets.World.name+'<div class="cost">'+targets.World.cost+'</div></div>'; //aktualizace menu
					$('#shop').html('<div class="menuitem" id="MP3">'+targets.MP3.name+'<div class="cost">'+targets.MP3.cost+'</div></div><div class="menuitem" id="OldPC">'+targets.OldPC.name+'<div class="cost">'+targets.OldPC.cost+'</div></div><div class="menuitem" id="Mobile">'+targets.Mobile.name+'<div class="cost">'+targets.Mobile.cost+'</div></div><div class="menuitem" id="NB">'+targets.NB.name+'<div class="cost">'+targets.NB.cost+'</div></div><div class="menuitem" id="PC">'+targets.PC.name+'<div class="cost">'+targets.PC.cost+'</div></div><div class="menuitem" id="Server">'+targets.Server.name+'<div class="cost">'+targets.Server.cost+'</div></div><div class="menuitem" id="Company">'+targets.Company.name+'<div class="cost">'+targets.Company.cost+'</div></div><div class="menuitem" id="Bank">'+targets.Bank.name+'<div class="cost">'+targets.Bank.cost+'</div></div><div class="menuitem" id="State">'+targets.State.name+'<div class="cost">'+targets.State.cost+'</div></div><div class="menuitem" id="World">'+targets.World.name+'<div class="cost">'+targets.World.cost+'</div></div>'); //aktualizace menu
					targetsfunction();				
				} else {alert(message.funds);} //málo peněz
			});
			$('#World').click(function() {
				if (targets.World.cost == 'BOUGHT') {alert(message.already);} //je koupeno?
				else if (stat.money >= targets.World.cost) {
					alert(message.bought);
					stat.money = parseInt(stat.money) - targets.World.cost;	//odečtení peněz
					$('#money').text(stat.money); 							//aktualizování peněz
					targets.World.cost = 'BOUGHT'; 							//nastavení stavu na koupeno
					menureload(); 											//znovunačtení cen
					stat.mps = targets.World.mps; 
					stat.progress = targets.World.progress; 							//aktualizace přidávání peněz
					$('#targetdiv').html('<img src="img/targets/World.png" id="target">') //načtení obrázku
					Target();
					menu.targets = '<div class="menuitem" id="MP3">'+targets.MP3.name+'<div class="cost">'+targets.MP3.cost+'</div></div><div class="menuitem" id="OldPC">'+targets.OldPC.name+'<div class="cost">'+targets.OldPC.cost+'</div></div><div class="menuitem" id="Mobile">'+targets.Mobile.name+'<div class="cost">'+targets.Mobile.cost+'</div></div><div class="menuitem" id="NB">'+targets.NB.name+'<div class="cost">'+targets.NB.cost+'</div></div><div class="menuitem" id="PC">'+targets.PC.name+'<div class="cost">'+targets.PC.cost+'</div></div><div class="menuitem" id="Server">'+targets.Server.name+'<div class="cost">'+targets.Server.cost+'</div></div><div class="menuitem" id="Company">'+targets.Company.name+'<div class="cost">'+targets.Company.cost+'</div></div><div class="menuitem" id="Bank">'+targets.Bank.name+'<div class="cost">'+targets.Bank.cost+'</div></div><div class="menuitem" id="State">'+targets.State.name+'<div class="cost">'+targets.State.cost+'</div></div><div class="menuitem" id="World">'+targets.World.name+'<div class="cost">'+targets.World.cost+'</div></div>'; //aktualizace menu
					$('#shop').html('<div class="menuitem" id="MP3">'+targets.MP3.name+'<div class="cost">'+targets.MP3.cost+'</div></div><div class="menuitem" id="OldPC">'+targets.OldPC.name+'<div class="cost">'+targets.OldPC.cost+'</div></div><div class="menuitem" id="Mobile">'+targets.Mobile.name+'<div class="cost">'+targets.Mobile.cost+'</div></div><div class="menuitem" id="NB">'+targets.NB.name+'<div class="cost">'+targets.NB.cost+'</div></div><div class="menuitem" id="PC">'+targets.PC.name+'<div class="cost">'+targets.PC.cost+'</div></div><div class="menuitem" id="Server">'+targets.Server.name+'<div class="cost">'+targets.Server.cost+'</div></div><div class="menuitem" id="Company">'+targets.Company.name+'<div class="cost">'+targets.Company.cost+'</div></div><div class="menuitem" id="Bank">'+targets.Bank.name+'<div class="cost">'+targets.Bank.cost+'</div></div><div class="menuitem" id="State">'+targets.State.name+'<div class="cost">'+targets.State.cost+'</div></div><div class="menuitem" id="World">'+targets.World.name+'<div class="cost">'+targets.World.cost+'</div></div>'); //aktualizace menu
					targetsfunction();
				} else {alert(message.funds);} //málo peněz
			});
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