<?php

session_start();
require_once 'model.php';
require_once 'controllers.php';

// "routes"
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
//echo "<small>route = $uri</small><br>";
if('/index.php' === $uri || '/' === $uri ) 
{
    if (isset($_SESSION['user'])) 
    {
        homepage_show();
    }
    else
    {
        form_login_show();
    }
} 
elseif ('/index.php/login' === $uri && isset($_POST['btnContinue'])) 
{
    form_firstLogin_post_action();
}
elseif ('/index.php/login' === $uri && isset($_POST['btnLogin'])) 
{
    form_login_post_action();
}
elseif ('/index.php/profile' === $uri ) 
{
    form_profileChange_show();
}
elseif ('/index.php/profile_change' === $uri && isset($_POST['btnCreateProfile'])) 
{
    form_changeProfile_post_action();
}
elseif ('/index.php/admin' === $uri ) 
{
    form_email();
}
elseif ('/index.php/email' === $uri ) 
{
    form_email_action();
}
elseif ('/index.php/home' === $uri ) 
{
    homepage_show();
}
elseif ('/index.php/profil' === $uri ) 
{
    echo "Ici c'est profil";
}
elseif ('/index.php/forum' === $uri ) 
{
    if (isset($_GET['id'])) {
        show_post_by_role($_GET['id']);
    }else {
        forum_show();
    }
   
}
elseif ('/index.php/details' === $uri ) 
{ 
    if (isset($_GET['id'])){
        traitement_post_reponse();
        show_post_and_reply($_GET['id']); 
    }
}
elseif ('/index.php/post_question' === $uri ) 
{
    traitement_post_question();
}  
elseif ('/index.php/photo' === $uri ) 
{
    echo "Ici c'est photo";
}  
elseif ('/index.php/infos_maurice' === $uri ) 
{
    info_maurice_show();
}
elseif ('/index.php/infos_france' === $uri ) 
{
    info_france_show();
}
elseif ('/index.php/deconnexion' === $uri ) 
{
    deconnexion();
}
else 
{
    echo '<html><body>Page non trouvée...</body></html>';
}


?>