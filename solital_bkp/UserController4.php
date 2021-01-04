<?php

namespace Solital\Components\Controller;

use Solital\Components\Model\User;
use Solital\Components\Model\Posts;

class UserController
{
    public function user()
    {
        $user = new User();
        $res = $user->listar();
        pre($res);
    }

    public function posts()
    {
        $posts = new Posts();
        $res = $posts->listar();
        pre($res);
    }
}