<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\CatRequest;
use Illuminate\Support\Facades\Crypt;

class AjaxController extends Controller
{
    public function getCategories()
    {
        $categories = Category::all();
        $userData['categories'] = $categories;
        echo json_encode($userData);
        exit;
    }

    public function getProgress($requestID)
    {
        $requestID = Crypt::decryptString($requestID);
        $progress = CatRequest::where('id', $requestID)->first()->progress;
        $userData['progress'] = $progress;
        echo json_encode($userData);
        exit;
    }

    public function getRemark($requestID)
    {
        $requestID = Crypt::decryptString($requestID);
        $remark = CatRequest::where('id', $requestID)->first()->remark;
        $userData['remark'] = $remark;
        echo json_encode($userData);
        exit;
    }
}
