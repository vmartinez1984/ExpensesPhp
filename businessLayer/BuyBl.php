<?php
include_once '../models/Repository.php';

class BuyBl
{
    private $repository;

    function __construct()
    {
        $this->repository = new Repository();
    }

    function get_all($tdcId, $msi)
    {
        //echo $msi;
        $entities = null;
        $dtos =  array();
        $tdc = null;

        $entities = $this->repository->buy->get_all($tdcId, $msi);
        $tdc = $this->repository->tdc->get_by_id($tdcId);
        //print_r($tdc);

        $datePay = getdate();
        foreach ($entities as $row) {
            $datePay['mday'] =  $tdc['DayCut'] + 20;
            $row['DatePay'] = mktime(0, 0, 0, $datePay['mon'], $datePay['mday'], $datePay['year']);
            $row['DatePay'] = date('d/m/Y', $row['DatePay']);
            //$row['numberPay'] = ;
            //print_r($row);

            array_push($dtos, $row);
        }

        return $entities;
    }
}
