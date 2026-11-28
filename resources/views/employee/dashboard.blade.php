@extends('layouts.employee')

@section('title', 'PayWise - My Dashboard')
@section('page_title', 'My Dashboard')

@section('content')
    <div class="space-y-4">
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div class="bg-slate-900/90 rounded-2xl border border-slate-800 p-5 shadow-lg">
                <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-400">Current Pay Period</p>
                <p class="text-lg font-bold text-white mt-1.5">Nov 1 – Nov 15, 2026</p>
            </div>
            <div class="bg-slate-900/90 rounded-2xl border border-slate-800 p-5 shadow-lg">
                <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-400">Latest Net Pay</p>
                <p class="text-lg font-bold text-emerald-400 mt-1.5 font-mono">₱{{ number_format($lastNetPay ?? 18450, 2) }}</p>
            </div>
            <div class="bg-slate-900/90 rounded-2xl border border-slate-800 p-5 shadow-lg">
                <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-400">Leave Balance</p>
                <p class="text-lg font-bold text-white mt-1.5">{{ $leaveBalance ?? 10 }} Days Remaining</p>
            </div>
        </div>
    </div>
@endsection