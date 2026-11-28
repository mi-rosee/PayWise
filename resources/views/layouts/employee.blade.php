<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PayWise - Employee Portal')</title>
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

    <!-- Left Sidebar Partial -->
    @include('employee.partials.sidebar')

    <!-- Main Content Area -->
    <main class="flex-1 px-8 py-7 max-w-6xl bg-[#090d16]">
        <!-- Page Header -->
        <header class="mb-5 flex flex-wrap items-center justify-between gap-3">
            <div>
                <h1 class="text-2xl font-bold text-white tracking-tight">@yield('page_title')</h1>
                <p class="text-xs text-slate-400 mt-1">
                    <span class="text-emerald-400 font-semibold">Employee</span> &middot; Pay period: Nov 1 – Nov 15, 2026 &middot; Sample data
                </p>
            </div>
            <a
                href="{{ route('employee.profile') }}"
                class="px-3 py-1.5 bg-slate-900 hover:bg-slate-800 border border-slate-800 hover:border-emerald-500/40 rounded-lg text-xs text-slate-300 hover:text-emerald-400 font-medium transition-colors flex items-center gap-2"
            >
                <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                <span>ID: EMP-8492</span>
            </a>
        </header>

        @if (session('status'))
            <div class="mb-5 px-4 py-3 rounded-xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-300 text-xs font-semibold flex items-center gap-2.5">
                <i class="fa-solid fa-circle-check text-emerald-400 text-sm shrink-0"></i>
                <span>{{ session('status') }}</span>
            </div>
        @endif

        <!-- Tip Banner -->
        <div class="mb-5 px-4 py-3 rounded-xl bg-emerald-950/30 border border-emerald-500/30 text-emerald-300 text-xs font-medium flex items-center gap-2.5">
            <i class="fa-solid fa-circle-info text-emerald-400 text-sm shrink-0"></i>
            <span>Tip: click any card, button, alert or menu item to see what's inside and what it does.</span>
        </div>

        <!-- Page-Specific Content -->
        @yield('content')
    </main>

    <script>
        function toggleProfileMenu() {
            const popover = document.getElementById('profile-menu-popover');
            const chevron = document.getElementById('profile-chevron');
            popover.classList.toggle('hidden');
            chevron.classList.toggle('rotate-180');
        }
    </script>

    @stack('scripts')
</body>
</html>