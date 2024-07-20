<?php 
function toStep($Num){
 if (isset($Num)) {
 	redirectToStep($Num);
 }
}
?>

<?php
function redirectToStep($Num) {
	?>
	<HTML>
	<HEAD>
	<TITLE> New Document </TITLE>
	</HEAD>
	<BODY onload="frmUser.submit();">
	<FORM METHOD="POST" ACTION="../install-page.php" Name="frmUser">
    	<input type="hidden" name="step" value="<?php echo $Num ?>">
	</FORM>
	</BODY>
	</HTML>
	<?php
}

?>
