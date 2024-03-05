<?php

namespace App\Http\Controllers;

use App\Http\Requests\Eventrequest;
use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('organizator.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventRequest $request)
    {
        $eventData = $request->validated();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filePath = $image->store('public/uploads');
            $fileName = explode("/", $filePath);
            $eventData["image"] = $fileName[2];
        } else {
            $eventData["image"] = 'event.png';
        }

        $eventData['user_id'] = Auth::id();

        $event = Event::create($eventData);
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
