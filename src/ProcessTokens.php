<?php

namespace KalebClark\RestTokens;

use Closure;
use \App;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use KalebClark\RestTokens\RestTokensModel;

class ProcessTokens
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Check if there is an api_key defined at all
        if(!$request->has('api_key')) {
            // No api_key defined. Abort with error.
            return response([
                'code'   => 'NO_KEY',
                'description' => 'Must have auth token'
            ]);
        } else {
            // Key found.
            $key_from_input = $request->input('api_key');
            try {
                $auth = RestTokensModel::where('token', '=', $key_from_input)
                    ->where('active', '=', 1)->firstOrFail();

                return $next($request);
            } catch(ModelNotFoundException $e) {
                // Model was not found. abort with error.
                return response([
                    'code'  => 'INVALID_KEY',
                    'description'   => 'Unauthorized Access'
                ]);
            }
        }
    }
}
