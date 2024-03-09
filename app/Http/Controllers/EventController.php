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
        $organizator = Auth::user();
        $events = $organizator->events;
        return view('organizator.dashboard', compact('events'));
    }
    public function showEvent()
    {
        $events = Event::where('status', 'accepted')->paginate(6);
        $categories = Category::all();
        return view('user.dashboard', compact('events','categories'));
    }
    public function search(Request $request)
    {
        $searchTerm = $request->input('title');
        $categories = Category::all();
        $events = Event::where('title', 'LIKE', "%{$searchTerm}%")->paginate(6);
    
        return view('user.dashboard', compact('events','categories'));
    }
    
    
    public function filterByCategory(Request $request)
    {   $categories = Category::all();
        $categoryId = $request->input('category');
        $events = Event::query()->where('status', 'accepted');

        if ($categoryId) {
            $events->whereHas('category', function ($query) use ($categoryId) {
                $query->where('id', $categoryId);
            });
        }


        $events = $events->paginate(10);

        return view('user.dashboard', compact('events','categories'));

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
        return redirect()->route('organizator.organdashboard')->with('success', 'Event created successfully.');;
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::findOrFail($id);
        return view('organizator.event', compact('event'));
    }
    public function showForUser(string $id)
    {
        $event = Event::findOrFail($id);
        return view('user.read', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::all();
        $event = Event::findOrFail($id);
        return view('organizator.edit', compact('event', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $event = Event::findOrFail($id);
        $event->update([
            'title' => $request->input('title'),
            'date' => $request->input('date'),
            'location' => $request->input('location'),
            'nbr' => $request->input('nbr'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'category_id' => $request->input('category_id'),
        ]);
        return redirect()->route('organizator.organdashboard', $event->id)->with('success', 'Event successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect()->route('organizator.organdashboard');
    }
}
