<html lang="cs">

<head>
    <meta charset="UTF-8">
    <title>S PRUHEM</title>
    <link rel="stylesheet" href="assets/css/homepage.css" />
    <link rel="stylesheet" href="assets/css/footer.css" />
    <?php require_once 'assets/subscription_form/head.php'; ?>
</head>

<body>

<h1>S PRUHE<span class="no_letter_spacing">M</span></h1>

<h2>Úřední dopisy. Srozumitelně a lidsky.</h2>

<div class="row">
    <div class="column">
        <h3>Testovací stránky</h3>
        <form method="post">
            <button class="button" type="submit" formaction="epr.php">Platební rozkaz</button>
            <button class="button" type="submit" formaction="epr.php">Elektronický platební rozkaz</button>
            <button class="button" type="submit" formaction="odpor.php">Odpor</button>
        </form>
    </div>
    <div class="column">
        <?php require_once 'assets/subscription_form/body.php'; ?>
    </div>
</div>

<div class="footer">
    Ozvěte se nám na <a href="mailto:obalka@spruhem.cz">obalka@spruhem.cz</a>
</div>

<?php require_once 'assets/subscription_form/footer.php'; ?>

</body>

</html>