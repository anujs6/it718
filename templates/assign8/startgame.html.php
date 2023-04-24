<!DOCTYPE html>
<html>
<head>
	<title>Assign8</title>
	<meta charset="UTF-8" />
	<link rel="stylesheet" href="../../subfolder/templates.css" />
</head>
<body>
	<h1>Game of War</h1>
	<p>The deck has been shuffled and dealt, to take your first turn, press the Go! button.</p>
	<p>The computer has <strong><?php echo count($computerDeck); ?></strong> cards.</p>
	<p>You have <strong><?php echo count($playerDeck); ?></strong> cards.</p>
	<form action='./' method='post'>
		<input type='hidden' name='turn' value='true'>
		<input type='submit' value='Go!'>
	</form>
	<p><a href="./">Restart Game</a></p>
</body>
</html>