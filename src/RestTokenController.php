<?php

namespace KalebClark\RestToken;

use App\Http\Controllers\Controller;
use KalebClark\RestToken\RestTokensModel;

class RestTokenController extends Controller {

    public function __construct()
    {
        // Instantiate
    }

    public function index()
    {
//        $rt = new RestTokensModel();
//        $rt->username = "Test00";
//        $rt->token  = "asl;kjasd;flkj3;lk3jl3kj3";
//        $rt->active = 1;
 //       $rt->save();
        $tokens = RestTokensModel::all();
        return view('RestToken::admin')->with('tokens', $tokens);
    }
}
