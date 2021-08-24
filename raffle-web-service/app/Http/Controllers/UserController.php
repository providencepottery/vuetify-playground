<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\User as UserResource;
use App\Http\Resources\UserCollection;
use App\Models\User;

class UserController extends Controller
{
    public function index($raffle_qty) {
        if($raffle_qty < 1) {
            $this->errorReturn('Raffle size must be at least one');
        }
        return new UserCollection(DB::table('ousers')
                                    ->inRandomOrder()
                                    ->take($raffle_qty)
                                    ->get());
    }

    public function errorReturn($msg) {
        die(json_encode([
            'error' => $msg
        ]));
    }
}
