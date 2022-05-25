carrier = ['Endeavor Air Inc.','American Airlines Inc.','Alaska Airlines Inc.','JetBlue Airways','Delta Air Lines Inc.','ExpressJet Airlines Inc.','Frontier Airlines Inc.','Allegiant Air','Hawaiian Airlines Inc.','Envoy Air','Spirit Air Lines','PSA Airlines Inc.','SkyWest Airlines Inc.','United Air Lines Inc.','Southwest Airlines Co.','Mesa Airlines Inc.','Republic Airline','ExpressJet Airlines LLC'];

function lista()
{
	document.write('<ul class="menu">');
	for (i=0; i<carrier.length; i++)
	{
		document.write('<li><a onclick="window.neve='+"'"+carrier[i]+"'"+';" href="carrier.html">'+carrier[i]+'</a></li>')
	}			
	document.write('</ul>');
}
