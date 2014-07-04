!DOCTYPE html
html lang=fr
  head
    meta charset=utf-8
    titleMon beau sitetitle

    {{ HTMLstyle('httpfonts.googleapis.comcssfamily=Andada') }}
    {{ HTMLstyle('assetscssbootstrap.min.css') }}

	style
	  .center {text-align center; margin-left auto; margin-right auto; margin-bottom auto; margin-top auto;}
	style

  head

  body

	titleErreur 403title
	body
	  div class=hero-unit center
	  	hr
	    h1Page interdite smallfont face=Tahoma color=redErreur 403fontsmallh1
	    br
	    pLa page que vous demandez est protégée, vous ne disposez pas des droits suffisants pour la consulter.p
	    pUtilisez votre bouton de navigation pour retrouver la page où vous étiez précédemment.p
	    pbVous pouvez aussi juste cliquer sur ce petit bouton bp
	    hr
	    a href={{ url() }} class=btn btn-large btn-infoi class=icon-home icon-whitei Chemin vers l'accueila
	  	hr
	  div
  body
html  