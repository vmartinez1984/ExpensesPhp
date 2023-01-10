<?php

class TdcBl
{
    private $repository;

    function __construct($repository)
    {
        $this->repository = $repository;
    }

    function get_by_id($tdcId)
    {
        $tdc = $this->repository->tdc->get_by_id($tdcId);

        return $tdc;
    }

    function get_all()
    {
        $entities = $this->repository->tdc->get_all();
        $dtos =  array();

        //set day pay
        $datePay = getdate();
        foreach ($entities as $row) {
            $datePay['mday'] = $row['DayCut'] + 20;
            $row['DatePay'] = mktime(0, 0, 0, $datePay['mon'], $datePay['mday'], $datePay['year']);
            $row['DatePay'] = date('d/m/Y', $row['DatePay']);
            array_push($dtos,$row);
        }
        
        return $dtos;
    }
}
