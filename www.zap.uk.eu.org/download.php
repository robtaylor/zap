<?php
  // $Id: download.php,v 1.5 2002-02-01 13:40:31 james Exp $
  include ".php/zap-std.inc";
  setroot ('download');
  zap_header ("Zap download page", 'up:/', 'next:mirrors:mirrors');
  zap_body_start ();
?>

<h1>Download area</h1>

<p>The current stable release is <a href="#140">v1.40</a>. An older stable release which might still be useful for some people is <a href="#135">v1.35</a>. The current beta release is <a href="#144">v1.44</a>.</p>

<p>Zap distribution sets are made as 'zipchives' - Zip-format archives, compatible with the free <a href="http://www.cdrom.com/pub/infozip/">InfoZip</a> program (which is available for most operating systems, including RISC OS) and David Pilling's SparkFS. If you don't have either of these, download <a href="http://zap.tartarus.org/ftp/pub/sparkplug.basic.bin">sparkplug.basic.bin</a>, set its type to BASIC and run it - it self-extracts into a copy of SparkPlug into the current directory, which will also read zip archives.</p>

<p>If you need to report a bug, or want to suggest a new feature, please check the <a href="contact">contacts page</a> for the appropriate email address. You should also try to make sure that the bug/feature hasn't already been reported/proposed (the buglist is currently available via the <a href="cvs/">CVS repository</a>, and in recent beta releases).</p>

<p>The official Zap distribution site is <a href="/ftp/pub/">http://zap.tartarus.org/ftp/pub/</a> (also available as <a href="ftp://zap.tartarus.org/pub/">ftp://zap.tartarus.org/pub/</a>). There are currently no mirrors (anyone interested, please <a href="mailto:webmaster@zap.tartarus.org">get in touch</a>).</p>

<ul>
 <li><a href="#144">v1.44</a> - beta phase prior to v1.45
 <li><a href="#140">v1.40</a> - released 26th October, 1998
 <li><a href="#135">v1.35</a> - released 6th November, 1996
 <li><a href="#130">v1.30</a> - released 20th June, 1995
 <li><a href="#old">v1.20</a> - released 25th October, 1994
 <li><a href="#old">v1.10</a> - released 24th March, 1994
 <li>v1.00 - released 22nd October, 1993
 <li>v0.90 - released 25th May, 1993
 <li>v0.80 - released 17th January, 1993
 <li><a href="#old">v0.70</a> - released 29th September, 1992
</ul>

<ul>
 <li><a href="#useful">Useful utils</a> - various things by other people that nestle nicely with Zap
 <li><a class="dir" href="/ftp/pub/configs/">Alternate configs</a>
</ul>

Development release sites
<uL>
 <li><a class="dir" href="/ftp/pub/ds/">Darren Salt</a>
 <li><a class="dir" href="/ftp/pub/james/">James Aylett</a>
</ul>

<hr>

<h2><a name="144">v1.44</a></H2>
<?php
  $release='1.44';
  $beta=9;
  $betadir='test9';

  function href ($leaf)
  {
    global $release, $betadir;
    echo (func_num_args () > 1 ? '<a '.func_get_arg (1) : '<a'),
	 ' href="/ftp/pub/', $release, '/', $betadir, '/', $leaf, '">';
  }
?>
<p>Version 1.44 of Zap is a public beta phase. We believe it to be fairly stable, and are currently working on getting remaining important bugs fixed prior to a stable release. The current release is beta <?php echo $beta; ?>. Grab one of the core archives, plus extensions as required. A minimal ZapFonts is supplied in the core archives; the full one contains many more fonts.</p>

<p>To decide what you need to download, please consult the <? href ('.message', 'class="file"'); ?>list of which extensions are in which group</a>. Alternatively, you can download them <? href ('individual_modes', 'class="dir"'); ?>individually</a>.</p>

