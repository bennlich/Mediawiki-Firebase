Mediawiki-Firebase
==================

Allows wiki pages to display live data from Firebase references.

## Usage
	
In the mediawiki page editor, all instances of `<firebase url="gamma.firebase.com/myfirebase/" />` will be replaced by a `<span></span>` element that fills itself with live data from the provided Firebase URL.

See www.firebase.com for more information on how to set up a Firebase reference.

## Installation

Install by copying the repository contents to someplace in the extensions directory, like extensions/Firebase/. Then add the following (or equivalent) to LocalSettings.php:

        require_once( "$IP/extensions/Firebase/Firebase.php" );

In this case I've renamed the repository from "Mediawiki-Firebase" to "Firebase"
.

## Notes

This extension is not affiliated with the developers of Firebase.
