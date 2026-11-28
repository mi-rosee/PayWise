@extends('layouts.employee')

@section('title', 'PayWise - My Profile')
@section('page_title', 'My Profile')

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Left Column: Read-Only Employment & Payout Summary -->
        <section class="bg-slate-900/90 rounded-2xl border border-slate-800 p-6 shadow-lg space-y-4 h-fit">
            <div class="flex items-center gap-3.5 pb-4 border-b border-slate-800">
                <div class="w-12 h-12 rounded-xl bg-emerald-500/15 border border-emerald-500/30 text-emerald-400 font-extrabold text-base flex items-center justify-center shrink-0">
                    {{ strtoupper(substr(auth()->user()->name ?? 'EM', 0, 2)) }}
                </div>
                <div>
                    <h2 class="text-sm font-bold text-white">{{ auth()->user()->name ?? 'Employee User' }}</h2>
                    <p class="text-xs text-slate-400">EMP-8492 &middot; Active</p>
                </div>
            </div>

            <dl class="space-y-3 text-xs">
                <div class="flex justify-between">
                    <dt class="text-slate-400">Department</dt>
                    <dd class="font-medium text-slate-200">Operations</dd>
                </div>
                <div class="flex justify-between">
                    <dt class="text-slate-400">Position</dt>
                    <dd class="font-medium text-slate-200">Staff Specialist</dd>
                </div>
                <div class="flex justify-between">
                    <dt class="text-slate-400">Pay Cycle</dt>
                    <dd class="font-medium text-slate-200">Semi-Monthly</dd>
                </div>
                <div class="flex justify-between">
                    <dt class="text-slate-400">Payout Channel</dt>
                    <dd class="font-mono text-emerald-400">Bank Transfer (•••• 4029)</dd>
                </div>
            </dl>
        </section>

        <!-- Right Column: Editable Contact & Password -->
        <div class="lg:col-span-2 space-y-6">
            <section class="bg-slate-900/90 rounded-2xl border border-slate-800 glow-emerald p-6">
                <h2 class="text-sm font-bold text-white mb-1">Contact &amp; Payout Details</h2>
                <p class="text-xs text-slate-400 mb-5">Keep your work contact information up to date for payroll notices.</p>

                <form method="POST" action="{{ route('employee.profile.update') }}" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="profile_name" class="block text-xs font-semibold text-slate-300 mb-1.5">Full Name</label>
                            <input
                                id="profile_name"
                                name="name"
                                type="text"
                                value="{{ old('name', auth()->user()->name ?? 'Employee User') }}"
                                class="w-full px-3.5 py-2.5 rounded-lg bg-slate-950 border border-slate-700 text-xs text-white focus:outline-none focus:border-emerald-400"
                            >
                        </div>
                        <div>
                            <label for="profile_email" class="block text-xs font-semibold text-slate-300 mb-1.5">Work Email</label>
                            <input
                                id="profile_email"
                                name="email"
                                type="email"
                                value="{{ old('email', auth()->user()->email ?? 'employee@paywise.local') }}"
                                class="w-full px-3.5 py-2.5 rounded-lg bg-slate-950 border border-slate-700 text-xs text-white focus:outline-none focus:border-emerald-400"
                            >
                        </div>
                    </div>

                    <div class="flex justify-end pt-2">
                        <button
                            type="submit"
                            class="px-4 py-2 rounded-lg bg-emerald-400 hover:bg-emerald-300 text-slate-950 text-xs font-bold transition-colors cursor-pointer"
                        >
                            Save changes
                        </button>
                    </div>
                </form>
            </section>

            <section id="security" class="bg-slate-900/90 rounded-2xl border border-slate-800 p-6">
                <h2 class="text-sm font-bold text-white mb-1">Change Password</h2>
                <p class="text-xs text-slate-400 mb-5">Use a strong password with at least 8 characters.</p>

                <form method="POST" action="{{ route('employee.profile.password') }}" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="new_password" class="block text-xs font-semibold text-slate-300 mb-1.5">New Password</label>
                            <input
                                id="new_password"
                                name="password"
                                type="password"
                                placeholder="Enter new password"
                                class="w-full px-3.5 py-2.5 rounded-lg bg-slate-950 border border-slate-700 text-xs text-white placeholder-slate-600 focus:outline-none focus:border-emerald-400"
                            >
                        </div>
                        <div>
                            <label for="new_password_confirmation" class="block text-xs font-semibold text-slate-300 mb-1.5">Confirm Password</label>
                            <input
                                id="new_password_confirmation"
                                name="password_confirmation"
                                type="password"
                                placeholder="Re-enter new password"
                                class="w-full px-3.5 py-2.5 rounded-lg bg-slate-950 border border-slate-700 text-xs text-white placeholder-slate-600 focus:outline-none focus:border-emerald-400"
                            >
                        </div>
                    </div>

                    <div class="flex justify-end pt-2">
                        <button
                            type="submit"
                            class="px-4 py-2 rounded-lg bg-slate-800 hover:bg-slate-700 border border-slate-700 text-xs font-semibold text-white transition-colors cursor-pointer"
                        >
                            Update password
                        </button>
                    </div>
                </form>
            </section>
        </div>
    </div>
@endsection