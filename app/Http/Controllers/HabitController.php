<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HabitController extends Controller
{
    public function index()
    {
        $habit = auth()->user()
            ->habit()
            ->latest()
            ->get();

        return view('habit.index', compact('habit'));
    }

    public function destroy(\App\Models\Habit $habit)
    {
        if ($habit->user_id !== auth()->id()) {
            abort(403);
        }

        $habit->delete();

        return back();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        try {
        auth()->user()->habit()->create([
            'name' => $request->name
        ]);

        } catch (\Exception $e) {

            auth()->user()->habit()->create([
                'habit' => $request->habit
            ]);

        }

        return redirect()->route('habit.index');
    }
}