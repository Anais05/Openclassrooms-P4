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
                switch ($_GET['action']) {
                    case 'home':
                        $frontend->home();
                        break;

                    case 'chapitre':
                        $frontend->chapitre();
                        break;

                    case 'login':
                        $frontend->displayLogin();
                        break;

                    case 'loginSubmit':
                        $frontend->loginSubmit(strip_tags($_POST['pseudo']), strip_tags($_POST['pass']));
                        break;

                    case 'logout':
                        $frontend->Logout();
                        break;
                        
                    case 'subscribe':
                        $frontend->displayinscription();
                        break;

                    case 'subscribeSubmit':
                        $frontend->addUser(strip_tags($_POST['pseudo']), strip_tags($_POST['pass']), strip_tags($_POST['email']));
                        break;
                    
                    case 'addComm':
                        $frontend->addComm();
                        break;

                    case 'report':
                        $frontend->reportComm($_GET['id']);
                        break;

                    case 'biographie':
                        $frontend->displayBio();
                        break;

                    case 'adminLogin':
                        $backend->displayAdminLogin();
                        break;

                    case 'adminSubmit':
                        $backend->adminLoginSubmit(strip_tags($_POST['pseudo']), strip_tags($_POST['pass']));
                        break;

                    case 'adminHome':
                        $backend->adminHome();
                        break;

                    case 'modifier':
                        $backend->displayEditPannel();
                        break;

                    case 'createpost':
                        $backend->displayFormNewPost();
                        break;

                    case 'newchap':
                        $backend->createNewPost();
                        break;

                    case 'updatePost':
                        $backend->updateCurrentPost($_POST['title'], $_POST['content'], $_GET['chap']);
                        break;

                    case 'deleteChap':
                        $backend->deleteCurrentPost($_GET['chap']);
                        break;

                    case 'deletecomm':
                        $backend->deleteComm($_GET['id']);
                        break;

                    default:
                        throw new \Exception("Action pas valide");
                        break;

                }
                        
            }
            else {
                $frontend->home();
            }

        }
        catch (Exception $e)
        {
            echo 'Erreur : ' . $e->getMessage();
        }
    }
}

?>