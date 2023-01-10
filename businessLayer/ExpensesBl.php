<?php
include_once 'BuyBl.php';
include_once 'TdcBl.php';
include_once 'ExpenseBl.php';
include_once '../models/Repository.php';

class ExpensesBl{
    public $buy;
    public $tdc;
    public $expense;

    private $repository;

    function __construct(){
        $this->repository = new Repository();

        $this->buy = new BuyBl($this->repository);
        $this->tdc = new TdcBl($this->repository);
        $this->expense = new ExpenseBl($this->repository);
    }
}