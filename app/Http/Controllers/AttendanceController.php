<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    // 勤怠一覧
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $attendances = $user->attendances()->latest()->get();
        $lastAttendance = $attendances->first(); // 最新の勤怠を取得

        return view('attendances.index', compact('attendances', 'lastAttendance'));
    }

    // 出勤登録
    public function store(Request $request)
    {
        Attendance::create([
            'user_id' => Auth::id(),
            'clock_in' => now(),
        ]);

        return redirect()->back();
    }

    // 退勤登録
    public function update(Request $request, Attendance $attendance)
    {
        $attendance->update([
            'clock_out' => now(),
        ]);

        return redirect()->back();
    }
}