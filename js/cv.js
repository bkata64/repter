var suli = [['Szociális gondozó-ápoló', '2012-2014 SZEFI', 'Szentes'],
	['Gyermek- és ifjúsági felügyelő', '2012-2013 SZEFI', 'Szentes'],
	['Nevelőszülő', '2009 FIKSZ-képzés', 'Szeged'],
	['Mérlegképes könyvelő', '2001-2002 IQSTAR Oktatási Centrum', 'Budapest'],
	['Képesített könyvelő, vállalati tervező és statisztikus', '1997-1999 Boros Sámuel Humán és Közgazdasági SZKI', 'Szentes'],
	['Számítógép programozó', '1986-1989 SZÁMALK Számítástechnikai Oktató Központ', 'Szeged'],	
	['Nyomdai fénymásoló', '1979-1983	Tevan Andor Nyomdaipari SZKI', 'Békéscsaba']];
	
var mk = [['Szakoktató','Gyulai SZC SZESZI','Szeghalom'],	
	['Kísérő-támogató, gondozó', '2016-2018	Aranysziget Otthon, Gesztenyeliget Otthon', 'Nagymágocs'],
	['Nevelőszülő', '2014-2018 KLIK', 'Nagymágocs'],
	['Gyermek- és ifjúsági felügyelő', '2013-2014 Rigó Alajos Gyermekotthon', 'Szentes'],
	['Könyvelő', '2006-2013 Pataki Margó Kft.', 'Szentes'],
	['Megbízás alapján alap-és középfokú OKJ-s számítástechnikai tanfolyamokon  oktató', '2001-2005 Talentum Kft.', 'Budapest'],
	['Adóügyi előadó', '1999-2000 Egyesült Mgtsz.', 'Nagymágocs'],
	['Számítógép programozó, számítógépes szoftverüzemeltető', '1985-1995 Üvegip.Művek, Pannonglas Ip.Rt. Orosházi Üveggyár', 'Orosháza'],
	['Nyomdai fénymásoló', '1983-1985 Üvegip.Művek, Pannonglas Ip.Rt. Orosházi Üveggyár', 'Orosháza']];

function tablazat(szoveg,tomb)
{		
	document.write('<table class="tabla">');	
	for(i=0; i<tomb.length; i++)
	{
		document.write('<tr>');
		if (i==0) document.write('<td class="elso">' + szoveg + '</td>');
		else document.write('<td></td>');
		document.write('<td class="szakma">');
		document.write('<p>'+ tomb[i][0]+'</p>');
		document.write('<p>'+ tomb[i][1]+'</p></td>');
		document.write('<td>'+ tomb[i][2]+'</td>');
		document.write('</tr>');		
	}
	document.write('</table>');	
}