<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(){
        return "Index is Index";
    }

    public function create(){
        return "Create is created";
    }

    public function show(){
        return "Show is showing";
    }

    public function delete(){
        return "Delete is deleted";
    }

    public function success(){
        return "Success is successfully";
    }
}
