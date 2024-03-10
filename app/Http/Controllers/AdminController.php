<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()  
    {
        $users = User::where('role', 'user')->get();
        return view('admin.dashboard', compact('users'));
    }
    public function toggleAccess(User $user)
    {
        $user->update(['access' => !$user->access]);
        return redirect()->back()->with('success', 'Access toggled successfully.');
    }

    public function events()
    {
        $events = Event::all();
        return view('admin.events', compact('events'));
    }
    
    public function validateEvent(Event $event)
    {
        if ($event->status === 'accepted') {
            $event->status = 'rejected';
        } else {
            $event->status = 'accepted';
        }
    
        $event->save();
        return back()->with('success', 'Event validated successfully.');
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
