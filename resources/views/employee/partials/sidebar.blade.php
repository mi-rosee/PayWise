<aside class="w-64 shrink-0 bg-sidebar-bg border-r border-slate-800/80 text-slate-300 flex flex-col justify-between min-h-screen select-none relative">
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
            <a
                href="{{ route('employee.dashboard') }}"
                class="w-full flex items-center gap-2.5 px-3.5 py-2.5 rounded-lg transition-colors text-left {{ request()->routeIs('employee.dashboard') ? 'bg-emerald-500/10 text-emerald-400 border border-emerald-500/30 font-semibold' : 'text-slate-400 hover:bg-slate-900 hover:text-white border border-transparent' }}"
            >
                <span class="w-1.5 h-1.5 rounded-full {{ request()->routeIs('employee.dashboard') ? 'bg-emerald-400' : 'bg-slate-600' }}"></span>
                <span>My Dashboard</span>
            </a>

            <a
                href="{{ route('employee.payslips') }}"
                class="w-full flex items-center gap-2.5 px-3.5 py-2.5 rounded-lg transition-colors text-left {{ request()->routeIs('employee.payslips') ? 'bg-emerald-500/10 text-emerald-400 border border-emerald-500/30 font-semibold' : 'text-slate-400 hover:bg-slate-900 hover:text-white border border-transparent' }}"
            >
                <span class="w-1.5 h-1.5 rounded-full {{ request()->routeIs('employee.payslips') ? 'bg-emerald-400' : 'bg-slate-600' }}"></span>
                <span>My Payslips</span>
            </a>

            <a
                href="{{ route('employee.attendance') }}"
                class="w-full flex items-center gap-2.5 px-3.5 py-2.5 rounded-lg transition-colors text-left {{ request()->routeIs('employee.attendance') || request()->routeIs('employee.leave') ? 'bg-emerald-500/10 text-emerald-400 border border-emerald-500/30 font-semibold' : 'text-slate-400 hover:bg-slate-900 hover:text-white border border-transparent' }}"
            >
                <span class="w-1.5 h-1.5 rounded-full {{ request()->routeIs('employee.attendance') || request()->routeIs('employee.leave') ? 'bg-emerald-400' : 'bg-slate-600' }}"></span>
                <span>My Attendance &amp; Leave</span>
            </a>
        </nav>
    </div>

    <!-- Bottom Profile Menu -->
    <div class="p-3 border-t border-slate-800/80 relative">
        <!-- Popover Menu -->
        <div
            id="profile-menu-popover"
            class="hidden mb-2 rounded-xl bg-slate-900 border border-slate-700/90 shadow-2xl p-1.5 text-xs space-y-1"
        >
            <a
                href="{{ route('employee.profile') }}"
                class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-slate-200 hover:bg-slate-800 hover:text-emerald-400 transition-colors font-medium"
            >
                <i class="fa-regular fa-user text-slate-400 w-4 text-center"></i>
                <span>My Profile</span>
            </a>

            <a
                href="{{ route('employee.profile') }}#security"
                class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-slate-200 hover:bg-slate-800 hover:text-emerald-400 transition-colors font-medium"
            >
                <i class="fa-solid fa-key text-slate-400 w-4 text-center"></i>
                <span>Change Password</span>
            </a>

            <div class="border-t border-slate-800 my-1"></div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button
                    type="submit"
                    class="w-full flex items-center gap-2.5 px-3 py-2 rounded-lg text-rose-400 hover:bg-rose-500/10 transition-colors font-semibold text-left"
                >
                    <i class="fa-solid fa-right-from-bracket w-4 text-center"></i>
                    <span>Sign out</span>
                </button>
            </form>
        </div>

        <!-- Profile Trigger Button -->
        <button
            type="button"
            onclick="toggleProfileMenu()"
            class="w-full flex items-center justify-between gap-2.5 p-2.5 rounded-xl bg-slate-900/80 hover:bg-slate-900 border border-slate-800 hover:border-slate-700 transition-all text-left"
        >
            <div class="flex items-center gap-2.5 min-w-0">
                <div class="w-8 h-8 rounded-lg bg-emerald-500/15 border border-emerald-500/30 text-emerald-400 font-bold text-xs flex items-center justify-center shrink-0">
                    {{ strtoupper(substr(auth()->user()->name ?? 'EM', 0, 2)) }}
                </div>
                <div class="min-w-0">
                    <p class="text-xs font-semibold text-white truncate">
                        {{ auth()->user()->name ?? 'Employee User' }}
                    </p>
                    <p class="text-[11px] text-slate-400 truncate">
                        EMP-8492 &middot; Employee
                    </p>
                </div>
            </div>
            <i id="profile-chevron" class="fa-solid fa-chevron-up text-[11px] text-slate-400 shrink-0 transition-transform"></i>
        </button>
    </div>
</aside>