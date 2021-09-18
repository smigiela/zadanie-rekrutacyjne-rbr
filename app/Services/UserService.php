<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Http;

class UserService
{
    public function save_users_from_api(): void
    {
        try {
            $users = Http::get(config('app.json_api_url') . '/users')->collect();

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
        } catch (\Exception $exception) {
            info($exception->getMessage());
        }
    }
}
