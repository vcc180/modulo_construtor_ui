<html>
    <head>
        <meta charset="UTF-8" lang="pt-br"/>
        <meta name="viewport" content="width=device-width,initial-scale=1, maximum-scale=1">
        <link href="<?php echo HOME_URI; ?>view/css/style.css?ID=<?php echo time(); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo HOME_URI; ?>view/css/siderbar.css?ID=<?php echo time(); ?>" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?php echo HOME_URI; ?>view/css/widgets.css?ID=<?php echo time(); ?>"/>
        <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
        <link href="<?php echo HOME_URI; ?>view/css/icons/fonts-icons.css?ID=<?php echo time(); ?>" rel="stylesheet" type="text/css"/>
        <?php include_once PATH . '/view/js/loader-javascript.php'; ?>

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <title>Escola Gregório de Souza Menezes</title>
    </head>
    <body>
        <script>
            window.addEventListener("load", function () {
                var load_screen = document.getElementById("load_screen");
                document.body.removeChild(load_screen);
            });
        </script>
        <div id="load_screen"><img id="loading" src="<?php echo HOME_URI; ?>/view/css/loading.gif"/></div>

        <div id="main">
            <?php require_once ('menu.php'); ?>
            <div id="container">
                <div id="view">
                    <div id="welcome-legenda">Olá <?php echo $_SESSION['USER_DATA']['user_name'] ?>, seja bem-vinda!</div><br>