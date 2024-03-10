<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class StatisticsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $active_Users= User::where('access', 1)->where('role','user')->count();
        $unactive_Users= User::where('access', 0)->where('role','user')->count();
        $organizatros= User::where('access', 1)->where('role','organizator')->count();
        $categories= Category::count();
        $events = Event::count();
        $Reservation = Reservation::count();
        return view('admin.stats',compact('active_Users','events','Reservation','organizatros','categories','unactive_Users'));
    }
    public function stats()
    {
        // $active_Users= User::where('access', 1)->where('role','user')->count();
        // $unactive_Users= User::where('access', 0)->where('role','user')->count();
        // $organizatros= User::where('access', 1)->where('role','organizator')->count();
        // $categories= Category::count();
        // $events = Event::count();
        // $Reservation = Reservation::count();
        return view('organizator.stats');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
