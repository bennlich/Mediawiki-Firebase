Mediawiki-Firebase
==================

Allows wiki pages to display live data from Firebase references.

Install by adding the following to LocalSettings.php:

	require_once( "$IP/extensions/myextension/myextension.php" );
	
In the mediawiki page editor, all instances of `<firebase url="gamma.firebase.com/myfirebase/" />` will be replaced by a `<span></span>` element that fills itself with live data from the provided Firebase URL.

See www.firebase.com for more information on how to set up a Firebase reference.

This extension is not affiliated with the developers of Firebase.