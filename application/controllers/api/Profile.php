<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;

class Profile extends REST_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('M_Profile','Profile');
    }
    public function profile_get(){
        
        $id = $this->get('id');
        if ($id === null){
            $this->response([
                'status' => false,
                'message' => 'masukkan id'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
        else{
            $profile = $this->Profile->get_profile($id);
            if($profile){
                $this->response([
                    'status' => true,
                    'data' => $profile
                ], REST_Controller::HTTP_OK);
            }
            else{
                $this->response([
                    'status' => false,
                    'message' => 'id tidak ditemukan'
                ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
        
    }
}


?>