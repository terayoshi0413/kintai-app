{{-- resources/views/attendances/index.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-8 px-4">

    <h1 class="text-2xl font-bold mb-6">勤怠管理</h1>

    <div class="mb-6 flex items-center">
        <!-- 出勤ボタン -->
        <form action="{{ route('attendances.store') }}" method="POST" class="inline-block mr-3">
            @csrf
            <button type="submit"
                class="bg-gradient-to-r from-green-400 to-green-600 text-white font-bold py-3 px-6 rounded-full shadow-2xl
                       hover:from-green-500 hover:to-green-700 transform transition duration-300 hover:-translate-y-2 hover:scale-110">
                出勤
            </button>
        </form>

        <!-- 退勤ボタン -->
        @if($lastAttendance && $lastAttendance->clock_out === null)
            <form action="{{ route('attendances.update', ['attendance' => $lastAttendance->id]) }}" method="POST" class="inline-block">
                @csrf
                @method('PATCH')
                <button type="submit"
                    class="bg-gradient-to-r from-red-400 to-red-600 text-white font-bold py-3 px-6 rounded-full shadow-2xl
                           hover:from-red-500 hover:to-red-700 transform transition duration-300 hover:-translate-y-2 hover:scale-110">
                    退勤
                </button>
            </form>
        @endif
    </div>

    {{-- 勤怠履歴 --}}
    <h2 class="text-xl font-semibold mb-3">勤怠履歴</h2>
    <div class="overflow-x-auto">
        <table class="w-full border border-gray-300 rounded-lg">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-4 py-2 text-left">出勤時刻</th>
                    <th class="border px-4 py-2 text-left">退勤時刻</th>
                </tr>
            </thead>
            <tbody>
                @forelse($attendances as $attendance)
                    <tr class="odd:bg-white even:bg-gray-50">
                        <td class="border px-4 py-2">{{ $attendance->clock_in }}</td>
                        <td class="border px-4 py-2">{{ $attendance->clock_out ?? '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="border px-4 py-2 text-center text-gray-500">
                            勤怠データはまだありません
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection