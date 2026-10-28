<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in - Payroll Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
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
                            50: '#064e3b',
                            100: '#065f46',
                            600: '#10B981',
                            700: '#059669',
                            800: '#047857',
                        },
                        darkText: '#f8fafc',
                        subtleText: '#94a3b8',
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
        .tab-btn {
            transition: all 0.2s ease-in-out;
        }
        .input-border {
            border-color: #334155;
        }
        .input-border:focus-within {
            border-color: #10B981;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.25);
        }
        .glow-emerald {
            box-shadow: 0 0 25px rgba(16, 185, 129, 0.2);
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4 sm:p-6 md:p-8 bg-slate-950 text-slate-100">

    <!-- Notification Toast container -->
    <div id="toast" class="fixed top-5 right-5 transform translate-y-[-150%] transition-all duration-300 ease-in-out z-50 max-w-sm bg-slate-900 border border-slate-700 text-white p-4 rounded-xl shadow-2xl flex items-center gap-3">
        <div id="toast-icon" class="w-8 h-8 rounded-full bg-emerald-500/20 text-emerald-400 flex items-center justify-center shrink-0 border border-emerald-500/30">
            <i class="fa-solid fa-check"></i>
        </div>
        <div>
            <p id="toast-title" class="text-sm font-semibold">Success</p>
            <p id="toast-message" class="text-xs text-slate-300">Logging you into Payroll Portal...</p>
        </div>
    </div>

    <!-- Main Card Container -->
    <div class="w-full max-w-[420px] bg-slate-900 border border-slate-800 rounded-2xl shadow-2xl p-7 sm:p-15 relative glow-emerald transition-all duration-300 hover:scale-[1.01] hover:border-emerald-500/50 hover:shadow-emerald-500/10">
        
        <!-- Logo Header Section -->
        <div class="mb-1">
            <div class="flex items-center space-x-2">
                <div class="w-8 h-8 rounded-lg bg-gradient-to-tr from-indigo-600 to-emerald-400 p-0.5 flex items-center justify-center shadow-lg">
                    <div class="w-full h-full bg-slate-950 rounded-[6px] flex items-center justify-center">
                        <i class="fa-solid fa-wallet text-xs text-emerald-400"></i>
                    </div>
                </div>
                <span class="font-extrabold text-lg text-white tracking-tight">Pay<span class="text-emerald-400">Wise</span></span>
            </div>
        </div>

        <!-- Title Header Section -->
        <div class="mb-4">
            <h1 class="text-[28px] font-bold text-darkText tracking-tight mb-1.5">Sign in</h1>
            <p class="text-subtleText text-sm leading-relaxed">Welcome back. Enter your details to view your payroll.</p>
        </div>

        <!-- Role Switcher Toggle -->
        <div class="bg-slate-950 border border-slate-800 p-1 rounded-xl flex items-center mb-4">
            <button id="employeeTab" type="button" onclick="selectRole('Employee')" class="flex-1 py-2 text-sm font-bold text-slate-950 bg-emerald-400 rounded-lg shadow-sm transition-all duration-200">
                Employee
            </button>
            <button id="hrTab" type="button" onclick="selectRole('HR / Admin')" class="flex-1 py-2 text-sm font-medium text-slate-400 rounded-lg transition-all duration-200 hover:text-white">
                HR / Admin
            </button>
        </div>

        <!-- Form -->
        <form id="signInForm" onsubmit="handleSignIn(event)" class="space-y-4">
            <!-- Email / ID Field -->
            <div>
                <label id="identifierLabel" for="identifier" class="block text-xs font-semibold text-slate-200 mb-1.5">
                    Employee ID or work email
                </label>
                <input 
                    type="text" 
                    id="identifier" 
                    required 
                    placeholder="e.g. EMP-00123" 
                    class="w-full px-3.5 py-2.5 text-sm text-slate-100 bg-slate-950 border border-slate-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-400/20 focus:border-emerald-400 placeholder-slate-600 transition-colors"
                />
            </div>

            <!-- Password Field -->
            <div>
                <div class="flex items-center justify-between mb-1.5">
                    <label for="password" class="block text-xs font-semibold text-slate-300">Password</label>
                    <a href="#" onclick="showNotification('Info', 'Password reset instructions sent to your email.')" class="text-xs font-medium text-emerald-400 hover:text-emerald-300 hover:underline">Forgot password?</a>
                </div>
                <div class="input-border rounded-lg border bg-slate-950 px-3.5 py-2.5 flex items-center justify-between transition-all">
                    <input 
                        type="password" 
                        id="password" 
                        required 
                        placeholder="Enter your password" 
                        class="w-full bg-transparent text-sm text-darkText placeholder-slate-600 outline-none pr-2"
                    >
                    <button 
                        type="button" 
                        onclick="togglePasswordVisibility()" 
                        class="text-slate-500 hover:text-emerald-400 focus:outline-none transition-colors"
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
                    class="w-4 h-4 bg-slate-950 border-slate-700 rounded text-emerald-500 focus:ring-emerald-500 cursor-pointer accent-emerald-500"
                />
                <label for="remember" class="ml-2.5 text-xs text-slate-400 cursor-pointer select-none">
                    Keep me signed in on this device
                </label>
            </div>

            <!-- Primary Action Button -->
            <button 
                type="submit" 
                class="w-full mt-2 bg-emerald-400 hover:bg-emerald-300 active:bg-emerald-500 text-slate-950 font-semibold py-3 px-4 rounded-lg shadow-md transition-colors duration-150 text-sm"
            >
                Sign in
            </button>
        </form>

        <!-- Footer -->
        <div class="mt-7 text-center">
            <p class="text-xs text-slate-400">
                New to Payroll Portal? 
                <a href="register.blade.php" onclick="showNotification('Account Creation', 'Redirecting to onboarding portal...')" class="font-semibold text-emerald-400 hover:text-emerald-300 hover:underline ml-0.5">Create an account</a>
            </p>
        </div>

    </div>

    <script>
        let currentRole = 'Employee';

        function selectRole(role) {
            currentRole = role;
            const employeeTab = document.getElementById('employeeTab');
            const hrTab = document.getElementById('hrTab');
            const identifierLabel = document.getElementById('identifierLabel');
            const identifierInput = document.getElementById('identifier');

            if (role === 'Employee') {
                employeeTab.className = "flex-1 py-2 text-sm font-bold text-slate-950 bg-emerald-400 rounded-lg shadow-sm transition-all duration-200";
                hrTab.className = "flex-1 py-2 text-sm font-medium text-slate-400 rounded-lg transition-all duration-200 hover:text-white";
                identifierLabel.innerText = "Employee ID or work email";
                identifierInput.placeholder = "e.g. EMP-00123";
            } else {
                hrTab.className = "flex-1 py-2 text-sm font-bold text-slate-950 bg-emerald-400 rounded-lg shadow-sm transition-all duration-200";
                employeeTab.className = "flex-1 py-2 text-sm font-medium text-slate-400 rounded-lg transition-all duration-200 hover:text-white";
                identifierLabel.innerText = "Admin or HR Email";
                identifierInput.placeholder = "admin@company.com";
            }
        }

        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        }

        function showNotification(title, message) {
            const toast = document.getElementById('toast');
            document.getElementById('toast-title').innerText = title;
            document.getElementById('toast-message').innerText = message;
            toast.style.transform = 'translateY(0)';
            setTimeout(() => {
                toast.style.transform = 'translateY(-150%)';
            }, 3000);
        }

        function handleSignIn(e) {
            e.preventDefault();
            showNotification('Success', `Logging you into Payroll Portal as ${currentRole}...`);
        }
    </script>
</body>
</html>