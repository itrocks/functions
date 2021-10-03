<?php
/**
 * @author Baptiste Pillot <baptiste@pillot.fr>
 * @copyright Copyright (c) 2021, Baptiste Pillot
 * @license https://opensource.org/licenses/LGPL-3.0 GNU Lesser General Public License version 3
 * @link https://it.rocks/reference/functions/http
 */

//-------------------------------------------------------------------------------------------- cors
function cors()
{
	static $already = false;
	if ($already) {
		return;
	}
	$already = true;
	if (isset($_SERVER['HTTP_ORIGIN'])) {
		header("Access-Control-Allow-Origin: $_SERVER[HTTP_ORIGIN]");
		header('Access-Control-Allow-Credentials: true');
		header('Access-Control-Max-Age: 86400');
	}
	if (isset($_SERVER['REQUEST_METHOD']) && ($_SERVER['REQUEST_METHOD'] == 'OPTIONS')) {
		if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'])) {
			header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
		}
		if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS'])) {
			header("Access-Control-Allow-Headers: $_SERVER[HTTP_ACCESS_CONTROL_REQUEST_HEADERS]");
		}
		exit(0);
	}
}
