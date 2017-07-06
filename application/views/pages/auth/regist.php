<form action="/auth/regist/action" method="post">
	Account <input type="text" name="username" value="<?php echo set_value("username") ?>" autocomplete="off"/> <br>
	<?php echo form_error('username'); ?> <br>
	<?php echo isset($myError) ? $myError : ''; ?>

	Password <input type="password" name="password" value="<?php echo set_value("password") ?>"/> <br>
	<?php echo form_error('password'); ?> <br>

	Password confirm <input type="password" name="passconf" value="<?php echo set_value("passconf") ?>"/> <br>
	<?php echo form_error('passconf'); ?> <br>

	<input type="submit" value="Regist"/>

	<br>
	<button class="btn btn-sm btn-default btn-info">Facebook</button>
	<button class="btn btn-sm btn-default btn-danger">Google</button>
</form>
