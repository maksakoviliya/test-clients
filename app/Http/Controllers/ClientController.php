<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ClientController extends Controller
{
    public function index(Request $request)
    {
//        dd($request->all());
        $sortBy = $request->get('sortBy');
        $sortDir = $request->get("sortOrder") ?? 'asc';
        $clients = Client::with('manager')->filter($request)->when($sortBy, function ($query) use ($sortBy, $sortDir) {
            return $query->orderBy($sortBy, $sortDir);
        })->paginate(10);
        return view('index', compact('clients'));
    }

    public function edit(Client $client)
    {
        $managers = User::all();
        return view('edit', compact('client', 'managers'));
    }

    public function update(Client $client, StoreClientRequest $request)
    {
        $client->update([
            'name' => $request->validated()['name'],
            'manager_id' => $request->validated()['manager_id'],
            'tags' => explode(',', $request->validated()['tags'])
        ]);
        $managers = User::all();
        Session::flash('message', 'Данные клиента успешно обновлены.');
        return view('edit', compact('client', 'managers'));
    }

    public function delete(Request $request)
    {
        try {
            $client = Client::find($request->id);
            $client->delete();
            return response()->json(['success']);
        } catch (\Exception $e) {
            return response()->json(['failure']);
        }
    }
}
