
<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PayWise - My Payslips</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            50: '#064e3b',
                            100: '#065f46',
                            600: '#10B981',
                            700: '#059669',
                            800: '#047857',
                        },
                        sidebar: {
                            bg: '#030712',
                            active: '#0e3b3a',
                            accent: '#2dd4bf',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #020617;
        }
        .glow-emerald {
            box-shadow: 0 0 25px rgba(16, 185, 129, 0.12);
        }
    </style>
</head>
<body class="bg-[#020617] text-slate-100 antialiased min-h-screen flex selection:bg-emerald-500 selection:text-slate-950">

    <!-- Left Sidebar -->
    <aside class="w-64 shrink-0 bg-sidebar-bg border-r border-slate-800/80 text-slate-300 flex flex-col justify-between min-h-screen select-none">
        <div>
            <!-- PayWise Gradient Wallet Logo -->
            <div class="px-5 pt-5 pb-6 flex items-center gap-2.5">
                <div class="w-8 h-8 rounded-lg bg-gradient-to-tr from-indigo-600 to-emerald-400 p-0.5 flex items-center justify-center shadow-lg shrink-0">
                    <div class="w-full h-full bg-slate-950 rounded-[6px] flex items-center justify-center">
                        <i class="fa-solid fa-wallet text-xs text-emerald-400"></i>
                    </div>
                </div>
                <span class="font-extrabold text-lg text-white tracking-tight">Pay<span class="text-emerald-400">Wise</span></span>
            </div>

            <!-- Primary Navigation -->
            <nav class="px-3 space-y-1.5 text-[13px]">
                <button
                    type="button"
                    id="nav-dashboard"
                    onclick="switchSection('dashboard')"
                    class="w-full flex items-center gap-2.5 px-3.5 py-2.5 rounded-lg text-slate-400 hover:bg-slate-900 hover:text-white border border-transparent transition-colors text-left"
                >
                    <span class="w-1.5 h-1.5 rounded-full bg-slate-600"></span>
                    <span>My Dashboard</span>
                </button>

                <button
                    type="button"
                    id="nav-payslips"
                    onclick="switchSection('payslips')"
                    class="w-full flex items-center gap-2.5 px-3.5 py-2.5 rounded-lg bg-emerald-500/10 text-emerald-400 border border-emerald-500/30 font-semibold transition-colors text-left"
                >
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                    <span>My Payslips</span>
                </button>

                <button
                    type="button"
                    id="nav-attendance"
                    onclick="switchSection('attendance')"
                    class="w-full flex items-center gap-2.5 px-3.5 py-2.5 rounded-lg text-slate-400 hover:bg-slate-900 hover:text-white border border-transparent transition-colors text-left"
                >
                    <span class="w-1.5 h-1.5 rounded-full bg-slate-600"></span>
                    <span>My Attendance &amp; Leave</span>
                </button>
            </nav>
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="flex-1 px-8 py-7 max-w-6xl bg-[#090d16]">
        <!-- Page Header -->
        <header class="mb-5 flex flex-wrap items-center justify-between gap-3">
            <div>
                <h1 id="page-title" class="text-2xl font-bold text-white tracking-tight">My Payslips</h1>
                <p id="page-subtitle" class="text-xs text-slate-400 mt-1">
                    <span id="active-role-label" class="text-emerald-400 font-semibold">Employee</span> &middot; Pay period: Nov 1 – Nov 15, 2026 &middot; Sample data
                </p>
            </div>
            <span class="px-3 py-1 bg-slate-900 border border-slate-800 rounded-lg text-xs text-slate-300 font-medium">
                ID: EMP-8492
            </span>
        </header>

        <!-- Tip Banner -->
        <div
            onclick="showTipToast()"
            role="button"
            tabindex="0"
            class="mb-5 px-4 py-3 rounded-xl bg-emerald-950/30 border border-emerald-500/30 text-emerald-300 text-xs font-medium cursor-pointer hover:bg-emerald-950/50 hover:border-emerald-400/50 transition-all flex items-center gap-2.5"
        >
            <i class="fa-solid fa-circle-info text-emerald-400 text-sm shrink-0"></i>
            <span>Tip: click any card, button, alert or menu item to see what's inside and what it does.</span>
        </div>

        <!-- SECTION: MY PAYSLIPS (Default Active) -->
        <section id="section-payslips" class="bg-slate-900/90 rounded-2xl border border-slate-800 glow-emerald p-6">
            <div class="flex flex-wrap items-center justify-between gap-4 mb-5 pb-4 border-b border-slate-800">
                <p class="text-xs text-slate-400">Your payslip history. You only see your own records.</p>

                <button
                    type="button"
                    onclick="openPayslipModal()"
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
                            <td class="py-3.5 px-4 font-mono text-emerald-400">₱[amount]</td>
                            <td class="py-3.5 px-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-emerald-500/10 text-emerald-400 border border-emerald-500/30">
                                    Available
                                </span>
                            </td>
                        </tr>
                        <tr onclick="openPayslipModal('Oct 16–31, 2026', '₱18,450.00', 'Available')" class="hover:bg-slate-900/80 cursor-pointer transition-colors group">
                            <td class="py-3.5 px-4 font-medium text-white group-hover:text-emerald-400 transition-colors">Oct 16–31</td>
                            <td class="py-3.5 px-4 font-mono text-emerald-400">₱[amount]</td>
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

        <!-- SECTION: MY DASHBOARD -->
        <section id="section-dashboard" class="hidden space-y-4">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div class="bg-slate-900/90 rounded-2xl border border-slate-800 p-5 shadow-lg">
                    <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-400">Current Pay Period</p>
                    <p class="text-lg font-bold text-white mt-1.5">Nov 1 – Nov 15, 2026</p>
                </div>
                <div class="bg-slate-900/90 rounded-2xl border border-slate-800 p-5 shadow-lg">
                    <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-400">Latest Net Pay</p>
                    <p class="text-lg font-bold text-emerald-400 mt-1.5 font-mono">₱[amount]</p>
                </div>
                <div class="bg-slate-900/90 rounded-2xl border border-slate-800 p-5 shadow-lg">
                    <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-400">Leave Balance</p>
                    <p class="text-lg font-bold text-white mt-1.5">10 Days Remaining</p>
                </div>
            </div>
        </section>

        <!-- SECTION: MY ATTENDANCE & LEAVE -->
        <section id="section-attendance" class="hidden bg-slate-900/90 rounded-2xl border border-slate-800 glow-emerald p-6">
            <p class="text-xs text-slate-400 mb-4">Recent attendance logs and leave status for the current pay period.</p>
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
    </main>

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
                    <span class="font-mono font-medium text-slate-100">₱[basic_pay]</span>
                </div>
                <div class="flex justify-between py-2 border-b border-slate-800/80">
                    <span class="text-slate-400">Deductions (Tax / Contributions)</span>
                    <span class="font-mono font-medium text-rose-400">-₱[deductions]</span>
                </div>
                <div class="flex justify-between pt-2.5 text-sm font-bold text-white">
                    <span>Net Pay</span>
                    <span id="modal-net-pay" class="font-mono text-emerald-400">₱[amount]</span>
                </div>
            </div>

            <div class="flex justify-end gap-2 pt-3 border-t border-slate-800/80">
                <button type="button" onclick="closePayslipModal()" class="px-4 py-2 rounded-lg border border-slate-700 bg-slate-800 text-xs font-semibold text-slate-200 hover:bg-slate-700 hover:text-white transition-colors">
                    Close
                </button>
            </div>
        </div>
    </div>

    <script>
        function switchSection(section) {
            const sections = ['dashboard', 'payslips', 'attendance'];
            const titles = {
                dashboard: 'My Dashboard',
                payslips: 'My Payslips',
                attendance: 'My Attendance & Leave'
            };

            sections.forEach(s => {
                document.getElementById(`section-${s}`).classList.toggle('hidden', s !== section);
                const btn = document.getElementById(`nav-${s}`);
                const dot = btn.querySelector('span');
                if (s === section) {
                    btn.className = "w-full flex items-center gap-2.5 px-3.5 py-2.5 rounded-lg bg-emerald-500/10 text-emerald-400 border border-emerald-500/30 font-semibold transition-colors text-left";
                    dot.className = "w-1.5 h-1.5 rounded-full bg-emerald-400";
                } else {
                    btn.className = "w-full flex items-center gap-2.5 px-3.5 py-2.5 rounded-lg text-slate-400 hover:bg-slate-900 hover:text-white border border-transparent transition-colors text-left";
                    dot.className = "w-1.5 h-1.5 rounded-full bg-slate-600";
                }
            });

            document.getElementById('page-title').innerText = titles[section];
        }

        function switchRole(role, clickedBtn) {
            document.getElementById('active-role-label').innerText = role;
            document.querySelectorAll('.role-btn').forEach(btn => {
                btn.className = "role-btn w-full text-left px-3.5 py-2 rounded-lg text-slate-300 hover:bg-slate-900 hover:text-white border border-transparent transition-colors";
            });
            if (clickedBtn) {
                clickedBtn.className = "role-btn w-full text-left px-3.5 py-2 rounded-lg bg-emerald-400 text-slate-950 font-bold shadow-sm transition-colors";
            }
        }

        function openPayslipModal(period = 'Nov 1–15, 2026', netPay = '₱[amount]', status = 'Available') {
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

        function showTipToast() {
            openPayslipModal('Nov 1–15, 2026', '₱[amount]', 'Available');
        }
    </script>
</body>
</html>