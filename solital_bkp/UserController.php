<?php

namespace Solital\Components\Controller;
use Katrina\Katrina as Katrina;
use Solital\Wolf\Wolf;
use Solital\Security\Guardian;
use Solital\Message\Message;
use Solital\Session\Session;
use Solital\Cookie\Cookie;
use Solital\Mail\Mail;
use Solital\Cache\Cache;
use Component\Consumer\Consumer;

class UserController 
{
    private $table = 'tb_admin';
    private $columnPrimaryKey = 'idAdm';
    private $columns = [ 
        'nome',
        'idade',
        'email',
        'profissao',
        'tipo'
    ];
    
    public function instance()
    {
        $katrina = new Katrina($this->table, $this->columnPrimaryKey, $this->columns);
        return $katrina;
    }
    
    public function home() 
    {
        Guardian::checkLogin();
        $html = $this->instance()->pagination("tb_blog", 2);

        Wolf::loadView('home', [
            "title" => "Home",
            "colunas" => $html['rows'],
            "setas" => $html['arrows']
        ]);
    }
    
    public function test()
    {
        #echo '<pre>';
        /*$res = $this->instance()
                    ->createTable("tabela_orm")
                    ->int("id_orm")->primary()->increment()
                    ->varchar("nome", 20)->unique()->notNull()->default("brenno")
                    ->int("idade", 3)->unsigned()->notNull()
                    ->varchar("email", 30)->default("brenno.gnr@gmail.com")->notNull()
                    ->varchar("profissao", 40)->notNull()
                    ->int("tipo")->notNull()
                    ->constraint("dev_cons_fk")->foreign("tipo")->references("dev", "iddev")
                    ->closeTable()
                    ->build();*/

        /*$res = $this->instance()
                    ->dropTable("tabela_orm")
                    ->build();*/

        #$res = $this->instance()->select(3)->build("ONLY");
        #$res = $this->instance()->insert(['brenno', 21, 'brennoduarte2015@outlook.com', 'analista e marketing', 1]);
        /*
        $res = instance()->update(['nomeSistema', 'nomeFoto'], ['ClinicalSys', 'clinicalsys-logo.png'], 8)
        #$res = $this->instance()->innerJoin("sistemas", "idsistema")->build("ALL");
        #$res = $this->instance()->innerJoin("sistemas", "idsistema", 2, "a.idfoto, a.nomefoto, b.nome")->build("ALL");
        #$res = $this->instance()->listTables()->build("ALL");
        #$res = $this->instance()->delete(1)->build();
        #$res = $this->instance()->truncate("sistemas")->build();
        #$res = $this->instance()->describeTable("tabela_orm")->build("ALL");
        #$res = $this->instance()->dump("db_blog", ROOT."/app/Solital/Cache/tmp/banco.sql");

        /*$res = $this->instance()
                    ->alter("mensagens")->add()
                    ->varchar("primeiro_campo", 10)
                    #->after("nomeMsg")
                    #->first()
                    ->build();*/

        /*$res = $this->instance()
                    ->alter("mensagens")->drop("tipo")
                    ->build();*/

        /*$res = $this->instance()
                    ->alter("mensagens")->modify()
                    ->varchar("tipo_pessoa", 100)
                    ->build();*/

        /*$res = $this->instance()
                    ->alter("mensagens")->change("tipo_pessoa")
                    ->varchar("tipo", 100)
                    ->build();*/

        /*$res = $this->instance()
                    ->rename("novas mensagens", "mensagens")
                    ->build();*/

        /*$res = $this->instance()
                    ->alter("mensagens")->addConstraint("dev_cons_fk")->foreign("tipo")->references("dev", "iddev")
                    ->build();*/
    
        #var_dump($res);
    }

    public function console()
    {
        var_dump(__DIR__);
    }

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

