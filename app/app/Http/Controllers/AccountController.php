<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\AccountEditRequest;
use App\Accounts;

class AccountController extends Controller
{
    public function update(AccountEditRequest $request, $id) {
        $account = Accounts::find($id);
        if ($account->id != Auth::user()->account->id) {
            echo $account->id . Auth::user()->account->id;
            abort('403');
        }
        $params = $request->only('FIO', 'phone', 'address');
        $account->update($params);
        return redirect(route('home'));
    }
}
