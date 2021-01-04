<?php

namespace Solital\Components\Controller;
use Solital\Core\Wolf\Wolf;
use Solital\Components\Model\UserModel;
use Solital\Components\Model\ContactModel;
use Solital\Core\Course\Container\Container;
use Solital\Core\Http\Middleware\BaseCsrfVerifier;
use Solital\Components\Controller\Auth\AuthController;
use Solital\Core\Http\Middleware\MiddlewareCallableInterface;

class UserController
{
    private $user;
    private $container;

    public function __construct()
    {
        $this->container = new Container();

        $this->container->set("user", function($args) {
            return new UserModel($args);
        }, new ContactModel());
    }

    public function user()
    {
        $dep = $this->container->get('user');
        $dep->run();
    }

    public function container()
    {
        $dep = $this->container->get('user');
        $dep->run();
        #echo '<pre>';
        #var_dump($dep);

        #$user = new UserModel(new ContactModel());
        #$user->run();
    }

    public function parametros()
    {
        echo '<pre>';
        # Pegar único input
        /*$name = input('nome');
        $email = input('email');
        var_dump($name, $email);*/

        # Pegar objeto input
        /*$name = input()->find('nome');
        $email = input()->find('email');
        var_dump($name, $email);*/

        # Pegar '$_get', '$_post', e '$_file' específico
        #$name = input()->post('nome');
        
        #$destinationFilename = __DIR__."/".uniqid().".".$file->getExtension();
        $upload = upload('file_up');

        #$upload->moveTo(__DIR__."/".uniqid()."-".$file->getFilename());

        # SEM PSR-7
        /*
        $file = input()->file('example2');
        foreach($file as $file) {
            if($file->getExtension() == 'jpg') {
                $destinationFilename = __DIR__."/".uniqid().".".$file->getExtension();
                if ($file->move($destinationFilename)) {
                    echo 'deu certo';
                } else {
                    echo 'não deu certo';
                }
            }
        }*/
        
        var_dump($upload);

        # Pegar todos os inputs
        #$input = input()->all();
        // específico
        #$input = input()->all(['email']);
        #var_dump($input);
    }

    public function verifyLogin()
    {
        /*$res = $this->columns('emailAdm', 'senhaAdm')
            ->values('email', 'senha')
            ->register('tb_admin');

        if ($res == false) {
            Message::newMessage('loginErrado', 'E-mail e/ou senha incorretos');
            response()->redirect('login');
        }*/
    }

    public function upload()
    {
        $upload = request();
        $res = $upload->getPharseBody();

        var_dump($res);
    }
}
