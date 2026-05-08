<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Shranjevanje igralcev v dvodimenzionalno tabelo
    $_SESSION['users'] = [
        ['name' => $_POST['name1'], 'surname' => $_POST['surname1'], 'address' => $_POST['address1']],
        ['name' => $_POST['name2'], 'surname' => $_POST['surname2'], 'address' => $_POST['address2']],
        ['name' => $_POST['name3'], 'surname' => $_POST['surname3'], 'address' => $_POST['address3']]
    ];

    $diceResults = [];
    $sums = [];

    foreach ($_SESSION['users'] as $index => $user) {
        $rolls = [rand(1, 6), rand(1, 6), rand(1, 6)];
        $diceResults[$index] = $rolls;
        $sums[$index] = array_sum($rolls);
    }

    $maxSum = max($sums);
    $winners = [];
    foreach ($sums as $index => $sum) {
        if ($sum == $maxSum) {
            $winners[] = $_SESSION['users'][$index];
        }
    }

    $_SESSION['diceResults'] = $diceResults;
    $_SESSION['sums'] = $sums;
    $_SESSION['winners'] = $winners;
    $_SESSION['maxSum'] = $maxSum;
}
?>
<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <title>Rezultati meta</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
    <div class="container">
        <h1>Rezultati igre</h1>

        <div class="results-grid">
            <?php foreach ($_SESSION['users'] as $idx => $user): ?>
            <div class="result-card">
                <h3><?php echo $user['name']; ?></h3>
                <div class="dice-container">
                    <?php foreach ($_SESSION['diceResults'][$idx] as $val): ?>
                        <img src="../SLIKE/dice<?php echo $val; ?>.png" alt="Kocka <?php echo $val; ?>" class="dice-img">
                    <?php endforeach; ?>
                </div>
                <p>Seštevek: <strong><?php echo $_SESSION['sums'][$idx]; ?></strong></p>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="winner-section">
            <h2>🏆 Zmagovalec:</h2>
            <?php foreach ($_SESSION['winners'] as $winner): ?>
                <p><?php echo $winner['name'] . " " . $winner['surname']; ?> (<?php echo $_SESSION['maxSum']; ?> točk)</p>
            <?php endforeach; ?>
        </div>

        <p class="timer">Preusmeritev čez 10 sekund...</p>
    </div>

    <script src="../JS/script.js"></script>
</body>
</html>