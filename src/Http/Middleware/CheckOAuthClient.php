<?php

namespace TopDigital\Auth\Http\Middleware;

use Closure;

use Illuminate\Http\Request;
use Illuminate\Auth\Access\AuthorizationException;
use Laravel\Passport\Client;

class CheckOAuthClient
{

    /**
     * @param $request
     * @param Closure $next
     * @return mixed
     * @throws AuthorizationException
     */
    public function handle($request, Closure $next)
    {
        $this->validate($request);

        if(!$this->clientExists($request)){
            throw new AuthorizationException('Unauthorized.', 403);
        }

        return $next($request);
    }


    protected function validate(Request $request)
    {
        $request->validate([
            'client_id' => 'required',
            'client_secret' => 'required',
        ]);
    }

    protected function clientExists(Request $request)
    {
        return Client::whereKey($request->input('client_id'))
            ->where('secret', $request->input('client_secret'))
            ->exists();
    }
}
