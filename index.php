<?php

require_once 'model.php';
require_once 'controllers.php';

// "routes"
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
echo "<small>route = $uri</small><br>";
if('/webbing/index.php' === $uri || '/webbing/' === $uri ) 
{
    form_login_show();
} 
elseif ('/webbing/index.php/login' === $uri && isset($_POST['btnContinue'])) 
{
    form_firstLogin_post_action();
}
elseif ('/webbing/index.php/admin' === $uri ) 
{
    echo "Ici c'est admin";
}
elseif ('/webbing/index.php/profil' === $uri ) 
{
    echo "Ici c'est profil";
}
elseif ('/webbing/index.php/forum' === $uri ) 
{
    echo "Ici c'est forum";
}
elseif ('/webbing/index.php/photo' === $uri ) 
{
    echo "Ici c'est photo";
}  
elseif ('/webbing/index.php/info' === $uri ) 
{
    echo "Ici c'est info";
}
elseif ('/webbing/index.php/deconnexion' === $uri ) 
{
    echo "Ici c'est deconnexion";
}
else 
{
    echo '<html><body>Page non trouvée...</body></html>';
}


?>