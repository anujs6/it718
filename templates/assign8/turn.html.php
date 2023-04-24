<!DOCTYPE html>
<html>
<head>
	<title>Assign8</title>
	<meta charset="UTF-8" />
	<link rel="stylesheet" href="../../subfolder/templates.css" />
</head>
<body>
	<h1>Game of War</h1>
	<table>
		<tr>
			<th>Computer plays...</th>
			<th>Player plays...</th>
		</tr>
		<tr>
			<td><img src="<?php echo $computerCardFile; ?>" alt="<?php echo $computerCard; ?>" ></td>
			<td><img src="<?php echo $playerCardFile; ?>" alt="<?php echo $playerCard; ?>" ></td>
		</tr>
	</table>

	<h3><?php echo $winner ?> wins the turn</h3>

	<p>The computer has <strong><?php echo count($computerDeck) ?></strong> cards.</p>
	<p>You have <strong><?php echo count($playerDeck) ?></strong> cards.</p>
	<form action='./' method='post'>
		<input type='hidden' name='turn' value='true'>
		<input type='submit' value='Next Turn!'>
	</form>
</body>
</html>