<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'PayWise - Payroll Management System' }}</title>
    <!-- Tailwind CSS CDN (Or use @vite(['resources/css/app.css', 'resources/js/app.js'])) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-[#f4f6fa] text-slate-800 antialiased min-h-screen flex flex-col">

    <!-- Top Screen Label Bar -->
    <header class="bg-[#111111] text-white px-6 py-2.5 flex items-center justify-between text-xs tracking-wide">
        <span class="font-medium text-slate-300">Interactive Dashboard</span>
        <div class="flex items-center space-x-3">
            <button class="hover:text-emerald-400 transition-colors flex items-center gap-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
            </button>
            <span class="bg-[#222222] border border-slate-700 px-2.5 py-0.5 rounded text-[11px] text-slate-300 font-semibold flex items-center gap-1">
                <span>D</span> PLAY
            </span>
        </div>
    </header>

    <div class="flex-1 flex overflow-hidden">
    </div>




<div class="flex w-full min-h-screen bg-[#f4f6fa]">

    <!-- Sidebar Navigation -->
    <aside class="w-64 bg-[#0b3b3a] text-white flex flex-col justify-between p-5 flex-shrink-0">
        <div>
            <!-- Brand Logo -->
            <div class="flex items-center space-x-2.5 mb-8">
                <div class="w-8 h-8 bg-[#10b981] rounded-lg flex items-center justify-center font-bold text-slate-900 text-sm">
                    PW
                </div>
                <span class="text-xl font-bold tracking-tight text-white">PayWise</span>
            </div>

            <!-- Navigation Links -->
            <nav class="space-y-1.5">
                <a href="{{ route('employee.dashboard') }}" 
                   class="flex items-center space-x-3 px-3.5 py-2.5 rounded-lg text-sm font-medium bg-[#104d4a] text-white transition-colors">
                    <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                    <span>My Dashboard</span>
                </a>

                <a href="{{ route('employee.payslips') }}" 
                   class="flex items-center space-x-3 px-3.5 py-2.5 rounded-lg text-sm font-medium text-slate-300 hover:bg-[#104d4a] hover:text-white transition-colors">
                    <span class="w-2 h-2 rounded-full bg-slate-400"></span>
                    <span>My Payslips</span>
                </a>

                <a href="{{ route('employee.attendance') }}" 
                   class="flex items-center space-x-3 px-3.5 py-2.5 rounded-lg text-sm font-medium text-slate-300 hover:bg-[#104d4a] hover:text-white transition-colors">
                    <span class="w-2 h-2 rounded-full bg-slate-400"></span>
                    <span>My Attendance & Leave</span>
                </a>
            </nav>
        </div>

        <!-- Role Selector Switcher Section -->
        <div class="pt-6 border-t border-[#135754]">
            <p class="text-[11px] font-medium text-slate-400 uppercase tracking-wider mb-3">
                Log in as (try each role)
            </p>
            <div class="space-y-1">
                <a href="{{ route('admin.dashboard') }}" 
                   class="block px-3 py-2 rounded-lg text-sm font-medium text-slate-300 hover:text-white hover:bg-[#104d4a] transition-colors">
                    Administrator
                </a>
                <a href="{{ route('management.dashboard') }}" 
                   class="block px-3 py-2 rounded-lg text-sm font-medium text-slate-300 hover:text-white hover:bg-[#104d4a] transition-colors">
                    Management
                </a>
                <a href="{{ route('employee.dashboard') }}" 
                   class="block px-3.5 py-2 rounded-lg text-sm font-semibold bg-[#2dd4bf] text-slate-900 transition-colors">
                    Employee
                </a>
            </div>
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="flex-1 p-8 overflow-y-auto">
        <!-- Header Title Section -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-slate-900 tracking-tight">My Dashboard</h1>
            <p class="text-xs text-slate-500 mt-1">
                Employee · Pay period: Nov 1 – Nov 15, 2026 · Sample data
            </p>
        </div>

        <!-- Helper Tip Alert Banner -->
        <div class="bg-[#e8f8f5] border border-[#a3e4d7] text-[#116a5b] text-xs px-4 py-3 rounded-lg mb-6 font-medium">
            Tip: click any card, button, alert or menu item to see what's inside and what it does.
        </div>

        <!-- Main Dashboard Card Panel -->
        <div class="bg-white rounded-xl border border-slate-200/80 shadow-sm p-6 max-w-4xl">
            <p class="text-xs text-slate-600 mb-5">
                A quick view of your own pay, attendance and leave.
            </p>

            <!-- Quick Action Buttons -->
            <div class="flex items-center space-x-3 mb-6">
                <a href="{{ route('employee.payslips') }}" 
                   class="px-4 py-1.5 text-xs font-medium text-slate-700 bg-white border border-slate-300 rounded-md hover:bg-slate-50 transition-colors shadow-xs">
                    View payslip
                </a>
                <a href="{{ route('employee.leave') }}" 
                   class="px-4 py-1.5 text-xs font-medium text-slate-700 bg-white border border-slate-300 rounded-md hover:bg-slate-50 transition-colors shadow-xs">
                    View leave balance
                </a>
            </div>

            <!-- Summary Table Data View -->
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs border-collapse">
                    <thead>
                        <tr class="bg-[#f8fafc] text-slate-500 font-medium border-b border-slate-100">
                            <th class="py-2.5 px-4">Item</th>
                            <th class="py-2.5 px-4 text-right">Value</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-slate-700">
                        <tr>
                            <td class="py-3 px-4 font-normal">Last net pay</td>
                            <td class="py-3 px-4 text-right font-medium text-slate-900">
                                ₱{{ number_format($lastNetPay ?? 24500, 2) }}
                            </td>
                        </tr>
                        <tr>
                            <td class="py-3 px-4 font-normal">Leave balance</td>
                            <td class="py-3 px-4 text-right font-medium text-slate-900">
                                {{ $leaveBalance ?? 12 }} days
                            </td>
                        </tr>
                        <tr>
                            <td class="py-3 px-4 font-normal">Days present this period</td>
                            <td class="py-3 px-4 text-right font-medium text-slate-900">
                                {{ $daysPresent ?? 10 }} days
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

