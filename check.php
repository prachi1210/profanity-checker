<?php

	require_once 'inc/connection.inc.php';
	require_once 'inc/function.inc.php';
	
	if(!isset($_POST['sentence']) && !isset($_POST['checktype']))
		header("Location : index.php");
	else 
	{
		$sentence= $_POST['sentence'];
		$check = $_POST['checktype'];
		//echo $check;
		if($check=="standard")
		{
			$url="http://www.wdylike.appspot.com/?q=".$sentence;
			$res = get_curl($url);
			if($res=="false")
				echo "Good to go!";
			else
				echo "Oops. Seems like you used a bad word";
		}
		else
		$key  = 'ho';

		$sentence = preg_replace("/[^a-zA-Z 0-9]+/", " ", $sentence);
		$sent_split = explode(" ", $sentence);

		if (in_array($key, $sent_split))
		{
		    echo "Word found";
		}
		else
		{
		    echo "Word not found";
		}
	}
?>