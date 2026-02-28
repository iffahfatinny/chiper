<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use Illuminate\Http\Request;

use App\Http\Controllers\ChirpController;

class ChirpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chirps = Chirp::with('user')->latest()->take(50)->get();
        return view('home',['chirps' => $chirps]);
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
    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'message' => 'required|string|max:255|min:5',
    //     ], [
    //         'message.required' => 'Please write something to chirp!',
    //         'message.max' => 'Chirps must be 255 characters or less.',
    //     ]);

    //     \App\Models\Chirp::create([
    //         'message' => $validated['message'],
    //         'user_id' => null,
    //     ]);

    //     return redirect('/')->with('success', 'Your chirp has been posted!');
    // }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id)
    // {
        
    //     // We'll add authorization in lesson 11
    //     return view('chirps.edit', compact('chirp'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, string $id)
    // {
    //     // Validate
    //     $validated = $request->validate([
    //         'message' => 'required|string|max:255',
    //     ]);
    
    //     // Update
    //     $chirp->update($validated);
    
    //     return redirect('/')->with('success', 'Chirp updated!');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(string $id)
    // {
    //     $chirp->delete();
 
    //     return redirect('/')->with('success', 'Chirp deleted!');
    // }


    // public function edit(Chirp $chirp)
    // {
    //     // We'll add authorization in lesson 11
    //     return view('chirps.edit', compact('chirp'));
    // }

    // public function update(Request $request, Chirp $chirp)
    // {
    //     // Validate
    //     $validated = $request->validate([
    //         'message' => 'required|string|max:255',
    //     ]);

    //     // Update
    //     $chirp->update($validated);

    //     return redirect('/')->with('success', 'Chirp updated!');
    // }

    // public function destroy(Chirp $chirp)
    // {
    //     $chirp->delete();

    //     return redirect('/')->with('success', 'Chirp deleted!');
    // }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        // Use the authenticated user
        auth()->user()->chirps()->create($validated);

        return redirect('/')->with('success', 'Your chirp has been posted!');
    }

    public function edit(Chirp $chirp)
    {
        $this->authorize('update', $chirp);

        return view('chirps.edit', compact('chirp'));
    }

    public function update(Request $request, Chirp $chirp)
    {
        // if ($request->user()->cannot('update', $chirp)) {
        //     abort(403);
        // }
        $this->authorize('update', $chirp);

        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $chirp->update($validated);

        return redirect('/')->with('success', 'Chirp updated!');
    }

    public function destroy(Chirp $chirp)
    {
        $this->authorize('delete', $chirp);

        $chirp->delete();

        return redirect('/')->with('success', 'Chirp deleted!');
    }
}
