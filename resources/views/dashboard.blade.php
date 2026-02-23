@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-8 px-4">

    <!-- ヘッダー部分 -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">ダッシュボード</h1>

        <!-- ログアウトボタン -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="bg-gray-500 text-white font-bold py-2 px-4 rounded hover:bg-gray-700 transition">
                ログアウト
            </button>
        </form>
    </div>

    <!-- ダッシュボードリンク -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <a href="{{ route('attendances.index') }}"
           class="block bg-gray-500 text-white font-bold py-6 px-4 rounded-lg shadow-lg
                  hover:bg-gray-700 transition transform hover:-translate-y-1 hover:scale-105 text-center">
            勤怠管理
        </a>

        <a href="{{ route('profile.edit') }}"
           class="block bg-gray-500 text-white font-bold py-6 px-4 rounded-lg shadow-lg
                  hover:bg-gray-700 transition transform hover:-translate-y-1 hover:scale-105 text-center">
            プロフィール編集
        </a>
    </div>
</div>
@endsection