    public function cache() 
    {
        $cache = new Cache();
        echo '<pre>';
        
        $list = [
            'nome' => 'Brenno Duarte',
            'email' => 'brenno.gnr@gmail.com'
        ];

        $list2 = [
            'nome' => 'Katrina Maria',
            'email' => 'katrinaMaria@gmail.com'
        ];

        #$cache->delete("list");
        #$cache->clear();

        /*if ($cache->has('list') == true) {
            echo '<h1>from cache</h1>';
            $cache->get('list');
        } else {
            echo '<h1>created cache</h1>';
            $cache->set('list', $list, 20);
        }*/

        $cache->deleteMultiple(["list1", "list2"]);

        /*$cache->getMultiple(['list1', 'list2']);

        echo '<h1>created cache</h1>';
        $cache->setMultiple([
            'list1' => $list,
            'list2' => $list2
        ], 20);*/

        echo '<h1>from original</h1>';
        print_r($list);
        print_r($list2);

        #echo '<pre>';
        #echo request()->getParamInput('name');
        #var_dump(request()->isFormatAccepted());
        /**
         * request()
                * isSecure(); OK
                * getUrl(); NOT
                * getUrlCopy();
                * getHost(); OK
                * getMethod(); OK
                * getUser();
                * getPassword();
                * getHeaders(); OK
                * getIp(); OK
                * getRemoteAddr();
                * getReferer();
                * getUserAgent(); OK
                * getHeader()
                * getInputHandler(); NOT
                * isFormatAccepted();
                * isAjax();
                * getAcceptFormats();
                * setUrl();
                * setHost();
                * setMethod();
                * setRewriteRoute();
                * getRewriteRoute();
                * getRewriteUrl();
                * setRewriteUrl();
                * setRewriteCallback();
                * getLoadedRoute();
                * getLoadedRoutes();
                * setLoadedRoutes();
                * addLoadedRoute();
                * hasPendingRewrite();
                * setHasPendingRewrite();
*/
            #var_dump(response()->headers(['Content-type => application/pdf']));
  /*       * response();
                * httpCode(); NOT
                * redirect(); NOT
                * refresh();
                * auth();
                * cache();
                * json();
                * header();
                * headers();
         * 
         * url();
                * isSecure(); OK
                * isRelative();
                * getScheme();
                * setScheme();
                * getHost();
                * setHost();
                * getPort();
                * setPort();
                * getUsername();
                * setUsername();
                * getPassword();
                * setPassword();
                * getPath();
                * setPath();
                * getParams();
                * mergeParams();
                * setParams();
                * setQueryString();
                * getQueryString();
                * getFragment();
                * setFragment();
                * getOriginalUrl();
                * indexOf();
                * contains();
                * hasParam();
                * removeParams();
                * removeParam();
                * getParam();
                * parseUrl();
                * getRelativeUrl();
                * getAbsoluteUrl();
                * jsonSerialize();
         * 
         */
    }
    
    public function logoff() 
    {
        Guardian::logoff();
    }
    
    public function verificar() 
    {

        ## JEITO RECOMENDADO
        /**
         * use Solital\Components\Controller\AuthController;
         * class UserController extends AuthController
         */

        $res = $this->columns('emailAdm', 'senhaAdm')
            ->values('email', 'senha')
            ->register('tb_admin');

        if ($res == false) {
            Message::newMessage('loginErrado', 'E-mail e/ou senha incorretos');
            response()->redirect('login');
        }

        ## OUTRO JEITO

        $email = filter_input(INPUT_POST, 'email');
        $senha = filter_input(INPUT_POST, 'senha');
        
        $res = Guardian::verifyLogin()
                        ->table($this->table)
                        ->fields('emailAdm', 'senhaAdm', $email, $senha);
        
        if ($res) {
            Guardian::validate($res['nomeAdm']);
        } else {
            Message::newMessage('loginErrado', 'E-mail e/ou senha incorretos');
            response()->redirect('login');
        }
    }

    public function reset()
    {
        /*
        VERIFICAR EMAIL
        $res = Guardian::changeEmail("tb_admin", "password", "old_email@email.com", "new_email@email.com");
        var_dump($res);*/
        
        $key = Guardian::encrypt("brenno duarte de lima");
        
        $decoded = Guardian::decrypt($key)::isValid();
        
        var_dump($decoded);
    }

}
