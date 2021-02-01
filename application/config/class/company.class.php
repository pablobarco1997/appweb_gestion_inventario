<?php

class company{

    var $id;
    var $nom;
    var $schema;
    var $email;
    var $entity;


    public function fetchCompany( $company )
    {

        if(is_object($_SESSION['company']) && $_SESSION['company']->rowid){

            $objetoCompany               = $company;

            $this->id                    = $objetoCompany->rowid;
            $this->nom                   = $objetoCompany->label;
            $this->entity                = $objetoCompany->entity;
            $this->schema                = $objetoCompany->schema;
            $this->email                 = $objetoCompany->email;

        }

    }


}

?>