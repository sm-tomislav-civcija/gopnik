<?php

namespace App\Model;


use App\Repository\GopnikVideoRepository;

class GopnikVideoModel
{
    /** @var GopnikVideoRepository */
    private $repo;


    public function __construct(GopnikVideoRepository $repository)
    {
        $this->repo = $repository;
    }


    public function getAllVideos()
    {
        $all_products = $this->repo->findAll();
        return $all_products;
        //moguce i return $this->repo->findAll();
    }

    public function getLastVideo()
    {
        $all_products = $this->repo->findAll();
        return $all_products[count($all_products) - 1];
    }

    public function getFirstVideo()
    {
        $all_products = $this->repo->findAll();
        return $all_products[0];
    }
    //nti - nth
    //5th, 6th - n = broj

//    public function getNthVideo($id){
//        $all_products = $this->repo->findAll();
//        return $all_products[$id-1];
//    }


    public function getNthVideo($id)
    {
        $criteria = array('id' => $id);
        $all_products = $this->repo->findBy($criteria);
        return $all_products;
    }


    /**
     * Returns filtered video by filter and value
     *
     * @param $column
     * @param $value
     * @return \App\Entity\GopnikVideo[]
     */
    public function getFilteredVideo($column, $value)
    {
        $criteria = [
            $column => $value];
        $all_products = $this->repo->findBy($criteria);
        return $all_products;
    }


}