<?php
require_once('../model/ChapitreManager.php');
require_once('../model/Chapitre.php');
require_once('../model/Comment.php');
require_once('../model/CommentManager.php');
require_once('../model/UserManager.php');
require_once('../model/User.php');

class Frontend 
{
    public function home()
    {
        $ChapitreManager = new ChapitreManager();
        $chapitres = $ChapitreManager->getList();
        require('../view/home.php');
    }

    public function displayLogin()
    {
        require('../view/connexion.php');
    }

    public function loginSubmit($pseudo, $mot_de_passe)
    {
        $UserManager = new UserManager();
        $user = $UserManager->login($pseudo);

        $isPasswordCorrect = password_verify($_POST['pass'], $user['mot_de_passe']);

			if (!$user)
			{
                echo ' Identifiant ou mot de passe incorrect !';
			}
			else
			{
			    if ($isPasswordCorrect) 
			    {
			        session_start();
			        $_SESSION['id'] = $user['id'];
			        $_SESSION['pseudo'] = $pseudo;
			        header('Location: index.php');
			    }
			    else {
			        echo 'Identifiant ou mot de passe incorrect ici  !';
			    }
			}
    }

    public function logout()
    {
        // Suppression des variables de session et de la session
        $_SESSION = array();
        session_destroy();

        // Suppression des cookies de connexion automatique
        setcookie('login', '');
        setcookie('pass_hache', '');
        header('Location: index.php');
    }

    

    
}

?>
