
<html>
	<div class="container">
	    <table width="500" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#cccccc">
	        <tr>
	            <form method="POST" action="check.php" >
	                <td>
	                    <table width="100%" border="0"  cellspacing="1" bgcolor="#ffffff">
	                        <tr>
	                            <td colspan="3"><strong><center>Enter text input to check</cemter></strong></td>
	                        </tr>
	                        <tr>
	                            <td width="78">Text input</td>
	                            <td width="6">:</td>
	                            <td width="500" ><textarea name="sentence" cols="50" rows="10"></textarea></td>
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
</html>

	
