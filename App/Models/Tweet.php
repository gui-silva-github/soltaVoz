<?php

    namespace App\Models;

    use SV\Model\Model;

    class Tweet extends Model{

        private $id;
        private $id_usuario;
        private $tweet;
        private $data;

        public function __get($atributo){
            return $this->$atributo;
        }

        public function __set($atributo, $valor){
            $this->$atributo = $valor;
        }

        public function salvar(){

            $query = "INSERT INTO tweets (id_usuario, tweet) VALUES (:id_usuario, :tweet)";

            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id_usuario', $this->__get('id_usuario'));
            $stmt->bindValue(':tweet', $this->__get('tweet'));
            $stmt->execute();   

            return $this;

        }

        public function getAll(){

            $query = "
            SELECT t.id, t.id_usuario, u.nome, t.tweet, 
            DATE_FORMAT(t.data, '%d/%m/%Y %H:%i') as data
            FROM tweets as t
            LEFT JOIN usuarios as u ON 
            (t.id_usuario = u.id)
            WHERE 
            t.id_usuario = :id_usuario
            OR
            t.id_usuario in 
            (SELECT id_usuario_seguindo from usuarios_seguidores WHERE  
            id_usuario = :id_usuario)
            ORDER BY 
            t.data DESC
            ";

            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id_usuario', $this->__get('id_usuario'));
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);

        }

        public function getPorPagina($limit, $offset){

            $query = "
            SELECT t.id, t.id_usuario, u.nome, t.tweet, 
            DATE_FORMAT(t.data, '%d/%m/%Y %H:%i') as data
            FROM tweets as t
            LEFT JOIN usuarios as u ON 
            (t.id_usuario = u.id)
            WHERE 
            t.id_usuario = :id_usuario
            OR
            t.id_usuario in 
            (SELECT id_usuario_seguindo from usuarios_seguidores WHERE  
            id_usuario = :id_usuario)
            ORDER BY 
            t.data DESC
            limit 
             $limit
            offset
             $offset
            ";

            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id_usuario', $this->__get('id_usuario'));
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);

        }

        public function getTotalRegistros(){

            $query = "
            SELECT COUNT(*) as total
            FROM tweets as t
            LEFT JOIN usuarios as u ON 
            (t.id_usuario = u.id)
            WHERE 
            t.id_usuario = :id_usuario
            OR
            t.id_usuario in 
            (SELECT id_usuario_seguindo from usuarios_seguidores WHERE  
            id_usuario = :id_usuario)
            ";

            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id_usuario', $this->__get('id_usuario'));
            $stmt->execute();

            return $stmt->fetch(\PDO::FETCH_ASSOC);

        }

    }

?>