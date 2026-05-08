<?php session_start(); ?>
<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vnos igralcev</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <div class="container">
        <h1>🎲 Igra s kockami</h1>
        <p>Vnesite podatke za tri igralce:</p>
        
        <form action="PHP/game.php" method="POST">
            <?php for ($i = 1; $i <= 3; $i++): ?>
            <div class="user-card">
                <h3>Igralec <?php echo $i; ?></h3>
                <div class="input-group">
                    <input type="text" name="name<?php echo $i; ?>" placeholder="Ime" required>
                    <input type="text" name="surname<?php echo $i; ?>" placeholder="Priimek" required>
                    <input type="text" name="address<?php echo $i; ?>" placeholder="Naslov" required>
                </div>
            </div>
            <?php endfor; ?>
            
            <button type="submit" class="btn-start">Vrzi kocke!</button>
        </form>
    </div>
</body>
</html>