<ul>
<?php
  function zapfile ($url, $label, $contact, $sig)
  {
    global $ftproot;
    $li = (substr ($label, 0, 1) != '~');
    if (!$li)
      $label = substr ($label, 1);
    $stat = @stat ($ftproot.$url);
    if (false === $stat)
      echo '<li><span class="file">', $label, '</span> &nbsp;[missing!] ';
    else
      echo '<li><a class="file" href="/ftp/pub/', $url, '">', $label, '</a> ';
    if ($contact > '')
      echo '(<a href="contact#', $contact, '">', $contact, '</a>) &nbsp;';
    if (false !== $stat)
    {
      if ($stat[7] > 4095)
        echo '[', round ($stat[7] / 1024, 1), ' Kbytes] ';
      else
        echo '[', $stat[7], ' bytes] ';
    }
    if ($sig > '')
    {
      if (false === $stat)
        echo '<span class="sig">(detached ', $sig, ' signature)</span> ';
      else
        echo '<span class="sig">(<a href="/ftp/pub/', ereg_replace ('\.[^\./]+$', '.asc', $url), '">detached ', $sig, ' signature</a>)</span> ';
    }
    print func_num_args () > 4 ? func_get_arg (4) : "</li>\n";
  }

  function zapdir ($url, $label)
  {
    echo '<li><a class="dir" href="/ftp/pub/', $url, '/">', $label, "</a></li>\n";
  }

  zapfile ($release.'/'.$betadir.'/zap.zip', 'Core', 'sja', '');
  zapfile ($release.'/'.$betadir.'/intl.zip', 'Core - international edition', 'sja', '');
  zapfile ($release.'/'.$betadir.'/devel.zip', 'Core - developers\' edition', 'sja', '');
  zapfile ($release.'/'.$betadir.'/mainmods.zip', 'Main modules group', 'sja', '');
  zapfile ($release.'/'.$betadir.'/develmods.zip', 'Devel modules group', 'sja', '');
  zapfile ($release.'/'.$betadir.'/devel+mods.zip', 'Second devel modules group', 'sja', '');
  zapfile ($release.'/'.$betadir.'/riscosmods.zip', 'RISC OS modules group', 'sja', '');
  zapfile ($release.'/'.$betadir.'/webmods.zip', 'Web modules group', 'sja', '');
  zapfile ($release.'/'.$betadir.'/descmods.zip', 'Desc modules group', 'sja', '');
  zapfile ($release.'/'.$betadir.'/zapfonts.zip', 'ZapFonts', 'sja', '');
  zapdir ($release.'/'.$betadir.'/updates', 'Updates from previous beta releases');
  zapdir ($release.'/'.$betadir, 'Directory');
  zapdir ($release, 'Previous beta releases and other related archives');
?>
</ul>

<hr>

<h2><a name="140">v1.40</a></h2>

<p>Where the extension or distribution set is being maintained by one of the Zap developers, their initials are given in brackets, with a link to contact  details. Otherwise, the name of the extension's author is given, with a link to contact details (if known). There is a <a href="documentation/faq">list of frequently asked questions</a>, and their answers.</p>

<p>Version 1.40 is currently at patch 9; this contains several minor bugfixes and performance improvements. A <a href="documentation/patches">list of changes</a> for the patches is available.</p>

<h3>Core distribution (required)</h3>

<ul>
<?php
  zapfile ('1.40/zap.zip', 'Core (patch 9)', 'ds', '');
  zapfile ('1.40/core.zip', 'Update from v1.40 initial release to patch-9', '', '');
  zapfile ('1.40/core.zip', 'Update from v1.40 initial release to patch-9', '', '');
  zapdir ('1.40', 'Directory');
?>
</ul>

<h3>Central extensions (suggested)</h3>

<ul>
<?php
  zapfile ('1.40/zfonts.zip', 'ZapFonts', 'sja', '');
  zapfile ('1.40/zmods1.zip', '~Extension modules group 1', 'ds', '', "<br>This archive contains:\n");
?>
  <ul>
   <li>Programming modes: C, C++, Java, Assembler, Pascal, BASIC, Obey, MessageTrans, FrontEnd Desc, SAsm, Perl, StrongHelp, BasAsm</li>
   <li>TaskWindow mode</li>
   <li>Email and mailbox modes</li>
   <li>Two HTML modes</li>
   <li>Editing mode for Zap's configuration files</li>
   <li>TeX and LaTeX editing mode</li>
  </ul>
  <ul>
   <li>Zap's spelling system</li>
   <li>Support for toolbars</li>
   <li>Several command extensions</li>
  </ul>
 </li>
