<?php
  // $Id: index.php,v 1.7 2004-10-27 11:35:21 james Exp $
  include ".php/zap-std.inc";
  setroot ('index');
  zap_header ("Zap - a programmers' editor", 'top:');
  zap_body_start ();
?>
<h1>Zap - a programmers' editor</h1>

<p>The latest release version of Zap is 1.45. More options, and Zap extensions, are available from the <a href="download">download page</a>. You can also access the source tree via <a href="cvs/">CVS</a>.</p>

<ul>
<?php
  function plink ($leaf)
  {
    global $ftproot;
    $link = readlink ($ftproot.$leaf);
    echo '<li>', ucfirst ($leaf), ' distribution (v', $link,
	 '): <a href="/ftp/pub/', $leaf,
	 '/">directory,</a> <a href="download#',
	 ereg_replace ('\.', '', $link), "\">downloads page</a>\n";
  }
  plink ('stable');
  plink ('alpha');
?>
 <li><a href="screenshots">Screenshots</a>
</ul>

<hr>

<p>Zap is a programmer's editor for RISC OS on Acorn and compatible computers. It has a large number of features designed to facilitate programming (particularly source code), as well as full text editing facilities. It is also highly configurable and extensible. There is a <a href="documentation/faq">list of frequently asked questions</a>, and their answers.</p>

<p>If you wish to get in touch with the Zap development team then please use the appropriate email address from the <a href="contact">contact page</a>. If you wish to get involved in the development effort, you will probably want to subscribe to one or more of the <a href="lists">mailing lists</a>. Before reporting a bug or making a suggestion, we advise checking the Changes file in the current Zap distribution to see if it has already been dealt with.</p>

<p>We hope that you find Zap to be a useful program.</p>

<hr>

<p>Anyone still using the zap.uk.eu.org domain should change to use the new <a href='http://zap.tartarus.org/'>web</a> and <a href='ftp://zap.tartarus.org/'>ftp</a> site addresses of zap.tartarus.org.</p>

<?php
  zap_body_end ('$Date: 2004-10-27 11:35:21 $');
?>
