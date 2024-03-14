<?php
    // Functie: programma login OOP 
    // Auteur: Wigmans
    namespace login\app\classes;
    // Initialisatie
    require "../vendor/autoload.php";

    // Assuming your namespace is correctly defined as Login\classes\user\User;
    // and your autoload is properly set to load classes.
    
    $user = new User();

    if (isset($_GET['logout']) && $_GET['logout'] == 'true') {
        $user->Logout();
    }

    if(!$user->IsLoggedin()){
        echo "U bent niet ingelogd. Login in om verder te gaan.<br><br>";
        echo '<a href = "login_form.php">Login</a>';
    } else {
        $user->GetUser(); // Assuming GetUser doesn't actually need to be passed $user
        
        echo "<h2>Het spel kan beginnen</h2>";
        echo "Je bent ingelogd met:<br/>";
        $user->ShowUser();
        echo "<br><br>";
        echo '<a href = "?logout=true">Logout</a>';
    }
?>