</ul>

<h3>Additional extensions</h3>

<ul>
<?php
  zapfile ('1.40/zmods2.zip', '~Extension modules group 2', 'tmt', '', "<br>This archive contains:\n");
?>
  <ul>
   <li>Programming modes: Makefile, Ada, Asm, PostScript, Inform
   <li>CSV file mode
   <li>SQL and Scheme document modes
   <li>Primitive manpage viewer
  </ul>
 </li>
<?php
  zapfile ('1.40/zapres.zip', 'Additional resources', 'tmt', '');
?>
</ul>

<h3>Extension updates</h3>

<ul>
<?php
  zapfile ('1.40/zmods1_update.zip', 'Update from initial release to current extension modules group 1', '', '');
  zapfile ('1.40/zapconfig.zip', 'ZapConfig', 'sja', '');
  zapfile ('1.40/ZapEmail.zip', 'ZapEmail', 'ds', 'PGP');
?>
</ul>

<h3>Source</h3>

<ul>
<?php
  zapfile ('1.40/src/src-140-8.zip', 'Core (patch 8)', 'sja', '');
  zapfile ('1.40/src/zrdsrc.zip', 'ZapRedraw', 'ds', '');
  zapfile ('1.40/src/zbsrc.zip', 'ZapBASIC', 'tmt', '');
  zapfile ('1.40/src/tmtsrc.zip', 'Tim\'s modes', 'tmt', '');
  zapfile ('1.40/src/mjesrc.zip', 'ZapMJE', 'tmt', '');
  zapfile ('1.40/src/ZEmailSrc.zip', 'ZapEmail', 'ds', 'PGP');
  zapfile ('1.40/src/extssrc.zip', 'Combined command extensions', 'sja', '');
  zapdir ('1.40/src', 'Directory');
?>
</ul>

<hr>

<h2><a name="useful">Useful utils</a></h2>

<p>Note that these are written and maintained by other people; we can't guarantee they'll work properly, and please don't send us bug reports! Let us know if any of the links are out of date, though...</p>

<ul>
 <li><a href="http://sudden.recoil.org/stronghelp/">StrongHelp</a> - a hypertext help system by Guttorm Vik; invaluable if you're programming under RISC OS</li>
 <li><a href="http://www.muscat.com/~olly/software/">Line Editor</a> by Olly Betts - makes the command line and taskwindows much nicer to use (this is also bundled with Zap) (see also <a href="http://www.youmustbejoking.demon.co.uk/progs.utils#lineeditor">here</a>)</li>
</ul>

<hr>

<h2><a name="135">v1.35</a></h2>

<p>v1.35 is believed to be the last version of Zap to support RISC OS 2.</p>

<h3>Core distribution (required)</h3>

<ul>
<?php
  zapfile ('1.35/zap.zip', 'Core', '', '');
  zapdir ('1.35', 'Directory');
?>
</ul>

<h3>Updates to versions in the core distribution</h3>

<ul>
<?php
  zapfile ('1.35/zapconfig.zip', 'ZapConfig', '', '');
  zapfile ('1.35/zapds.zip', 'ZapDS', '', '');
  zapfile ('1.35/zapemail.zip', 'ZapEmail', '', '');
  zapfile ('1.35/zapenh.zip', 'ZapENH', '', '');
  zapfile ('1.35/zapextern.arc', 'ZapExtern', '', '');
  zapfile ('1.35/zapole.zip', 'ZapOLE', '', '');
?>
</ul>

<hr>

<h2><a name="old">Ancient versions</a></h2>

<ul>
<?php
  zapfile ('1.30/zap.zip', 'v1.30 core', '', '');
  zapfile ('1.30/wagenaar.zip', 'SoftWrap and DWExt updates for v1.30', '', '');
?>
</ul>

<ul>
<?php
  zapfile ('1.20/zap.arc', 'v1.20', '', '');
  zapfile ('1.10/zap.zip', 'v1.10', '', '');
  zapfile ('0.70/zap.zip', 'v0.70', '', '');
?>
</ul>

<?php
  zap_body_end ('$Date: 2002-02-01 13:40:31 $');
?>
