<?php

namespace App\Http\Controllers;

use App\Models\Alert;
use Illuminate\Http\Request;

class AlertController extends Controller
{
    public function index()
    {
        $alerts = Alert::all();

        return view('alerts.list', ["alerts" => $alerts]);
    }

    public function change(Request $request)
    {
        if($request->has('id')){
            echo $request->query('id');
            $alert = Alert::find($request->query('id'));

            $alert->enabled = !$alert->enabled;
            $alert->save();
        }
        return redirect()->route('alerts.list');
    }

    public function delete(Request $request)
    {
        if($request->has('id')){
            echo $request->query('id');
            $alert = Alert::find($request->query('id'));

            $alert->delete();
        }
        return redirect()->route('alerts.list');
    }

    public function insert(Request $request)
    {
        Alert::create([
            "name" => $request->name,
            "email" => $request->email,
            "enabled" => true
        ]);

        return redirect()->route('alerts.list');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Alert $alert)
    {
        //
    }

    public function edit(Alert $alert)
    {
        //
    }

    public function update(Request $request, Alert $alert)
    {
        //
    }

    public function destroy(Alert $alert)
    {
        //
    }
}
