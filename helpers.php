<?php

/**
 * WNR Helpers - A collection of useful helper functions.
 * @subpackage PHP Helpers
 * @author Will Rosenberg <will.rosenberg@gmail.com>
 */


/**
 * echo_r - This method is equivalent to: echo "<!-- " . print_r($var,true) . " -->\n";
 * @param array $params an associative array with options to customize funciton output.
 * @return void method echoes instead of returns.
 * @todo ensure $params is an array before trying to access keys
 * @todo output multiple vars with a param flag
 */
function echo_r( $var , $params=null ) {
	// Do params
	$prepend = "";
	if (isset($params['prepend']) && !empty($params['prepend'])) {
		$prepend = $params['prepend'];
	}
	$container = ""; $container_atts = ""; $container_attr = [];
	if (isset($params['container']) && !empty($params['container'])) {
		$container = "";
		if ( isset($params['container_attr']) && is_array($params['container_attr']) ) {
			foreach ($params['container_attr'] as $k => $v) { /** @todo Handle case where $v is array / obj */
				$container_attr[] = "$k=\"$v\"";
			}
			if (sizeof($container_attr) > 0) {
				$container_atts = " " . implode(" ", $container_attr);
			}
			
		}
	}
	// Do echo
	if ($container) {
		echo "<".$container.$container_atts."><!-- " . $prepend . print_r($var,1) . " --></".$container.">\n";
	} else {
		echo "<!-- " . $prepend . print_r($var,1) . " -->\n";
	}
}