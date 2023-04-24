<!DOCTYPE html>
<html>
<head>
	<title>Assign8</title>
	<meta charset="UTF-8" />
	<link rel="stylesheet" href="../../subfolder/templates.css" />
</head>
<body>
	<h1>Game of War</h1>
	<p>In this  game,
	the deck is shuffled and divided evenly among two players. A turn
	consists of each player playing the topmost card of their deck face
	up. The highest card wins the turn. Suits are ignored, and aces are
	high. The winner of the turn takes both cards played and adds them
	to the bottom of her deck. In the case of a tie, each player adds
	three cards from the top of her deck to the &ldquo;pot&rdquo; and
	then plays the next card from the top of her deck face up as a tie
	breaker. The winner of the tie breaker takes all cards from the &ldquo;pot&rdquo; and
	adds them to the bottom of her deck. If a tie occurs during a tie-breaker
	turn, the tie breaking process is simply repeated with each player
	adding three more cards to the &ldquo;pot&rdquo; and using the fourth
	card as a tie breaker. If a player does not have sufficient cards
	in their deck to meet the requirements of a tie breaker turn, she
	loses the game. Likewise, the first player to lose her entire deck
	loses the game.</p>
	<form action='./' method='post'>
		<p>You may pick your preferred deck size by entering any even integer between 2 and 52.</p>

		<p>Invalid deck size! Please enter an even, positive integer between 2 and 52.</p>

		<p>Deck Size: <input type='number' id='decksize' name='decksize' autofocus /> </p>
		<input type='submit' value='Deal!'>
	</form>
</body>
</html>