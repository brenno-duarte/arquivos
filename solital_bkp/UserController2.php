<?php

namespace Solital\Components\Controller;
use Solital\Components\Controller\Auth\AuthController;
use Solital\Message\Message;
use Solital\Security\Guardian;
use Solital\Wolf\Wolf;

class UserController extends AuthController
{

    public function login()
    {
        $msg = Message::getMessage('loginErrado');
        Message::clearMessage('loginErrado');
        
        Guardian::checkLogged();
        Wolf::loadView('login', [
            "title" => "Login",
            "msg" => $msg
        ]);
    }

    public function verifyLogin()
    {
        $res = $this->columns('emailAdm', 'senhaAdm')
            ->values('email', 'senha')
            ->register('tb_admin');

        if ($res == false) {
            Message::newMessage('loginErrado', 'E-mail e/ou senha incorretos');
            response()->redirect('login');
        }
    }

    public function dashboard()
    {
        var_dump($_SESSION);

        Wolf::loadView('dashboard', [
            "title" => "Dashboard"
        ]);
    }

    public function sair()
    {
        Guardian::logoff();
    }
}
