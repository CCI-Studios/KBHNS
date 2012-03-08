<!DOCTYPE html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7 ]> <html class="no-js ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]> <html class="no-js ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]> <html class="no-js ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<?php
// get current menu name
$menu = JSite::getMenu();
if ($menu && $menu->getActive()) {
    $menu = $menu->getActive();
		$page_sfx = $menu->params->get('pageclass_sfx');
  	$menu = $menu->alias;
} else {
	$menu = "";
	$page_sfx = "";
}

if ($_SERVER['SERVER_PORT'] === 8888 ||
		$_SERVER['SERVER_ADDR'] === '127.0.0.1' ||
		stripos($_SERVER['SERVER_NAME'], 'ccistaging') !== false ||
		stripos($_SERVER['SERVER_NAME'], 'dev') === 0) {

	$testing = true;
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
} else {
	$testing = false;
}

JHtml::_('behavior.mootools');
$analytics = "UA-29722883-1";
?>
<head>
	<meta charset="utf-8" />
	<?= ($testing)? '':  '<meta http-equiv="X-UA-Compatible" contents="IE=edge,chrome=1">' ?>

 	<jdoc:include type="head" />

	<meta name="viewport" content="width=960px">
	<link rel="shortcut icon" href="/templates/<?= $this->template ?>/resources/favicon.ico">
	<link rel="apple-touch-icon" href="/templates/<?= $this->template ?>/resources/apple-touch-icon.png">

	<!-- load css -->
	<?php if ($testing): ?>
		<link rel="stylesheet" href="/templates/<?= $this->template ?>/css/template.css">
	<?php else: ?>
		<link rel="stylesheet" href="/templates/<?= $this->template ?>/css/template.min.css">
	<?php endif; ?>
	
	<script type="text/javascript" src="http://use.typekit.com/hkp7xgo.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
	<!-- load modernizer, all other at bottom -->
	<?php if ($testing): ?>
		<script src="/templates/<?= $this->template ?>/js/libs/modernizr-1.7.js"></script>
	<?php else: ?>
		<script src="/templates/<?= $this->template ?>/js/libs/modernizr-1.7.min.js"></script>
	<?php endif; ?>
</head>

<body class="<?= $menu ?>">
	<div id="header"><div class="container">
		<jdoc:include type="modules" name="header" style="rounded" />
		<div id="headerTop">
			<jdoc:include type="modules" name="headerTop" style="xhtml" />
		</div>
		<div class="clear"></div>
	</div></div>
	<div class="clear"></div>
	
	<div id="body">
		<?php if ($this->countModules('top')): ?>
		<div id="top"><div class="tab-container">
			<jdoc:include type="modules" name="top" style="xhtml" />
		</div></div>
		<?php endif; ?>
	<?php if ($page_sfx !== '_hidden'): ?>
		<div class="container">
			<div id="sidebar">
				<jdoc:include type="modules" name="sidebar" style="xhtml" />
			</div>
			<div id="content" class="<?php 
						if (!$this->countModules('sidebar')) {
							echo 'wide1';
						} else {
							echo 'wide2';
						}
				?>">
				<jdoc:include type="component" />
			</div>
		<div class="clear"></div></div>
	<?php endif; ?>
	</div>

	<div id="footer"><div class="container">
		<jdoc:include type="modules" name="footer" style="xhtml" />	
	</div></div>

	<div class="hidden">
		<jdoc:include type="modules" name="hidden" style="raw" />
	</div>

	<!-- load scripts -->
	<?php if ($testing): ?>
		<script src="/templates/<?= $this->template ?>/js/accordian.js"></script>
		<script src="/templates/<?= $this->template ?>/js/columns.js"></script>
		<script src="/templates/<?= $this->template ?>/js/dropmenu.js"></script>
		<script src="/templates/<?= $this->template ?>/js/html5.js"></script>
		<script src="/templates/<?= $this->template ?>/js/tabs.js"></script>
	<?php else: ?>
		<script>
			var _gaq=[["_setAccount","<?php echo $analytics?>"],["_trackPageview"]];
			(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
				g.src=("https:"==location.protocol?"//ssl":"//www")+".google-analytics.com/ga.js";
				s.parentNode.insertBefore(g,s)}(document,"script"));
	  	</script>
		<script src="/templates/<?= $this->template ?>/js/scripts.min.js"></script>
	<?php endif; ?>
</body>
</html>
