<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Habit;
use App\Models\HabitLog;
use Carbon\Carbon;

class HabitController extends Controller
{
    public function index() {
        $habits = Habit::where('user_id', auth()->id())->get();

        return view('habits.index', compact('habits'));
    }

    public function store(Request $req) {
        Habit::create([
            'user_id' => auth()->id(),
            'name' => $req->name
        ]);

        return back();
    }

    public function toggle($id) {
        $today = Carbon::today()->toDateString();

        $log = HabitLog::where('habit_id', $id)
            ->where('date', $today)
            ->first();

        if ($log) {
            $log->delete();
        } else {
            HabitLog::create([
                'habit_id' => $id,
                'date' => $today,
                'done' => true
            ]);
        }

        return back();
    }
}
