<?php

	require_once 'inc/connection.inc.php';
	require_once 'inc/function.inc.php';
	
	if(!isset($_POST['sentence']) && !isset($_POST['checktype']))
		header("Location : index.php");
	else 
	{
		$sentence= $_POST['sentence'];
		$check = $_POST['checktype'];

		if($check=="createcustom") //Just entering into database
		{
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
		}
		
		//Checking 
		if($check=="standard") //standard check WDYL 
		{
			$url="http://www.wdylike.appspot.com/?q=".$sentence;
			$res = get_curl($url);
			if($res=="false")
				echo "Good to go!";
			else
				echo "Oops. Seems like you used a bad word";
		}
		else if($check =="rmselect") //just check for selected words
		{
			$list= $_POST['list'];
			$list_split =explode(" ", $list);
			print_r($list_split);
			$sentence = preg_replace("/[^a-zA-Z 0-9]+/", " ", $sentence);
			$sent_split = explode(" ", $sentence);
			foreach($list_split as $key => $word)
			{
				if (in_array($word, $sent_split))
				{
				   echo "Oops. Seems like you used a bad word";
				}
				else
				{
				   echo "Good to go!";
				}
			}
		}
		else if($check =="createcustom") //read from database
		{
			$sentence = preg_replace("/[^a-zA-Z 0-9]+/", " ", $sentence);
			$sent_split = explode(" ", $sentence);
			$flag=0; //to keep track if a bad word occured
			foreach($sent_split as $key => $word)
			{
				$q3 = "SELECT * FROM `words` WHERE `word`='$word'";

				if($query_run = mysqli_query($connection,$q3))
				{

					if(mysqli_num_rows($query_run) == 1 )
					{	
						echo "Oops. Seems like you used a bad word";
						$flag=1;
						break;
					}
					else
					{
						//Do nothing	
					}		
				}
			}
			if ($flag==0)
				echo "Good to go!";
		}			
	}
?>