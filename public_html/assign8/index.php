<?php 
	function card_value($value) {
		switch($value) {
			case 't':
				return 10;
			case 'j':
				return 11;
			case 'q':
				return 12;
			case 'k':
				return 13;
			case 'a':
				return 14;
			default:
				return intval($value);
		}
	}
	if(isset($_REQUEST['decksize'])) {
		$decksize = intval($_REQUEST['decksize']);
		if($decksize < 2 || $decksize > 52 || $decksize % 2 != 0) {
			include __DIR__.'/../../templates/assign8/invalidform.html.php';
    		} else {
			$cards = array();
        		$ranks = array('2', '3', '4', '5', '6', '7', '8', '9', 't', 'j', 'q', 'k', 'a');
       			$suits = array('c', 'd', 'h', 's');
			foreach($ranks as $rank) {
            			foreach($suits as $suit) {
                			$cards[] = $rank . $suit;
            			}
        		}
			shuffle($cards);
			$cards = array_slice($cards, 0, $decksize);
			$playerDeck = array_slice($cards, 0, $decksize/2);
			$computerDeck = array_slice($cards, $decksize/2);
			$playerFilename = $_SERVER['DOCUMENT_ROOT'] . '/../data/playerDeck.txt';
			$computerFilename = $_SERVER['DOCUMENT_ROOT'] . '/../data/computerDeck.txt';
			file_put_contents($playerFilename, implode("\n", $playerDeck));
       		file_put_contents($computerFilename, implode("\n", $computerDeck));
			include __DIR__.'/../../templates/assign8/startgame.html.php';
		}
	} elseif(isset($_REQUEST['turn'])) {
		$playerFilename = $_SERVER['DOCUMENT_ROOT'] . '/../data/playerDeck.txt';
		$computerFilename = $_SERVER['DOCUMENT_ROOT'] . '/../data/computerDeck.txt';
		$playerDeck = file($playerFilename, FILE_IGNORE_NEW_LINES);
		$computerDeck = file($computerFilename, FILE_IGNORE_NEW_LINES);
		if(count($computerDeck) == 0) {
			$message = "Congratulations! You won the game!";
			include __DIR__.'/../../templates/assign8/gameover.html.php';
			die();
		} elseif(count($playerDeck) == 0) {
			$message = "Sorry, you lost the game.";
			include __DIR__.'/../../templates/assign8/gameover.html.php';
			die();
		} else {
			$playerCard = array_shift($playerDeck);
			$computerCard = array_shift($computerDeck);
			$pot = array($playerCard, $computerCard);
			while($playerCard[0] == $computerCard[0]) {
				for($i = 0; $i < 3; $i++) {
					if(count($computerDeck) == 0) {
						$message = "Congratulations! You won the game! A tie has occurred, and the computer cannot meet the tie breaker requirements!";
						include __DIR__.'/../../templates/assign8/gameover.html.php';
						die();
					} elseif(count($playerDeck) == 0) {
						$message = "Sorry, you lost the game. A tie has occurred, and the you cannot meet the tie breaker requirements!";
						include __DIR__.'/../../templates/assign8/gameover.html.php';
						die();
					}
					$pot[] = array_shift($playerDeck);
					$pot[] = array_shift($computerDeck);
				}
				if(count($computerDeck) == 0) {
					$message = "Congratulations! You won the game! A tie has occurred, and the computer cannot meet the tie breaker requirements!";
					include __DIR__.'/../../templates/assign8/gameover.html.php';
					die();
				} elseif(count($playerDeck) == 0) {
					$message = "Sorry, you lost the game. A tie has occurred, and the you cannot meet the tie breaker requirements!";
					include __DIR__.'/../../templates/assign8/gameover.html.php';
					die();
				}

				$playerCard = array_shift($playerDeck);
				$computerCard = array_shift($computerDeck);
				$pot[] = $playerCard;
				$pot[] = $computerCard;
			}
			$playerValue = card_value($playerCard[0]);
			$computerValue = card_value($computerCard[0]);
			if($playerValue > $computerValue) {
				$playerDeck = array_merge($playerDeck, $pot);
				$winner = "Player";
			} else {
				$computerDeck = array_merge($computerDeck, $pot);
				$winner = "Computer";
			}
			file_put_contents($playerFilename, implode("\n", $playerDeck));
       		file_put_contents($computerFilename, implode("\n", $computerDeck));
			$playerCardFile = '../cards/' . $playerCard . '.gif';
			$computerCardFile = '../cards/' . $computerCard . '.gif';
			include __DIR__.'/../../templates/assign8/turn.html.php';
		}		
	} else {
		include __DIR__.'/../../templates/assign8/initialform.html.php';
	}

?>