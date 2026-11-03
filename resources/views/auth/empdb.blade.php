<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'PayWise - Payroll Management System' }}</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
                            500: '#6366f1',
                            600: '#4f46e5',
                        },
                        neonEmerald: '#10b981',
                        neonCyan: '#06b6d4',
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-[#090d16] text-slate-100 antialiased min-h-screen flex flex-col selection:bg-indigo-500 selection:text-white">

    <div class="flex-1 flex overflow-hidden w-full min-h-screen bg-[#090d16]">

        <!-- Sidebar Navigation -->
        <aside class="w-64 bg-[#030712] border-r border-slate-800/80 text-white flex flex-col justify-between p-5 flex-shrink-0">
            <div>
                <!-- Brand Logo -->
                <div class="flex items-center space-x-3 mb-8">
                    <!-- Exact Logo Component -->
                    <div class="w-8 h-8 rounded-lg bg-gradient-to-tr from-indigo-600 to-emerald-400 p-0.5 flex items-center justify-center shadow-lg shrink-0">
                        <div class="w-full h-full bg-slate-950 rounded-[6px] flex items-center justify-center">
                            <i class="fa-solid fa-wallet text-xs text-emerald-400"></i>
                        </div>
                    </div>
                    <div>
                        <span class="font-extrabold text-lg text-white tracking-tight leading-none block">Pay<span class="text-emerald-400">Wise</span></span>
                    </div>
                </div>

                <!-- Navigation Links -->
                <nav class="space-y-1.5">
                    <a href="/" 
                       class="flex items-center space-x-3 px-3.5 py-2.5 rounded-lg text-sm font-medium bg-indigo-600/20 text-indigo-400 border border-indigo-500/30 transition-colors">
                        <span class="w-2 h-2 rounded-full bg-indigo-400"></span>
                        <span>My Dashboard</span>
                    </a>

                    <a href="/" 
                       class="flex items-center space-x-3 px-3.5 py-2.5 rounded-lg text-sm font-medium text-slate-400 hover:bg-slate-900 hover:text-white transition-colors">
                        <span class="w-2 h-2 rounded-full bg-slate-600"></span>
                        <span>My Payslips</span>
                    </a>

                    <a href="/" 
                       class="flex items-center space-x-3 px-3.5 py-2.5 rounded-lg text-sm font-medium text-slate-400 hover:bg-slate-900 hover:text-white transition-colors">
                        <span class="w-2 h-2 rounded-full bg-slate-600"></span>
                        <span>My Attendance & Leave</span>
                    </a>
                </nav>
            </div>


        </aside>

        <!-- Main Content Area -->
        <main class="flex-1 p-8 overflow-y-auto bg-[#090d16]">
            <!-- Header Title Section -->
            <div class="mb-6 flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-white tracking-tight">My Dashboard</h1>
                    <p class="text-xs text-slate-400 mt-1">
                        Employee · Pay period: Nov 1 – Nov 15, 2026 · Sample data
                    </p>
                </div>
                <div class="flex items-center gap-2">
                    <span class="px-3 py-1 bg-slate-900 border border-slate-800 rounded-lg text-xs text-slate-300 font-medium">
                        ID: EMP-8492
                    </span>
                </div>
            </div>

            <!-- Helper Tip Alert Banner -->
            <div class="bg-indigo-950/40 border border-indigo-800/60 text-indigo-300 text-xs px-4 py-3 rounded-xl mb-6 font-medium flex items-center gap-2.5 shadow-lg shadow-indigo-950/20">
                <svg class="w-4 h-4 text-indigo-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <span>Tip: click any card, button, alert or menu item to see what's inside and what it does.</span>
            </div>

            <!-- Main Dashboard Card Panel -->
            <div class="bg-slate-900/90 rounded-2xl border border-slate-800 shadow-xl p-6 sm:p-8 max-w-4xl backdrop-blur-md">
                <div class="flex items-center justify-between mb-5 pb-4 border-b border-slate-800">
                    <div>
                        <h2 class="text-base font-semibold text-white">Payroll & Attendance Overview</h2>
                        <p class="text-xs text-slate-400 mt-0.5">
                            A quick view of your own pay, attendance and leave.
                        </p>
                    </div>

                    <!-- Quick Action Buttons -->
                    <div class="flex items-center space-x-3">
                        <a href="/" 
                           class="px-4 py-2 text-xs font-semibold text-slate-200 bg-slate-800 border border-slate-700 rounded-lg hover:bg-slate-700 hover:text-white transition-all shadow-sm">
                            View payslip
                        </a>
                        <a href="/" 
                           class="px-4 py-2 text-xs font-semibold text-indigo-400 bg-indigo-600/20 border border-indigo-500/30 rounded-lg hover:bg-indigo-600/30 hover:text-indigo-300 transition-all shadow-sm">
                            View leave balance
                        </a>
                    </div>
                </div>

                <!-- Summary Table Data View -->
                <div class="overflow-x-auto rounded-xl border border-slate-800/80 bg-slate-950/50">
                    <table class="w-full text-left text-xs border-collapse">
                        <thead>
                            <tr class="bg-slate-900/80 text-slate-400 font-semibold border-b border-slate-800">
                                <th class="py-3 px-4">Item</th>
                                <th class="py-3 px-4 text-right">Value</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-800/60 text-slate-300">
                            <tr class="hover:bg-slate-900/40 transition-colors">
                                <td class="py-3.5 px-4 font-normal flex items-center gap-2">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                                    Last net pay
                                </td>
                                <td class="py-3.5 px-4 text-right font-bold text-emerald-400 text-sm">
                                    ₱{{ number_format($lastNetPay ?? 24500, 2) }}
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-900/40 transition-colors">
                                <td class="py-3.5 px-4 font-normal flex items-center gap-2">
                                    <span class="w-1.5 h-1.5 rounded-full bg-cyan-400"></span>
                                    Leave balance
                                </td>
                                <td class="py-3.5 px-4 text-right font-semibold text-white">
                                    {{ $leaveBalance ?? 12 }} days available
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-900/40 transition-colors">
                                <td class="py-3.5 px-4 font-normal flex items-center gap-2">
                                    <span class="w-1.5 h-1.5 rounded-full bg-indigo-400"></span>
                                    Days present this period
                                </td>
                                <td class="py-3.5 px-4 text-right font-semibold text-white">
                                    {{ $daysPresent ?? 10 }} / 10 days
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>

    </div>
</body>
</html>