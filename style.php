<?
header("Content-type: text/css");
/*
	if(file_exists("./stylesheet.dat")) {
	  $handle=fopen("./stylesheet.dat","r");
	  $myStyleEncoded="";
  	  while(!feof($handle)) {
		 $myStyleEncoded.=fgets($handle,2048);
	  }
	  fclose($handle);
   	}
	if($myStyleEncoded!="") $myStyle=unserialize($myStyleEncoded);
	unset($myStyleEncoded); */
?>

#SnX-Guestbook {
	width: 75%;
	margin-left: auto;
	margin-right: auto;
}

#SnX-Guestbook p {
	background-color: #FEFFFA;
	color: #000000;
	font-family: verdana;
	font-size: 10pt;
}

#SnX-Guestbook p.GB_title {
	font-weight: bold;
	padding-top: 20px;
	padding-left: 10px;
	font-style: underline;
	text-decoration: underline;
}

#SnX-Guestbook p.GB_name {
	padding-left: 30px;
	float: left;
	font-style: italic;
}

#SnX-Guestbook p.GB_separator span {
	display: none;
}

#SnX-Guestbook p.GB_separator {
	background-color: #000000;
	height: 1px;
}


#SnX-Guestbook p.GB_city_separator {
	float: left;
}

#SnX-Guestbook p.GB_city {
	float: left; 
}

#SnX-Guestbook p.GB_country_delimiter_left {
	float: left
}

#SnX-Guestbook p.GB_country  {
	float: left
}

#SnX-Guestbook p.GB_country_delimiter_right {
}

#SnX-Guestbook p.GB_date {
	padding-left: 30px;
}

#SnX-Guestbook p.GB_email_title {
	float: left;
	padding-left: 30px;	
}

#SnX-Guestbook p.GB_homepage_title {
	float: left;
	padding-left: 30px;
}

#SnX-Guestbook p.GB_message {
	padding-top: 15px;
	padding-left: 50px;
}

#SnX-Guestbook p.GB_ip {
	text-align: right;
	padding-right: 10px;
	padding-bottom: 20px;
}

#SnX-Guestbook p.GB_nav {
	text-align: right;
	padding-bottom: 10px;
}

#SnX-Guestbook p.GB_view {
	text-align: right;
	padding-right: 10px;
	padding-bottom: 10px;
	height: 42px;
}

#SnX-Guestbook p.GB_sign {
	text-align: left;
	float: left;
	padding-left: 10px;
	padding-bottom: 10px;
}

#SnX-Guestbook h1, #SnX-Guestbook h2, #SnX-Guestbook h3, #SnX-Guestbook p {
  margin:0;
  background-repeat:no-repeat;
  background-position:left top;
}

#SnX-Guestbook h3.SnX_GB_title {
	text-align: center;
	background:url("images/spirales.gif");
    padding-top: 45px;
	font-family: verdana;
	font-weight: bold;
	font-size: 12pt;
	color: #000000;
}

#SnX_GB_block {
	margin-left: auto;
	margin-right: auto;
	width: 90%;
	background-color: #FEFFFA;
	color: #000000;
}

#SnX_GB_block h3.SnX_GB_title {
	background:url("images/spirales_mini.gif");
	font-weight: bold;
	text-align: center;
	padding-top: 10px;
}

#SnX_GB_block p.SnX_GB_comment {
	padding-left: 3px;
	padding-right: 3px;
}

#SnX_GB_block p.SnX_GB_from {
	font-weight: bold;
	text-align: right;
	padding-right: 3px;
}