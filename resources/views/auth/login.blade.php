<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in - Payroll Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            50: '#f5f3ff',
                            100: '#ede9fe',
                            600: '#4f46e5',
                            700: '#4338ca',
                            800: '#3730a3',
                        },
                        darkText: '#0f172a',
                        subtleText: '#64748b',
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
        }
        /* Custom styles to mirror exact visual proportions */
        .tab-btn {
            transition: all 0.2s ease-in-out;
        }
        .input-border {
            border-color: #cbd5e1;
        }
        .input-border:focus-within {
            border-color: #4f46e5;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.15);
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4 sm:p-6 md:p-8">

    <!-- Notification Toast container -->
    <div id="toast" class="fixed top-5 right-5 transform translate-y-[-150%] transition-all duration-300 ease-in-out z-50 max-w-sm bg-slate-900 text-white p-4 rounded-xl shadow-xl flex items-center gap-3">
        <div id="toast-icon" class="w-8 h-8 rounded-full bg-emerald-500/20 text-emerald-400 flex items-center justify-center shrink-0">
            <i class="fa-solid fa-check"></i>
        </div>
        <div>
            <p id="toast-title" class="text-sm font-semibold">Success</p>
            <p id="toast-message" class="text-xs text-slate-300">Logging you into Payroll Portal...</p>
        </div>
    </div>

    <!-- Main Card Container -->
    <div class="w-full max-w-[420px] bg-white rounded-2xl shadow-sm border border-slate-100 p-8 sm:p-10 transition-all">
        
        <!-- Header Section -->
        <div class="mb-6">
            <h1 class="text-[28px] font-bold text-darkText tracking-tight mb-1.5">Sign in</h1>
            <p class="text-subtleText text-sm leading-relaxed">Welcome back. Enter your details to view your payroll.</p>
        </div>

        <!-- Role Switcher Toggle -->
        <!-- Role Toggle Switch -->
        <div class="bg-[#EAEFF8]/60 p-1 rounded-xl flex items-center mb-6">
            <button id="employeeTab" type="button" onclick="selectRole('Employee')" class="flex-1 py-2 text-sm font-bold text-[#0F172A] bg-white rounded-lg shadow-sm transition-all duration-200">
                Employee
            </button>
            <button id="hrTab" type="button" onclick="selectRole('HR / Admin')" class="flex-1 py-2 text-sm font-medium text-[#64748B] rounded-lg transition-all duration-200 hover:text-slate-900">
                HR / Admin
            </button>
        </div>

        <!-- Form -->
        <form id="signInForm" onsubmit="handleSignIn(event)" class="space-y-4">
            <!-- Email / ID Field -->
            <div>
                <label id="identifierLabel" for="identifier" class="block text-xs font-semibold text-[#0F172A] mb-1.5">
                    Employee ID or work email
                </label>
                <input 
                    type="text" 
                    id="identifier" 
                    required 
                    placeholder="e.g. EMP-00123" 
                    class="w-full px-3.5 py-2.5 text-sm text-slate-800 bg-white border border-[#CBD5E1] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#4338CA]/20 focus:border-[#4338CA] placeholder-slate-400 transition-colors"
                />
            </div>

            <!-- Password Field -->
            <div>
                <div class="flex items-center justify-between mb-1.5">
                    <label for="password" class="block text-xs font-semibold text-slate-700">Password</label>
                    <a href="#" onclick="showNotification('Info', 'Password reset instructions sent to your email.')" class="text-xs font-medium text-brand-600 hover:text-brand-700 hover:underline">Forgot password?</a>
                </div>
                <div class="input-border rounded-lg border bg-white px-3.5 py-2.5 flex items-center justify-between transition-all">
                    <input 
                        type="password" 
                        id="password" 
                        required 
                        placeholder="Enter your password" 
                        class="w-full bg-transparent text-sm text-darkText placeholder-slate-400 outline-none pr-2"
                    >
                    <button 
                        type="button" 
                        onclick="togglePasswordVisibility()" 
                        class="text-slate-400 hover:text-slate-600 focus:outline-none transition-colors"
                        aria-label="Toggle password visibility"
                    >
                        <i id="eyeIcon" class="fa-regular fa-eye"></i>
                    </button>
                </div>
            </div>

            <!-- Checkbox Field -->
            <div class="flex items-center pt-1 pb-1">
                <input 
                    type="checkbox" 
                    id="remember" 
                    class="w-4 h-4 text-brand-600 border-slate-300 rounded focus:ring-brand-600 cursor-pointer accent-brand-600"
                >
                <label for="remember" class="ml-2.5 text-xs text-slate-600 cursor-pointer select-none">
                    Keep me signed in on this device
                </label>
            </div>

            <!-- Primary Action Button -->
            <button 
                type="submit" 
                class="w-full mt-2 bg-[#4338CA] hover:bg-[#3730A3] active:bg-[#312E81] text-white font-semibold py-3 px-4 rounded-lg shadow-sm transition-colors duration-150 text-sm"
            >
                Sign in
            </button>
        </form>

        <!-- Footer -->
        <div class="mt-7 text-center">
            <p class="text-xs text-slate-500">
                New to Payroll Portal? 
                <a href="#" onclick="showNotification('Account Creation', 'Redirecting to onboarding portal...')" class="font-semibold text-brand-600 hover:text-brand-700 hover:underline ml-0.5">Create an account</a>
            </p>
        </div>

    </div>

   
</body>
</html>