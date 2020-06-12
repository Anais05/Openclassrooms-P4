<?php
require('controller/Frontend.php');
require('controller/Backend.php');


class router 
{
    public function run()
    {
        try 
        {
            $frontend = new Frontend();
            $backend = new Backend();

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
                    $frontend->loginSubmit(strip_tags($_POST['pseudo']), strip_tags($_POST['pass']));
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
                elseif ($_GET['action'] == 'adminLogin') 
                {
                    $backend->displayAdminLogin();
                }
                elseif ($_GET['action'] == 'adminSubmit') 
                {
                    $backend->adminLoginSubmit(strip_tags($_POST['pseudo']), strip_tags($_POST['pass']));
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
