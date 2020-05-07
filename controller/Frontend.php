<?php
require_once('../model/ChapitreManager.php');
require_once('../model/Chapitre.php');
require_once('../model/Comment.php');
require_once('../model/CommentManager.php');

class Frontend 
{
    public function listChapitre()
    {
        $ChapitreManager = new ChapitreManager();
        $chapitres = $ChapitreManager->getList();

        require('../main/index.php');
    }

    public function chapitre()
    {
        $ChapitreManager = new ChapitreManager();
        $CommentManager = new CommentManager();
        $chapitre = $ChapitreManager->getChap($_GET['chap']);
        if ($chapitre) {
            $comments = $commentManager->getAll($_GET['chap']);

        } else {
            header('Location: index.php');
        }
        
        require('../main/index.php');

    }

    
}

?>