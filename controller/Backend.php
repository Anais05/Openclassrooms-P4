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
            header('Location: index.php?action=adminLogin&admin=unsuccess');
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
                header('Location: index.php?action=adminLogin&admin=unsuccess');
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
            header('location: index.php?action=adminHome&newPost=success');
        }
        else {
            header('location: index.php?action=createpost&newPost=unsuccess');
        }

    }

    public function updateCurrentPost($titre, $texte, $id)
    {
        $ChapitreManager = new ChapitreManager();
        $titre = $_POST['title'];
        $texte = $_POST['content'];
        $id = $_GET['chap'];
        $update = $ChapitreManager->updatePost($titre, $texte, $id);
        header('location: index.php?action=modifier&chap='.$id.'&updatePost=success');
    
    }

    public function deleteCurrentPost($id)
    {

        $ChapitreManager = new ChapitreManager();
        $CommentManager = new commentManager();
        $id = $_GET['chap'];
        $chapitre = $ChapitreManager->deletePost($id);
        $comment = $CommentManager->deletePostComment($id);
        header('location: index.php?action=adminHome&deletePost=success');

    
    }

    public function deleteComm($id)
    {

        $CommentManager = new commentManager();
        $id = $_GET['id'];
        $id_chap = $_GET['chap'];
        $comment = $CommentManager->delete($id);
        header('location: index.php?action=chapitre&chap='.$id_chap.'&deleteComm=success');

    }
}