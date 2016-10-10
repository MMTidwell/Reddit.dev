<html>
<head>
	<title>Roll-Dice</title>
</head>
<body>
	<h1>Roll Dice Game</h1>
	<h1>Guess: <?php echo $guess ?></h1>
	<h1>Random Number: <?php echo $num ?></h1>
	<?php if ($correct): ?>
		<p>You guessed corret!!!</p>
	<?php endif ?>
</body>
