<?php
include_once 'BuyRepository.php';
include_once 'TdcRepository.php';
include_once 'ExpenseRepository.php';

class Repository{
    public $buy;
    public $tdc;
    public $expense;

    function __construct(){        
        $this->buy = new BuyRepository();        
        $this->tdc = new TdcRepository();
        $this->expense = new ExpenseRepository();
    }    
}