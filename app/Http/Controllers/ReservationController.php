<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;

use Barryvdh\DomPDF\Facade\Pdf;
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

        $reservation = new Reservation();
        $reservation->event_id = $event->id;
        $reservation->user_id = Auth::id();

        if ($event->mode === 'automatic') {
            $status = 'confirmed';
            $reservation->status = $status;

            $event->nbr -= 1;
            $event->save();
            $reservation->save();
            return redirect()->route('user.userdash')->with('success', 'Your booking has been successfully registered.');
        } else {
            $status = 'pending';
            $reservation->status = $status;
            $reservation->save();
            return redirect()->route('user.userdash')->with('success', 'Your reservation will be processed soon.');
        }
    }
    public function Reservation()
    {
        $organizerId = Auth::id();

        $events = Event::where('user_id', $organizerId)->pluck('id');

        $reservations = Reservation::whereIn('event_id', $events)->where('status', 'pending')->get();

        $totalReservations = Reservation::count();
        $confirmedReservations = Reservation::where('status', 'confirmed')->count();
        $pendingReservations = Reservation::where('status', 'pending')->count();

        return view('organizator.reservation', compact('reservations', 'totalReservations', 'confirmedReservations', 'pendingReservations'));
    }
    public function confirmReservation($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->update(['status' => 'confirmed']);
        $reservation->event->nbr -= 1;
        $reservation->event->save();

        return redirect()->back()->with('success', 'Reservation confirmed successfully');
    }

    public function ticket($id)
    {
        $reservation = Reservation::findOrFail($id);

        return  view('user.ticket', compact('reservation'));
    }
    public function downloadTicket($id)
    {
        $reservation = Reservation::findOrFail($id);
        $pdf = PDF::loadView('user.ticket', compact('reservation'));

        // Télécharger le fichier PDF
        return $pdf->download('ticket_' . $reservation->id . '.pdf');
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
