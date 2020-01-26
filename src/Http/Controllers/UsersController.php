<?php

namespace TopDigital\Auth\Http\Controllers;

use Illuminate\Support\Str;
use TopDigital\Auth\Http\Requests\UpdateUserRequest;
use TopDigital\Auth\Http\Resources\UserCollection;
use TopDigital\Auth\Http\Resources\UserResource;
use TopDigital\Auth\Models\User;

class UsersController extends BaseController
{
    public function __construct()
    {
        \Auth::shouldUse('api');

        $this->authorizeResource(User::class);
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return new UserCollection(User::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UpdateUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UpdateUserRequest $request)
    {
        $user = new User();
        $user->fill($request->validated());
        $user->password = Str::random(10);
        $user->save();

        return response(
            UserResource::make($user)
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateUserRequest  $request
     * @param  \TopDigital\Auth\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());
        $user->refresh();

        return response(
            UserResource::make($user)
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \TopDigital\Auth\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
        }
        catch(\Exception $e) {
            return response()->json(['success' => false]);
        }

        return response()->json(['success' => true]);
    }

    /**
     * @return array
     */
    protected function resourceAbilityMap()
    {
        return array_merge(parent::resourceAbilityMap(), [
            'index' => 'index',
        ]);
    }
}
