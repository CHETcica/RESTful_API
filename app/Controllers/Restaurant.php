<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\RestaurantModel;

class Restaurant extends ResourceController{
    use ResponseTrait;
    protected $modelName = 'App\Models\RestaurantModel';
    protected $format = 'json';

    // Get all restaurant
    public function index()
    {
        $model = new RestaurantModel();
        $data['restaurants'] = $this->model->findAll();
        return $this->respond($data);
    }
    // Get restaurant By id
    public function show($id = null)
    {
        $data = $this->model->getWhere(['id'=> $id])->getResult();
        if($data){
            return $this->respond($data);
        }
        else{
            return $this->failNotFound('No Restaurant found with id :'.$id);
        }
        
    }
}


