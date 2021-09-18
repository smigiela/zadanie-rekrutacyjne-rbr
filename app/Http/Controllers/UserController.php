<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Http::get('https://jsonplaceholder.typicode.com/users')->collect();

        foreach($users as $user){
            // tworzę lub edytuję użytkownika
            $u = User::updateOrCreate(
                ['id' => $user['id']],
                [
                    'name' => $user['name'],
                    'username' => $user['username'],
                    'email' => $user['email'],
                    'website' => $user['website'],
                    'phone' => $user['phone'],
                ]
            );

            // tworzę lub edytuję adres użytkownika zapisanego w relacji hasOne
            $address = $u->address()->updateOrCreate(
                ['user_id' => $user['id']],
                [
                    'street' => $user['address']['street'],
                    'suite' => $user['address']['suite'],
                    'city' => $user['address']['city'],
                    'zipcode' => $user['address']['zipcode'],
                ]
            );

            // tworzę lub edytuję współrzędne dla adresu zapisanego w bazie w relacji hasOne
            $address->geo()->updateOrCreate(
                ['address_id' => $address->id],
                [
                    'lat' => $user['address']['geo']['lat'],
                    'lng' => $user['address']['geo']['lng']
                ]
            );

            // tworzę lub edytuję firmę użytkownika w relacji hasOne
            $u->company()->updateOrCreate(
                ['user_id' => $user['id'],],
                [
                    'name' => $user['company']['name'],
                    'catchPhrase' => $user['company']['catchPhrase'],
                    'bs' => $user['company']['bs'],
                ]
            );
        }

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }
}
