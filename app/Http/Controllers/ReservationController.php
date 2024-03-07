<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function reserve($id)
    {
        $event = Event::findOrFail($id);
        $exist_Reservation = Reservation::where('event_id', $event->id)
            ->where('user_id', Auth::id())
            ->exists();

        if ($exist_Reservation) {
            return redirect()->back()->with('error', 'You have already booked a place for this event.');
        }

        if ($event->nbr <= 0) {
            return redirect()->back()->with('error', 'Sorry, there are no more seats available for this event.');
        }

        if ($event->mode === 'automatic') {
            $status = 'confirmed';
        } else {
            $status = 'pending';
        }

        $reservation = new Reservation();
        $reservation->event_id = $event->id;
        $reservation->status = $status;
        $reservation->user_id = Auth::id();
        $reservation->save();

        if ($event->mode === 'automatic') {
            $event->nbr -= 1;
            $event->save();
            return redirect()->route('user.userdash')->with('success', 'Your booking has been successfully registered.');
        } else {
            return redirect()->route('user.userdash')->with('success', 'Your reservation will be processed soon.');
        }
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
