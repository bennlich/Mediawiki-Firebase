<?php
/**
 * Firebase - this extension allows wiki pages to read live data from Firebase references
 *
 * To activate this extension, add the following into your LocalSettings.php file:
 * require_once('$IP/extensions/Firebase.php');
 *
 * See www.firebase.com for information about how to setup a Firebase account.
 * 
 * This extension is not affiliated with the developers of Firebase.
 */

// Setup
$wgExtensionCredits['parserhook'][] = array(
        'path'           => __FILE__,
        'name'           => 'Firebase',
        'version'        => '1.0',
        'author'         => 'Benny Lichtner', 
        'url'            => 'https://www.mediawiki.org/wiki/Extension:Firebase',
        'descriptionmsg' => 'firebase-desc',
        'description'    => 'This extension allows wiki pages to read live data from Firebase references'
);

// Autoloading
$dir = dirname( __FILE__ ) . '/';
$wgAutoloadClasses['FirebaseHooks'] = $dir . 'Firebase.hooks.php';

// Internationalisation
$wgExtensionMessagesFiles['Firebase'] = $dir . 'Firebase.i18n.php';

// Hooks
$wgHooks['BeforePageDisplay'][] = 'FirebaseHooks::onBeforePageDisplay';
$wgHooks['ParserFirstCallInit'][] = 'FirebaseHooks::onParserFirstCallInit';
$wgHooks['ParserBeforeStrip'][] = 'FirebaseHooks::onParserBeforeStrip';

// Modules
$wgResourceModules['ext.Firebase'] = array(
        'scripts' => 'modules/ext.Firebase.js',
        'styles' => 'modules/ext.Firebase.css',
        'localBasePath' => dirname( __FILE__ ),
        'remoteExtPath' => 'Firebase',
);

?>