<?php

	class FirebaseHooks {

		public static function onBeforePageDisplay(&$out, &$skin) {
			$out->addModules( 'ext.Firebase' );
			return true;
		}
 	
		public static function onParserFirstCallInit( Parser $parser ) {	        
			$parser->setHook( 'firebase', 'FirebaseHooks::wfFirebaseRender' );
			$parser->setFunctionTagHook( 'firebaseraw', 'FirebaseHooks::wfFirebaseRenderRaw', '' );
       		return true;
		}

		// raw replaces the firebase tag with plain text read from the firebase reference once
		public static function wfFirebaseRenderRaw( Parser $parser, PPFrame $frame, $input, array $args ) {	       
	    	// parse the url arg in case it is provided through templating, nested tags, etc.
	    	$parsedURL = $parser->replaceVariables( $args['url'], $frame );
			
			// convert the URL to the REST-accessable URL
			$parsedURL = str_replace(" ", "%20", $parsedURL);
			$parsedURL = $parsedURL . '.json';

			wfDebugLog( 'Firebase', 'entered raw case with url = ' .  $parsedURL);
			$firebaseGET = Http::request('GET',$parsedURL);
			wfDebugLog( 'Firebase', 'Http request returned: ' . $firebaseGET );
			if($firebaseGET) {
				$firebaseGET = str_replace('"', "", $firebaseGET);
				wfDebugLog( 'Firebase', 'Tried to remove quotes from: ' . $firebaseGET );
				return $firebaseGET;
			}
			else {
				return "ERR: Firebase query failed.";
			}
		}

		// normal rendering replaces the firebase tag with a live <span> element
		// see ext.Firebase.js for the script that makes it live
		public static function wfFirebaseRender( $input, array $args, Parser $parser, PPFrame $frame ) {	       
	    	// parse the url arg in case it is provided through templating, nested tags, etc.
	    	$parsedURL = $parser->replaceVariables( $args['url'], $frame );
	    	return "<span class='firebase' id='" . $parsedURL . "' />";
		}
	}

?>