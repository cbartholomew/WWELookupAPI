<html>
<body>
<h1 class='header'>WWE Lookup API Documentation</h1>
<div id="conents">
<h2 class='header'>Contents</h2>
	<ul>
		<li><a href="#demo">Demo</a></li>
		<li><a href="#requirements">Requirements</a></li>
		<li><a href="#usage">Usage</a></li>
		<li><a href="#anomalies">Anomalies</a></li>
		<li><a href="#technical">Techical Details</a></li>
	</ul>
</div>
<div id="demo">
<h2 class='header'>Demo</h2>
<p>See Web/index.html</p>
</div>
<div id="requirements">
<h2 class='header'>Requirements</h2>
	<p>
		If you are accessing the API Service from its remote location (my hosted server) through the client-side scripts only, then one only needs to import the following scripts and stylesheet into one's application.
		<div style="display:block">
			&lt;!--Style Sheet--&gt;
		</div>
		<div style="display:block">
			&lt;link href="wwe-widget.css" rel="stylesheet" type="text/css" &gt;
		</div>
		<div style="display:block">
			&lt;!--Scripts--&gt;
		</div>
		<div style="display:block">
			&lt;script src="//code.jquery.com/jquery-1.11.0.min.js"&gt;&lt;/script&gt;
		</div>
		<div style="display:block">
			&lt;script src="wwe-widget.js" type="text/javascript" &gt;&lt;/script&gt;
		</div>
	</p>
</div>
<div id="usage">
<h2 class='header'>Usage</h2>
	<p>
		There are two element tags that must be used for this to work correctly: all <b>male</b> wrestler names should be surrounded by the tag of &lt;superstar&gt;&lt;superstar/&gt; and fall <b>female</b> wrestler names should be surrounded by the tag of &lt;diva&gt;&lt;diva/&gt;*. Once the API is loaded, the text where you identified a superstar or diva should be underlined.  
	</p>

	<p>
		* <i>WWE Web Developers don't appear to be the most "organized" of folks. For example, although "Lita" is considered to be a WWE Diva, she's actually listed under "superstars"; therefore, one would need to surround someone like Lita with &lt;superstar&gt;&lt;superstar/&gt; tags instead of diva tags. I have an example of this below in the <a href="#demo">demo</a></i>
	</p>
</div>

<div id="anomalies">
<h2 class='header'>Anomalies</h2>
</div>
<div id="technical">
<h2 class='header'>Techical Details</h2>
</div>
</body>
</html>