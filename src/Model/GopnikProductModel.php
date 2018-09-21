<?php

namespace App\Model;


use App\Repository\GopnikProductRepository;

class GopnikProductModel
{

    /** @var GopnikProductRepository */
    private  $repo;


    public function __construct(GopnikProductRepository $repository)
    {
        $this->repo = $repository;
    }


    public function getAllProducts(){
        $all_products = $this->repo->findAll();
        return $all_products;
        //moguce i return $this->repo->findAll();
    }

}