<?php 


class tokendownloader {


	/**
	* __construct to start session
	*/
	public function __construct() {
		//start session if not started already
		if (session_status() == PHP_SESSION_NONE) session_start();
	}

	/**
	* @param $file : file to download
	*/
	public function download($file="") {


		if (!$this->hasToken($file)) return false;

		//has token procced to download.
	    header('Content-Description: File Transfer');
	    header('Content-Type: application/octet-stream');
	    header('Content-Disposition: attachment; filename="'.basename($file).'"');
	    header('Expires: 0');
	    header('Cache-Control: must-revalidate');
	    header('Pragma: public');
	    header('Content-Length: ' . filesize($file));
	    readfile($file);


	    exit;

	}

	/**
	* @param $file : file to download
	*/
	public function setToken($file="") {
		$_SESSION['tokendownloader'][] = $file;
	}


	/**
	* @param $file : file to download
	*/
	public function hasToken($file="") {
		if (!isset($_SESSION['tokendownloader'])) return false;

		foreach ($_SESSION['tokendownloader'] as $tok) {
			if ($tok == $file) return true; 
		} 
		return false;
	}


}