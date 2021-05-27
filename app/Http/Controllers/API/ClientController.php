<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;
use App\Http\Resources\ClientCollection;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use function App\Sabaawy\responseJson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
//     ClientRequest $request
    public function register(ClientRequest $request)
    {
//         return 'sdfvbsdfb';
        $client = Client::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
        ]);

        return responseJson(1,'',new ClientResource($client));
    }

    public function login(Request $request)
    {
//        return $request->all();
        $credentials = $request->only(['email','password']);
         $token = Auth::guard('api')->attempt($credentials);
        if (!$token)
        {
            return responseJson('0','invalid user');
        }
//        $r = auth()->tokenById(1);
        $client = Auth::guard('api')->user();
//        return auth('api')->login($client);
        return responseJson('1', 'success',[
            'client' => new ClientResource($client),
            'token' => $token
        ]);
    }

    public function index(Request $request)
    {
        if ($request->client_id){
            $client =Client::find($request->client_id);
            return responseJson('1','',new ClientResource($client));
        }
        $client = Client::all();
        return responseJson(1,'',ClientResource::collection($client));
    }
}
