<?php

namespace Sena\controllers;

use Sena\libs\Controller;

class UsersController extends Controller{
    public function __construct(){}
    
    public function index(){
        $this->view('users/index','app');
    }
}