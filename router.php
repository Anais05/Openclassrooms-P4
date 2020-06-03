<?php
require('controller/Frontend.php');

class router 
{
    public function run()
    {
        try 
        {
            $frontend = new Frontend();

            if (isset($_GET['action'])) 
            {
                if ($_GET['action'] == 'home')
                {
                    $frontend->home();
                }
                elseif ($_GET['action'] == 'chapitre')
                {
                    $frontend->chapitre();
                }
                elseif ($_GET['action'] == 'addComm')
                {
                    $frontend->addComm();
                }
                elseif($_GET['action'] == 'login')
                {
                    $frontend->displayLogin();
                }
                elseif($_GET['action'] == 'loginSubmit')
                {
                    $frontend->loginSubmit(strip_tags($_POST['pseudo']), strip_tags($_POST['mot_de_passe']));
                }
                elseif ($_GET['action'] == 'logout') 
                {
                    $frontend->Logout();
                }
                elseif ($_GET['action'] == 'subscribe') 
                {
                    $frontend->displayinscription();
                }
                elseif ($_GET['action'] == 'subscribeSubmit')
                {
                    $frontend->addUser(strip_tags($_POST['pseudo']), strip_tags($_POST['pass']), strip_tags($_POST['email']));
                }
        
            }
            else {
                $frontend->home();
            }

        }
        catch (Exception $e)
        {
            echo 'Erreur';
        }
    }
}

?>
