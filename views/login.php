<form action="./index.php" method="POST">

	<label>Login</label>
	<input type="text" name="login"/>
	<br>
	<label>Mot de passe</label>
	<input type="text" name="pwd"/>
	<br>
	<input type="submit" value="Connexion"/>
	<label><?php if(isset($message)) echo $message ?></label>
	<input type="hidden" name="action" value="verifLogin"/>
<<<<<<< HEAD
	<input type="hidden" name="grade" value=<?php echo $user->getGrade() ?>/>
=======
	<input type="hidden" name="grade" value="<?php echo $client->getGrade() ?>"/>
>>>>>>> 24c57654281324492619360878e9f81db451db45
</form>
