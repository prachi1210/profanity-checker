<?php

	require_once 'inc/connection.inc.php';
	require_once 'inc/function.inc.php';
	include 'inc/layout/header.inc.php';
    include 'inc/layout/navbar.inc.php';
    error_reporting(E_ERROR);
	if(isset($_FILES['file']))
	{
		$errors= "";
	  	$error_trigger = 0;
	  	$file_name = $_FILES['file']['name'];
	  	$file_tmp =$_FILES['file']['tmp_name'];

	  	if($_FILES["file"]["type"] !== "text/plain")
	  	{
	    	$errors ="<p style=\"width:100%;height:30px;text-align:center\">Upload another file, extension not allowed.</p>";
	  	}

	  	if(empty($errors)==true)
	  	{
	    	$filepath = "uploaded_file/" . $file_name;
	    	move_uploaded_file($file_tmp,$filepath );
	    	$sentence=readfile($filepath);
	    	echo $sentence;
	  	} 
	}

	if(!isset($_POST['sentence']) && !isset($_POST['checktype']))
		header("Location : index.php");
	else 
	{
		$sentence= $_POST['sentence'];
		$check = $_POST['checktype'];

		if($check=="createcustom") //Just entering into database
		{
			$list= $_POST['list'];
			$list = preg_replace("/[^a-zA-Z 0-9]+/", " ", $list);
			$list_split =explode(" ", $list);

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
			$url="http://www.wdylike.appspot.com/?q=".urlencode($sentence);
			$res = get_curl($url);
			if($res=="false")
				echo "Good to go!";
			else
				echo "Oops. Seems like you used a bad word";
		}
		else if($check =="rmselect") //just check for selected words
		{
			$list= $_POST['list'];
			$list = preg_replace("/[^a-zA-Z 0-9]+/", " ", $list);
			$list_split =explode(" ", $list);
			
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
<div class="container">
	<table width="800" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#cccccc">
	    <tr>
	        <form method="POST" enctype="multipart/form-data">
	            <td>
	                <table width="100%" border="0"  cellspacing="1" bgcolor="#ffffff">
	                	<tr>
	                        <td colspan="3"><strong><center>Enter file to upload</center></strong></td>
	                    </tr>
	                    <tr>
	                    	<td colspan="3"><center><input type="file" name="file"></center></td>
	                    </tr>
	                    <tr>
	                    	<td colspan="3"><center>Or</center></td>
	                	</tr>
	                    <tr>
	                        <td colspan="3"><strong><center>Enter text input to check</center></strong></td>
	                    </tr>
	            		<tr>
	                    	<td width="78">Text input</td>
	                        <td width="6">:</td>
	                        <td width="500" ><textarea name="sentence" cols="50" rows="5"></textarea></td>
	                    </tr>
	                    <tr></tr>
	                    <tr>
	                       	<td colspan="6"><label><input type="checkbox" name="checktype" value="standard">Standard check</label><br></td>
	                    </tr>
 	                    <tr>
	                        <td colspan="6"><label><input type="checkbox" name="checktype" value="createcustom">Create Custom check</label><br></td>
	                    </tr>
	                    <tr>
	                        <td colspan="6"><label><input type="checkbox" name="checktype" value="rmselect">Selective removal</label><br></td>
	                    </tr>
	                     <tr>
	                        <td width="78">Custom list</td>
	                        <td width="6">:</td>
	                        <td colspan="6"><textarea name="list" cols="50" rows="2"></textarea></td>
	                    </tr>			
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td><input type="submit" name="Submit" value="GO"></td>
                         </tr>
                    </table>            
                </td>
            </form>
        </tr>
    </table>
</div>
<hr>

<?php include 'inc/layout/footer.inc.php';?>