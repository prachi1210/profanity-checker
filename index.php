<?php

	require_once 'inc/connection.inc.php';
	
	if(!isset($_POST['sentence']))
		header("Location : index.php");
	else 
	{
		$sentence= $_POST['sentence'];	
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
<html>
	<div class="container">
	    <table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#cccccc">
	        <tr>
	            <form method="POST" >
	                <td>
	                    <table width="100%" border="0"  cellspacing="1" bgcolor="#ffffff">
	                        <tr>
	                            <td colspan="3"><strong><center>Enter sentence to check</cemter></strong></td>
	                        </tr>
	                        <tr>
	                            <td width="78">Sentence</td>
	                            <td width="6">:</td>
	                            <td width="3000"><input name="sentence" type="text" id="Sentence"></td>
	                        </tr>
	                        <tr></tr>
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
</html>

	
