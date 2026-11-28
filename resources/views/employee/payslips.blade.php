@extends('layouts.employee')

@section('title', 'PayWise - My Payslips')
@section('page_title', 'My Payslips')

@section('content')
    <section class="bg-slate-900/90 rounded-2xl border border-slate-800 glow-emerald p-6">
        <div class="flex flex-wrap items-center justify-between gap-4 mb-5 pb-4 border-b border-slate-800">
            <p class="text-xs text-slate-400">Your payslip history. You only see your own records.</p>

            <button
                type="button"
                onclick="openPayslipModal('Nov 1–15, 2026', '₱18,450.00', 'Available')"
                class="px-4 py-2 rounded-lg bg-emerald-400 hover:bg-emerald-300 active:bg-emerald-500 text-slate-950 text-xs font-bold shadow-md shadow-emerald-500/15 transition-colors cursor-pointer flex items-center gap-2"
            >
                <i class="fa-regular fa-file-lines"></i>
                <span>View payslip</span>
            </button>
        </div>

        <div class="overflow-x-auto border border-slate-800 rounded-xl bg-slate-950/60">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-900/90 border-b border-slate-800 text-[11px] font-semibold uppercase tracking-wider text-slate-400">
                        <th class="py-3 px-4">Period</th>
                        <th class="py-3 px-4">Net pay</th>
                        <th class="py-3 px-4">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/70 text-xs text-slate-300">
                    <tr onclick="openPayslipModal('Nov 1–15, 2026', '₱18,450.00', 'Available')" class="hover:bg-slate-900/80 cursor-pointer transition-colors group">
                        <td class="py-3.5 px-4 font-medium text-white group-hover:text-emerald-400 transition-colors">Nov 1–15</td>
                        <td class="py-3.5 px-4 font-mono text-emerald-400">₱18,450.00</td>
                        <td class="py-3.5 px-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-emerald-500/10 text-emerald-400 border border-emerald-500/30">
                                Available
                            </span>
                        </td>
                    </tr>
                    <tr onclick="openPayslipModal('Oct 16–31, 2026', '₱18,450.00', 'Available')" class="hover:bg-slate-900/80 cursor-pointer transition-colors group">
                        <td class="py-3.5 px-4 font-medium text-white group-hover:text-emerald-400 transition-colors">Oct 16–31</td>
                        <td class="py-3.5 px-4 font-mono text-emerald-400">₱18,450.00</td>
                        <td class="py-3.5 px-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-emerald-500/10 text-emerald-400 border border-emerald-500/30">
                                Available
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Payslip Preview Modal -->
    <div id="payslip-modal" class="fixed inset-0 bg-slate-950/75 backdrop-blur-sm hidden items-center justify-center p-4 z-50">
        <div class="bg-slate-900 rounded-2xl border border-slate-700 max-w-md w-full p-6 shadow-2xl glow-emerald space-y-4">
            <div class="flex items-center justify-between border-b border-slate-800 pb-3.5">
                <div>
                    <h2 class="text-base font-bold text-white">Payslip Details</h2>
                    <p id="modal-period" class="text-xs text-slate-400 mt-0.5">Nov 1–15, 2026</p>
                </div>
                <button type="button" onclick="closePayslipModal()" class="text-slate-400 hover:text-emerald-400 text-sm transition-colors">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <div class="space-y-2.5 text-xs">
                <div class="flex justify-between py-2 border-b border-slate-800/80">
                    <span class="text-slate-400">Basic Pay</span>
                    <span class="font-mono font-medium text-slate-100">₱21,500.00</span>
                </div>
                <div class="flex justify-between py-2 border-b border-slate-800/80">
                    <span class="text-slate-400">Deductions (Tax / Contributions)</span>
                    <span class="font-mono font-medium text-rose-400">-₱3,050.00</span>
                </div>
                <div class="flex justify-between pt-2.5 text-sm font-bold text-white">
                    <span>Net Pay</span>
                    <span id="modal-net-pay" class="font-mono text-emerald-400">₱18,450.00</span>
                </div>
            </div>

            <div class="flex justify-end gap-2 pt-3 border-t border-slate-800/80">
                <button type="button" onclick="closePayslipModal()" class="px-4 py-2 rounded-lg border border-slate-700 bg-slate-800 text-xs font-semibold text-slate-200 hover:bg-slate-700 hover:text-white transition-colors">
                    Close
                </button>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    function openPayslipModal(period = 'Nov 1–15, 2026', netPay = '₱18,450.00', status = 'Available') {
        document.getElementById('modal-period').innerText = `${period} · ${status}`;
        document.getElementById('modal-net-pay').innerText = netPay;
        const modal = document.getElementById('payslip-modal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closePayslipModal() {
        const modal = document.getElementById('payslip-modal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }
</script>
@endpush