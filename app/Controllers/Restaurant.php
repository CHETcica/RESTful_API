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
}


