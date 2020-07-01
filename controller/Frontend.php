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

    public function chapitre()
    {
        $ChapitreManager = new ChapitreManager();
        $CommentManager = new CommentManager();
        $chapitre = $ChapitreManager->getChap($_GET['chap']);
        if ($chapitre) {
            $comments = $CommentManager->getAll($_GET['chap']);

        } else {
            header('Location: index.php');
        }

        require('../view/chapitres.php');

    }

    public function displayBio()
    {
        require('../view/biographie.php');
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
                header('Location: index.php?action=login&user=unsuccess');
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
                    header('Location: index.php?action=login&user=unsuccess');
			    }
			}
    }

    public function logout()
    {
        $_SESSION = array();
        session_destroy();
        setcookie('login', '');
        setcookie('pass_hache', '');
        header('Location: index.php');
    }

    public function displayinscription()
    {
        require('../view/inscription.php');
    }

    public function addUser($pseudo,$mot_de_passe,$email)
    {
       $UserManager = new UserManager();

			$pseudo = $_POST['pseudo'];
			$pwd1 = $_POST['pass'];
			$pwd2 = $_POST['pass_confirm'];
            $email = $_POST['email'];

            if (!empty($pseudo) && !empty($pwd1) && !empty($pwd2) && !empty($email))
            {
                $member = $UserManager->checkPseudo($pseudo);
                if ($member)
                {
                    header('location: index.php?action=subscribe&pseudo=unsuccess');
                    
                }
                else
                {
                    if($pwd1==$pwd2)
                    {
                        $pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);
                        $insert = $UserManager -> createUser($pseudo,$pass_hache,$email);
                        header('Location: index.php?action=login&inscription=success');
                    }
                    else
                    {
                        header('location: index.php?action=subscribe&pass=unsuccess');
                    }
                }
            }
            else {
                header('location: index.php?action=subscribe&notempty=unsuccess');
		
			}

    }

    public function addComm()
    {
        $CommentManager = new commentManager();
        if(isset($_POST['membre']) && isset($_POST['content'])){
            $id_membre = $_POST['membre'];
            $commentaire = $_POST['content'];
            $id = $_GET['chap'];
            $comment = $CommentManager->addComm($id_membre, $id,$commentaire);
            header('location: index.php?action=chapitre&chap='.$id.'&addComm=success');
        }
    }

    public function reportComm($id)
    {
        $CommentManager = new commentManager();
        $id = $_GET['id'];
        $id_chap = $_GET['chap'];
        $comment = $CommentManager->report($id);
        header('location: index.php?action=chapitre&chap='.$id_chap.'&report=success');
         
    }



    
}

?>
