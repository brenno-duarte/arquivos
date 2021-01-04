<?php

class createClass {
    public static function create($name){
        file_put_contents("src/Controller/".$name."Controller.php", "<?php\n\nclass ".$name."Controller {\n\n}");
        file_put_contents("src/Model/".$name."Model.php", "<?php\n\nclass ".$name."Model {\n\n}");
    }
}