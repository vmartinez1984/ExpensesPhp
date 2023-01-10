<?php

class ExpenseBl{
    private $repository;

    function __construct($repository)    {
        $this->repository = $repository;
    }

    function get_by_id($expenseId){
        $expense= null;

        $expense = $this->repository->expense->get_by_id($expenseId);

        return $expense;
    }

    function delete($expenseId){
        $this->repository->expense->delete($expenseId);
    }
}