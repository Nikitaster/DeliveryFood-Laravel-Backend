<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Accounts;
use App\Roles;
use App\User;

use App\Http\Requests\CouriersRegistrationRequest;
use Illuminate\Support\Facades\Hash;

class CouriersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role_courier_obj = Roles::where('name', '=', 'courier')->first()->id;
        return view('couriers.index', ['couriers' => Accounts::where('role_id', '=', $role_courier_obj)
            ->orderBy('id', 'asc')
            ->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('couriers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CouriersRegistrationRequest $request)
    {
        $user_obj = NULL;

        try {    
            $params = $request->only('name', 'email', 'password');
            $params['password'] = Hash::make($params['password']);

            $user_obj = User::create($params);

        } catch (Exception $e) {
            abort(500, 'Ошибка при создании курьера!');
        }

        if ($user_obj) {
            try{
                $params = $request->only('FIO', 'address', 'phone');
                $params['user_id'] = $user_obj->id;
                $params['role_id'] = Roles::where('name', '=', 'courier')->first()->id;

                Accounts::create($params);
            } catch (Exception $e) {
                $user_obj->delete();
                abort(500, 'Ошибка при создании курьера!');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $account = Accounts::find($id);
        $account->user->delete();
        return redirect(route('couriers.index'));
    }
}
