<?php
/**
 * If a custom dashboard file exists, load that instead of the default
 * dashboard provided by Varying Vagrant Vagrants. This file should be
 * located in the `www/default/` directory.
 */
if ( file_exists( 'dashboard-custom.php' ) ) {
	include( 'dashboard-custom.php' );
	exit;
}

// Begin default dashboard.
?>
<!DOCTYPE html>
<html>
<head>
	<title>Moodle QA Dashboard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<h1>Moodle QA Environment</h1>

<ul class="nav">
	<li class="active"><a href="#">Home</a></li>
	<li><a href="database-admin/">phpMyAdmin</a></li>
	<li><a href="memcached-admin/">phpMemcachedAdmin</a></li>
	<li><a href="opcache-status/opcache.php">Opcache Status</a></li>
	<li><a href="webgrind/">Webgrind</a></li>
	<li><a href="phpinfo/">PHP Info</a></li>
</ul>

<ul class="nav">
	<li><a href="http://local.moodle.dev/">http://local.moodle.dev</a> for Moodle master (www/moodle-master)</li>
	<li><a href="http://local.moodle.qa/">http://local.moodle.qa</a> for Jenkins CI server</li>
</ul>

<p>This work is based on <a href="https://github.com/varying-vagrant-vagrants/vvv/">Varying Vagrant Vagrants</a>.</p>
</body>
</html>
