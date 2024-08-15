<?php

    namespace SV\Model;

    abstract class Model{

        protected $db;

        public function __construct(\PDO $db)
        {
            $this->db = $db;
        }

    }

?>