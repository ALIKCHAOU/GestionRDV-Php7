<header>
<link rel = "stylesheet"   type = "text/css"   href = "header.css" />
</header>
<div class='headercontainer'>
<div class='top'>

<center><h1>Application Pour Cabinet Médical bienvenue</h1></center>

</div>
<div class='topsocial'>
 <div class='toptext'><h2 id="jour"></h2> </div>
 <div class='topfb'><a href='#' target="_blank" ><img src='http://www.ongregardfraternel.org/wp-content/uploads/2018/05/icone-facebook.jpg'  alt='FB'style=" width: 50px; height: 50px;" ></a>
</div>
</div>

</div>
<body onload="myFunction()">
	
	
	<script>
	function myFunction() {
		var jour=document.getElementById('jour');
		var d = new Date();
		console.log(d);

		if((d.getDay()==0)||(d.getDay()==6)){
			jour.innerHTML="Cabinet  Fermé aujourd'hui";
		}
		else if(d.getDay()==5)
		{ jour.innerHTML="Heures d’ouverture :08h00 à 12h00 - 14h00 à  18h00";}
		else{
		  
		  jour.innerHTML="Heures d’ouverture :08h00  à 12h00 - 14h00 à  18h00 ";
		
		}

		if(d.getMounth()==0){ //janvier
			if((d.getDate()==1)){
				jour.innerHTML="jour Férié: nouvel an";

			}else if(d.getDate()==14){
				jour.innerHTML="jour Férié: anniversaire de la révolution tunisienne ";
			}
		}else if(d.getMounth()==2){//mars
			if((d.getDate()==20)){
				jour.innerHTML="jour Férié: Fête de l'indépendance de la Tunisie";

			}
		}else if(d.getMounth()==3){//avril
			if((d.getDate()==9)){
				jour.innerHTML="jour Férié: jour des Martyrs";

			}
		}else if(d.getMounth()==4){//mai
			if((d.getDate()==1)){
				jour.innerHTML="jour Férié: Fête du travail";

			}
		}else if(d.getMounth()==6){//juilliet
			if((d.getDate()==25)){
				jour.innerHTML="jour Férié: Fête de la Republique";

			}
		}else if(d.getMounth()==7){//aout
			if((d.getDate()==13)){
				jour.innerHTML="jour Férié: Fête de la femme";

			}
		}else if(d.getMounth()==9){//octobre
			if((d.getDate()==15)){
				jour.innerHTML="jour Férié: Fête de l'evacuation";

			}
		}
		
	 
	}
	</script>
	</body>
	</html>	