<?php

    namespace App;

    class Connection{

        public static function getDb(){

            try{
                $conn = new \PDO(
                    "mysql:host=localhost;dbname=soltavoz;charset=utf8",
                    "root",
                    ""
                );

                return $conn;
            } catch(\PDOException $e){
                echo "Erro: " . $e->getMessage();
            }

        }

    }

?>