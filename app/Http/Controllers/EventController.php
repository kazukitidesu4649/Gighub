<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'title' => 'required|string|max:255',
            'open' => 'nullable',
            'start' => 'nullable',
            'ticket' => 'nullable|integer',
            'stream_ticket' => 'nullable|integer',
            'stream_url' => 'nullable|url',
            'status' => 'required|in:決定,NG,オファー中'
        ]);

        Event::create($request->all());

        return redirect()->route('events.index')->with('success', 'イベントを作成しました');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($eventId)
    {
        $event = Event::findOrFail($eventId);
        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'date' => 'required|date',
            'title' => 'required|string|max:255',
            'open' => 'nullable',
            'start' => 'nullable',
            'ticket' => 'nullable|integer',
            'stream_ticket' => 'nullable|integer',
            'stream_url' => 'nullable|url',
            'status' => 'required|in:決定,NG,オファー中'
        ]);

        $event->update($request->all());

        return redirect()->route('events.index')->with('success', 'イベントを更新しました');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('events.index')->with('success', 'イベントを削除しました');
    }
}
