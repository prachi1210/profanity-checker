<?php

	require_once 'inc/connection.inc.php';
	require_once 'inc/function.inc.php';
	
	if(!isset($_POST['sentence']) && !isset($_POST['checktype']))
		header("Location : index.php");
	else 
	{
		$sentence= $_POST['sentence'];
		$check = $_POST['checktype'];
		
		if($check=="standard")
		{
			$url="http://www.wdylike.appspot.com/?q=".$sentence;
			$res = get_curl($url);
			if($res=="false")
				echo "Good to go!";
			else
				echo "Oops. Seems like you used a bad word";
		}
		else if($check =="custom")
		{
			$list= $_POST['list'];
			$list = preg_replace("/[^a-zA-Z 0-9]+/", " ", $list);
			$list_split =explode(" ", $list);
			print_r($list_split);
			foreach ($list_split as $key => $word) 
			{
				$q1 = "SELECT * FROM `words` WHERE `word`='$word'";

				if($query_run = mysqli_query($connection,$q1))
				{

					if(mysqli_num_rows($query_run) == 1 )
					{	
						//Word already in list. Do nothing
					}
					else
					{
						$q2= "INSERT INTO `words` (`word`) VALUES ('$word')";
						mysqli_query($connection,$q2);
					}
						
				}
			}
			$sentence = preg_replace("/[^a-zA-Z 0-9]+/", " ", $sentence);
			$sent_split = explode(" ", $sentence);

			//if (in_array($key, $sent_split))
			{
			  //  echo "Word found";
			}
			//else
			{
			  //  echo "Word not found";
			}
		}		
	}
?>