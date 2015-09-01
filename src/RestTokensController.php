<?php

namespace KalebClark\RestTokens;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use KalebClark\RestTokens\RestTokensModel;

class RestTokensController extends Controller {


    public function __construct()
    {
        // Instantiate
    }

    public function index()
    {
        //TODO: Some stuff.
        $tokens = RestTokensModel::all();

        // No tokens exist, redirec to creation.
        if(!count($tokens)) {
            return redirect('/rest-tokens/new');
        }
        return view('RestTokens::list')->with('tokens', $tokens);
    }

    public function createToken()
    {
        $max = ceil(32 / 32);
        $random = "";
        for ($i = 0; $i < $max; $i++) {
            $random .= md5(microtime(true).mt_rand(10000,90000));
        }
        return $random;
    }
    public function newToken()
    {
        $random = $this->createToken();
        return view('RestTokens::create')->with('token', $random);
    }

    public function activate($id) {
        $token = RestTokensModel::find($id);
        $token->active = !$token->active;
        $token->save();

        if($token->active) { $retVal = 1; } else { $retVal = 0; }
        return $retVal;
    }

    public function create(Request $request)
    {
        $token = new RestTokensModel();
        $token->username = $request->input('username');
        $token->token = $request->input('token');
        $token->email_address = $request->input('email_address');
        $token->active = $request->input('active');
        $token->save();
        return redirect('/rest-tokens');
    }

    public function delete($id)
    {
        //$token = RestTokensModel::findOrNew($id);
        $token = RestTokensModel::find($id);
        $token->delete();
        return $token;
    }
}
