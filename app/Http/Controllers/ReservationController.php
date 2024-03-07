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
    public function index()
    {
    }
    public function reserve($id)
    {
        $event = Event::findOrFail($id);
        if ($event->mode === 'automatic') {
            $exist_Reservation = Reservation::where('event_id', $event->id)
                ->where('user_id', Auth::id())
                ->exists();

            if ($exist_Reservation) {
                return redirect()->back()->with('error', 'You have already booked a place for this event.');
            }

            if ($event->nbr <= 0) {
                return redirect()->back()->with('error', 'Sorry, there are no more seats available for this event.');
            }
            $reservation = new Reservation();
            $reservation->event_id = $event->id;
            $reservation->user_id = Auth::id();
            $reservation->save();

            $event->nbr -= 1;
            $event->save();

            return redirect()->back()->with('success', 'Your booking has been successfully registered.')->with(compact('exist_Reservation'));

        } else {
            return redirect()->back()->with('success', 'Your reservation will be processed soon.');
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
