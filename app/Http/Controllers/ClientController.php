<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Mail\ClientShip;
use App\Models\Clinet;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ClientController extends Controller
{
    public function create(ClientRequest $request)
    {
        $validated = $request->validated();
        $client = new Clinet;
        $client->name = $request->input('name');
        $client->email = $request->input('email');
        $client->phone = $request->input('phone');
        $body = 'Письмо пришло после регистрации ' . $request->input('name') . ', Почта: ' . $request->input('email');
        $client->save();
        Mail::to(env("MAIL_TO", 'admin@youcompany.ru'))->send(new ClientShip($body));
        return response()->json(["message" => 'Saved successfully']);
    }

}
