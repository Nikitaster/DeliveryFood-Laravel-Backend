<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Restaurants;
use App\Accounts;
use App\Roles;
use App\User;
use App\Managers;

use Illuminate\Support\Facades\Hash;

use App\Http\Requests\ManagersRequest;

class ManagersController extends Controller
{

    public function index() 
    {
        // 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Restaurants $rest = NULL)
    {
        return view('managers.create', ['restaurants' => Restaurants::all(),
                                        'curr_restaurant' => $rest,
                                        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ManagersRequest $request)
    {
        try {
            $user = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
            ]);
        } catch (Exception $e) {
            abort(500, 'Ошибка при создании менеджера!');
        }

        try {
            $account = Accounts::create([
                'user_id' => $user->id,
                'role_id' => Roles::where('name', '=', 'manager')->first()->id,
            ]);
        } catch (Exception $e) {
            $user->delete();
            abort(500, 'Ошибка при создании менеджера!');
        }

        try {
            $manager = Managers::create([
                'account_id' => $account->id,
                'restaurant_id' => Restaurants::where('name', '=', $request['restaurant'])->first()->id,
            ]);
        } catch (Exception $e) {
            $user->delete();
            $account->delete();
            abort(500, 'Ошибка при создании менеджера!');
        }

        return redirect(route('managers.show', $manager->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Managers $manager)
    {
        return view('managers.show', ['manager' => $manager]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Managers $manager)
    {
        $manager->account->user->delete();
        $manager->account->delete();
        $manager->delete();
        return redirect(route('restaurants.index'));
    }
}
