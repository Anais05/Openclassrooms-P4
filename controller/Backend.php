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
    public function adminHome()
    {
        $ChapitreManager = new ChapitreManager();
        $chapitres = $ChapitreManager->getList();
        require('../view/adminView.php');
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

    public function displayEditPannel()
    {
        $ChapitreManager = new ChapitreManager();
        $chapitre = $ChapitreManager->getChap($_GET['chap']);
        require('../view/modifier.php');
    }

    public function displayFormNewPost()
    {
        require('../view/createpost.php');
    }

    public function createNewPost()
    {
        $ChapitreManager = new ChapitreManager();
        if (!empty($_POST['title']) && !empty($_POST['content']))
        {
            $titre = $_POST['title'];
            $texte = $_POST['content'];
            $chapitre = $ChapitreManager->addPost($titre, $texte);
            header('location: index.php?action=adminHome');
        }
        else {
            require('../view/createpost.php');
            echo "<p class ='adminError'> Contenu vide !</p>";
        }

    }

    public function updateCurrentPost($titre, $texte, $id)
    {
        $ChapitreManager = new ChapitreManager();
        $titre = $_POST['title'];
        $texte = $_POST['content'];
        $id = $_GET['chap'];
        $update = $ChapitreManager->updatePost($titre, $texte, $id);
        header('location: index.php?action=adminHome');
    
    }

    public function deleteCurrentPost($id)
    {

        $ChapitreManager = new ChapitreManager();
        $id = $_GET['chap'];
        $chapitre = $ChapitreManager->deletePost($id);
        header('location: index.php?action=adminHome');

    
    }
}