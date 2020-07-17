<?php


namespace App\Model;


use App\Entity\User;
use phpDocumentor\Reflection\Types\AbstractList;
use phpDocumentor\Reflection\Types\Array_;

//use App\Model\User;

class Table
{
    private $Rows;

    function __construct()
    {
        $this->Rows = array();
    }

    public function addRecord($item): self {
        array_push($this->Rows, $item);
        return $this;
    }

    public function getRecords(){
        return $this->Rows;
    }
}