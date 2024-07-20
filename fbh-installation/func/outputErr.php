<?php 

function outputErr($text, $goto){
		?>
	<HTML>
	<HEAD>
	<TITLE> New Document </TITLE>
	</HEAD>
	<BODY onload="frmUser.submit();">
	<FORM METHOD="POST" ACTION="../install-page.php" Name="frmUser">
    	<input type="hidden" name="step" value="<?php echo $goto ?>">
    	<input type="hidden" name="err" value="<?php echo $text ?>">
	</FORM>
	</BODY>
	</HTML>
	<?php
 }
 ?>
