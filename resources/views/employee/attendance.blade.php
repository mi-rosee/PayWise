@extends('layouts.employee')

@section('title', 'PayWise - My Attendance & Leave')
@section('page_title', 'My Attendance & Leave')

@section('content')
    <div class="space-y-6">
        <!-- Leave Summary Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div class="bg-slate-900/90 rounded-2xl border border-slate-800 p-5 shadow-lg">
                <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-400">Vacation Leave Balance</p>
                <p class="text-lg font-bold text-white mt-1.5">{{ $vacationBalance ?? 6 }} Days</p>
            </div>
            <div class="bg-slate-900/90 rounded-2xl border border-slate-800 p-5 shadow-lg">
                <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-400">Sick Leave Balance</p>
                <p class="text-lg font-bold text-emerald-400 mt-1.5">{{ $sickBalance ?? 4 }} Days</p>
            </div>
            <div class="bg-slate-900/90 rounded-2xl border border-slate-800 p-5 shadow-lg">
                <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-400">Pending Requests</p>
                <p class="text-lg font-bold text-amber-400 mt-1.5">{{ $pendingLeaves ?? 1 }} Request</p>
            </div>
        </div>

        <!-- Leave Requests Table -->
        <section class="bg-slate-900/90 rounded-2xl border border-slate-800 glow-emerald p-6">
            <div class="flex flex-wrap items-center justify-between gap-3 mb-4 pb-3 border-b border-slate-800">
                <div>
                    <h2 class="text-sm font-bold text-white">Leave Requests</h2>
                    <p class="text-xs text-slate-400 mt-0.5">Your submitted leave applications and approval status.</p>
                </div>

                <button
                    type="button"
                    onclick="openLeaveModal()"
                    class="px-4 py-2 rounded-lg bg-emerald-400 hover:bg-emerald-300 active:bg-emerald-500 text-slate-950 text-xs font-bold shadow-md shadow-emerald-500/15 transition-colors cursor-pointer flex items-center gap-2"
                >
                    <i class="fa-solid fa-plus"></i>
                    <span>File leave</span>
                </button>
            </div>

            <div class="overflow-x-auto border border-slate-800 rounded-xl bg-slate-950/60">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-900/90 border-b border-slate-800 text-[11px] font-semibold uppercase tracking-wider text-slate-400">
                            <th class="py-3 px-4">Leave Type</th>
                            <th class="py-3 px-4">Dates</th>
                            <th class="py-3 px-4">Days</th>
                            <th class="py-3 px-4">Status</th>
                        </tr>
                    </thead>
                    <tbody id="leave-requests-body" class="divide-y divide-slate-800/70 text-xs text-slate-300">
                        <tr class="hover:bg-slate-900/80 transition-colors">
                            <td class="py-3.5 px-4 font-medium text-white">Sick Leave</td>
                            <td class="py-3.5 px-4 text-slate-300">Nov 20, 2026</td>
                            <td class="py-3.5 px-4 font-mono text-slate-300">1.0</td>
                            <td class="py-3.5 px-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-amber-500/10 text-amber-400 border border-amber-500/30">
                                    Pending
                                </span>
                            </td>
                        </tr>
                        <tr class="hover:bg-slate-900/80 transition-colors">
                            <td class="py-3.5 px-4 font-medium text-white">Vacation Leave</td>
                            <td class="py-3.5 px-4 text-slate-300">Oct 12–13, 2026</td>
                            <td class="py-3.5 px-4 font-mono text-slate-300">2.0</td>
                            <td class="py-3.5 px-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-emerald-500/10 text-emerald-400 border border-emerald-500/30">
                                    Approved
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Attendance Logs Table -->
        <section class="bg-slate-900/90 rounded-2xl border border-slate-800 p-6">
            <div class="mb-4 pb-3 border-b border-slate-800">
                <h2 class="text-sm font-bold text-white">Attendance Logs</h2>
                <p class="text-xs text-slate-400 mt-0.5">Recent attendance logs for the current pay period.</p>
            </div>

            <div class="overflow-x-auto border border-slate-800 rounded-xl bg-slate-950/60">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-900/90 border-b border-slate-800 text-[11px] font-semibold uppercase tracking-wider text-slate-400">
                            <th class="py-3 px-4">Date</th>
                            <th class="py-3 px-4">Hours Logged</th>
                            <th class="py-3 px-4">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800/70 text-xs text-slate-300">
                        <tr class="hover:bg-slate-900/80 transition-colors">
                            <td class="py-3.5 px-4 font-medium text-white">Nov 15, 2026</td>
                            <td class="py-3.5 px-4 font-mono text-slate-300">8.0 hrs</td>
                            <td class="py-3.5 px-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-emerald-500/10 text-emerald-400 border border-emerald-500/30">
                                    Present
                                </span>
                            </td>
                        </tr>
                        <tr class="hover:bg-slate-900/80 transition-colors">
                            <td class="py-3.5 px-4 font-medium text-white">Nov 14, 2026</td>
                            <td class="py-3.5 px-4 font-mono text-slate-300">8.0 hrs</td>
                            <td class="py-3.5 px-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-emerald-500/10 text-emerald-400 border border-emerald-500/30">
                                    Present
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </div>

    <!-- File Leave Modal -->
    <div id="leave-modal" class="fixed inset-0 bg-slate-950/75 backdrop-blur-sm hidden items-center justify-center p-4 z-50">
        <div class="bg-slate-900 rounded-2xl border border-slate-700 max-w-md w-full p-6 shadow-2xl glow-emerald space-y-4">
            <div class="flex items-center justify-between border-b border-slate-800 pb-3.5">
                <div>
                    <h2 class="text-base font-bold text-white">File Leave Request</h2>
                    <p class="text-xs text-slate-400 mt-0.5">Submit dates and reason for HR / manager review.</p>
                </div>
                <button type="button" onclick="closeLeaveModal()" class="text-slate-400 hover:text-emerald-400 text-sm transition-colors">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <form method="POST" action="{{ route('employee.leave.store') }}" class="space-y-4">
                @csrf

                <div>
                    <label for="leave_type" class="block text-xs font-semibold text-slate-300 mb-1.5">Leave Type</label>
                    <select
                        id="leave_type"
                        name="leave_type"
                        required
                        class="w-full px-3.5 py-2.5 rounded-lg bg-slate-950 border border-slate-700 text-xs text-white focus:outline-none focus:border-emerald-400"
                    >
                        <option value="Vacation Leave">Vacation Leave</option>
                        <option value="Sick Leave">Sick Leave</option>
                        <option value="Emergency Leave">Emergency Leave</option>
                    </select>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div>
                        <label for="start_date" class="block text-xs font-semibold text-slate-300 mb-1.5">Start Date</label>
                        <input
                            id="start_date"
                            name="start_date"
                            type="date"
                            required
                            class="w-full px-3.5 py-2.5 rounded-lg bg-slate-950 border border-slate-700 text-xs text-white focus:outline-none focus:border-emerald-400"
                        >
                    </div>
                    <div>
                        <label for="end_date" class="block text-xs font-semibold text-slate-300 mb-1.5">End Date</label>
                        <input
                            id="end_date"
                            name="end_date"
                            type="date"
                            required
                            class="w-full px-3.5 py-2.5 rounded-lg bg-slate-950 border border-slate-700 text-xs text-white focus:outline-none focus:border-emerald-400"
                        >
                    </div>
                </div>

                <div>
                    <label for="reason" class="block text-xs font-semibold text-slate-300 mb-1.5">Reason (Optional)</label>
                    <textarea
                        id="reason"
                        name="reason"
                        rows="2"
                        placeholder="Add brief notes for your approver..."
                        class="w-full px-3.5 py-2 rounded-lg bg-slate-950 border border-slate-700 text-xs text-white placeholder-slate-600 focus:outline-none focus:border-emerald-400"
                    ></textarea>
                </div>

                <div class="flex justify-end gap-2 pt-3 border-t border-slate-800/80">
                    <button
                        type="button"
                        onclick="closeLeaveModal()"
                        class="px-4 py-2 rounded-lg border border-slate-700 bg-slate-800 text-xs font-semibold text-slate-200 hover:bg-slate-700 hover:text-white transition-colors"
                    >
                        Cancel
                    </button>
                    <button
                        type="submit"
                        class="px-4 py-2 rounded-lg bg-emerald-400 hover:bg-emerald-300 text-slate-950 text-xs font-bold transition-colors cursor-pointer"
                    >
                        Submit request
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    function openLeaveModal() {
        const modal = document.getElementById('leave-modal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeLeaveModal() {
        const modal = document.getElementById('leave-modal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }
</script>
@endpush