<?php

namespace Analytics;
use Analytics\Connection\Sql;
use Analytics\Resources\Cookie;
use Analytics\Resources\Session;

class Analytics
{
    private $cod_id;
    private $find;
    private $users;
    private $views;
    private $pages;
    private $date;

    public function report()
    {
        #(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $this->find = Sql::query("DATE(created_at) = DATE(now())");
        #var_dump($this->find);
        if (!$this->find || $this->find == false) {
            $this->cod_id = base64_encode(date("H:i:s"));
            $this->users = "1";
            $this->views = "1";
            $this->pages = "1";
    
            Cookie::new("access", true, time() + 86400, "/");
            Session::new("analytics", "access");

            $this->save();
            return $this;
        }

        if (!filter_input(INPUT_COOKIE, 'access')) {
            $this->users = "users +1";
            Session::new("analytics", "access");
            Cookie::new("access", true, time() + 86400, "/");
        }

        /*if (!Session::has('analytics')) {
            $this->views = "views +1";
            Session::new("analytics", "access");
        }*/

        if (!Session::has("cod_id")) {
            $this->cod_id = base64_encode(date("H:i:s"));
            $cod_session = Session::new("cod_id", $this->cod_id);
            Sql::update($this->users, $cod_session);
        }

        $this->pages = "pages +1";
        $this->save();
        return $this;
    }

    public function save()
    {   
        $cod_session = Session::show("cod_id");
        #$this->find['id'];
        #$cod_id = Sql::query("cod_id = $cod_session", "cod_id");
        #var_dump($this->users);
        #exit;

        /** Update Analytics */
        /*if (!empty(filter_input(INPUT_COOKIE, 'access'))) {
            var_dump("update");
            Sql::update($this->users, $cod_session);
        }*/

        /** Create Analytics */
        if (empty($cod_session)) {
            var_dump("insert");
            Session::new("cod_id", $this->cod_id);
            Sql::insert("'$this->cod_id', '$this->users', '$this->views', '$this->pages'");
        }
        
        #var_dump("pages up");
        if (isset($cod_session)) {
            Sql::updatePages($cod_session);
        }
    }
}
