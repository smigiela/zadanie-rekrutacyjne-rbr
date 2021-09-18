<?php

namespace App\Http\Controllers;

use App\Models\User;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class UserController extends Controller
{
    /**
     * Generuje wykres z 7 dni dla wszystkich użytkowników, pokazując ile opublikowali postów.
     *
     * Problem w tym, że api nie zwraca daty utworzenia posta, więc wszystkie daty utworzenia są jednakowe, z dnia
     * zassania ich z API.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Exception
     *
     */
    public function index()
    {
        $chart_options = [
            'chart_title' => 'Posts by user',
            'chart_type' => 'bar',
            'report_type' => 'group_by_relationship',
            'model' => 'App\Models\Post',
            'relationship_name' => 'user',
            'group_by_field' => 'username',
            'aggregate_function' => 'count',
            'filter_field' => 'created_at',
            'filter_days' => 7,
        ];

        $chart1 = new LaravelChart($chart_options);

        $users = User::with(['address', 'company'])->withCount('posts')->paginate(10);

        return view('users.index', compact('users', 'chart1'));
    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(User $user)
    {
        $user->load('address', 'address.geo', 'company')->loadCount('posts');

        return view('users.show', compact('user'));
    }
}
