<?php
require_once('../model/ChapitreManager.php');
require_once('../model/Chapitre.php');
require_once('../model/Comment.php');
require_once('../model/CommentManager.php');
require_once('../model/UserManager.php');
require_once('../model/User.php');

class Backend 
{
    public function displayAdminLogin()
    {
        if (isset($_SESSION['pseudo']) && ($_SESSION["pseudo"]=='admin'))
	    {
            $ChapitreManager = new ChapitreManager();
            $chapitres = $ChapitreManager->getList();
            require('../view/adminView.php');
        }
        elseif (isset($_SESSION["pseudo"]) || (empty($_SESSION))) 
        {
            require('../view/adminlogin.php');
        }
    }

    public function adminLoginSubmit($pseudo, $mot_de_passe)
    {
        $UserManager = new UserManager();
        $admin = $UserManager->adminLogin($pseudo);

        $isPasswordCorrect = password_verify($_POST['pass'], $admin['mot_de_passe']);

			if (!$admin)
			{
                echo ' Identifiant ou mot de passe incorrect !';
			}
			else
			{
			    if ($isPasswordCorrect) 
			    {
			        $_SESSION['id'] = $admin['id'];
                    $_SESSION['pseudo'] = $pseudo;
                    $ChapitreManager = new ChapitreManager();
                    $chapitres = $ChapitreManager->getList();
			        require('../view/adminView.php');
			    }
			    else {
			        echo 'Identifiant ou mot de passe incorrect ici  !';
			    }
			}
    }
}