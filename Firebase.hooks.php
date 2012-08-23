<?php

	class FirebaseHooks {

		public static function onBeforePageDisplay(&$out, &$skin) {
			$out->addModules( 'ext.Firebase' );
			return true;
		}
 
		public static function onParserFirstCallInit( Parser $parser ) {	        
			$parser->setHook( 'firebase', 'FirebaseHooks::wfFirebaseRender' );
       		return true;
		}

		public static function wfFirebaseRender( $input, array $args, Parser $parser, PPFrame $frame ) {	       
	    	// parse the url arg in case it is provided through templating, nested tags, etc.
	    	$parsedURL = $parser->replaceVariables( $args['url'], $frame );
	    	return "<span class='firebase' id='" . $parsedURL . "' />";
		}
	}

?>