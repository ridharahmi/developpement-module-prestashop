
{if $submit_form  && $submit_form}
 <p style="color:#4CAF50;">
 	Where Request is Succees !
 </p>
 {else}
  <p style="color:red;">
 	Where Request is Error !
 </p>
{/if}

<form method="post">
	Title Module :
	<input type="text" name="titlemodule">
	Body Module :
	<textarea name="bodymodule" rows="12"></textarea>
	<br>
	<input type="submit"  value="save">
</form>