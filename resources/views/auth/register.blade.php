<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-950">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account - PayWise Payroll</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts Inter -->
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        dark: {
                            950: '#020617',
                            900: '#0F172A',
                            800: '#1E293B',
                            700: '#334155',
                        },
                        neon: {
                            emerald: '#10B981',
                            indigo: '#6366F1',
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
            color: #f8fafc;
        }
        /* Custom high-contrast dark form inputs with glowing focus states */
        .form-input-dark {
            transition: all 0.2s ease-in-out;
            background-color: #020617;
            border-color: #334155;
            color: #f8fafc;
        }
        .form-input-dark:focus {
            outline: none;
            border-color: #10B981;
            box-shadow: 0 0 15px rgba(16, 185, 129, 0.25);
        }
        .glow-emerald {
            box-shadow: 0 0 25px rgba(16, 185, 129, 0.2);
        }
    </style>
</head>
<body class="bg-slate-950 text-slate-100 min-h-screen flex items-center justify-center p-4 sm:p-6 md:p-8 selection:bg-emerald-500 selection:text-slate-950">

    
<!-- Card Container -->
<div class="w-full max-w-md bg-slate-900 rounded-2xl shadow-2xl shadow-emerald-950/20 p-8 sm:p-8 border border-slate-800 relative glow-emerald transition-all duration-300 hover:scale-[1.01] hover:border-emerald-300/50 hover:shadow-emerald-600/20">        
        <!-- App Header / Logo placeholder -->
        <div class="mb-6">
            <div class="flex items-center space-x-2 mb-3">
                <div class="w-8 h-8 rounded-lg bg-gradient-to-tr from-indigo-600 to-emerald-400 p-0.5 flex items-center justify-center shadow-lg">
                    <div class="w-full h-full bg-slate-950 rounded-[6px] flex items-center justify-center">
                        <i class="fa-solid fa-wallet text-xs text-emerald-400"></i>
                    </div>
                </div>
                <span class="font-extrabold text-lg text-white tracking-tight">Pay<span class="text-emerald-400">Wise</span></span>
            </div>
            <h1 class="text-2xl sm:text-3xl font-black text-white tracking-tight">Create account</h1>
            <p class="text-sm text-slate-400 mt-1 font-medium">
                Already registered? 
                <a href="login.blade.php" onclick="showToast('Navigating to Sign in page...', 'info');" class="text-emerald-400 font-bold hover:text-emerald-300 underline underline-offset-2 transition-colors">Sign in</a>
            </p>
        </div>

        <!-- Registration Form -->
        <form id="registrationForm" onsubmit="handleFormSubmit(event)" novalidate class="space-y-4">
            
            <!-- First Name & Last Name Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                <div>
                    <label for="firstName" class="block text-xs font-extrabold text-slate-300 uppercase tracking-wider mb-1.5">First name</label>
                    <input 
                        type="text" 
                        id="firstName" 
                        name="firstName" 
                        required 
                        class="form-input-dark w-full px-3.5 py-2.5 rounded-lg text-sm placeholder-slate-600 font-normal border"
                    >
                    <span class="text-xs text-rose-400 font-semibold hidden mt-1" id="firstNameError">First name is required</span>
                </div>
                <div>
                    <label for="lastName" class="block text-xs font-extrabold text-slate-300 uppercase tracking-wider mb-1.5">Last name</label>
                    <input 
                        type="text" 
                        id="lastName" 
                        name="lastName" 
                        required 
                        class="form-input-dark w-full px-3.5 py-2.5 rounded-lg text-sm placeholder-slate-600 font-normal border"
                    >
                    <span class="text-xs text-rose-400 font-semibold hidden mt-1" id="lastNameError">Last name is required</span>
                </div>
            </div>

            <!-- Work Email -->
            <div>
                <label for="workEmail" class="block text-xs font-extrabold text-slate-300 uppercase tracking-wider mb-1.5">Work email</label>
                <input 
                    type="email" 
                    id="workEmail" 
                    name="workEmail" 
                    placeholder="name@company.com" 
                    required 
                    class="form-input-dark w-full px-3.5 py-2.5 rounded-lg text-sm placeholder-slate-600 font-normal border"
                >
                <span class="text-xs text-rose-400 font-semibold hidden mt-1" id="emailError">Please enter a valid work email</span>
            </div>

            <!-- Company Code & Role Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                <div>
                    <label for="companyCode" class="block text-xs font-extrabold text-slate-300 uppercase tracking-wider mb-1.5">Company code</label>
                    <input 
                        type="text" 
                        id="companyCode" 
                        name="companyCode" 
                        placeholder="e.g. ACME-1234" 
                        required 
                        class="form-input-dark w-full px-3.5 py-2.5 rounded-lg text-sm placeholder-slate-600 font-normal border"
                    >
                    <span class="text-xs text-rose-400 font-semibold hidden mt-1" id="companyCodeError">Company code is required</span>
                </div>
                <div>
                    <label for="role" class="block text-xs font-extrabold text-slate-300 uppercase tracking-wider mb-1.5">Role</label>
                    <div class="relative">
                        <select 
                            id="role" 
                            name="role" 
                            class="form-input-dark w-full px-3.5 py-2.5 rounded-lg text-sm appearance-none font-normal cursor-pointer pr-10 border"
                        >
                            <option value="Employee" class="bg-slate-900 text-slate-100" selected>Employee</option>
                            <option value="Manager" class="bg-slate-900 text-slate-100">Manager</option>
                            <option value="Payroll Admin" class="bg-slate-900 text-slate-100">Payroll Admin</option>
                            <option value="HR" class="bg-slate-900 text-slate-100">HR</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-slate-400">
                            <i class="fa-solid fa-chevron-down text-xs"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-xs font-extrabold text-slate-300 uppercase tracking-wider mb-1.5">Password</label>
                <div class="relative">
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        placeholder="Create a password" 
                        required 
                        class="form-input-dark w-full px-3.5 py-2.5 rounded-lg text-sm placeholder-slate-600 pr-10 font-normal border"
                    >
                    <button 
                        type="button" 
                        onclick="togglePasswordVisibility('password', 'passwordToggleIcon')" 
                        class="absolute inset-y-0 right-0 px-3.5 flex items-center text-slate-500 hover:text-emerald-400 transition-colors focus:outline-none"
                        aria-label="Toggle password visibility"
                    >
                        <i id="passwordToggleIcon" class="fa-regular fa-eye text-sm"></i>
                    </button>
                </div>
                <p class="text-xs text-slate-400 mt-1 font-normal">At least 8 characters, with a number and a symbol.</p>
                <span class="text-xs text-rose-400 font-semibold hidden mt-1" id="passwordError">Password must be at least 8 chars with a number and symbol</span>
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="confirmPassword" class="block text-xs font-extrabold text-slate-300 uppercase tracking-wider mb-1.5">Confirm password</label>
                <div class="relative">
                    <input 
                        type="password" 
                        id="confirmPassword" 
                        name="confirmPassword" 
                        placeholder="Re-enter your password" 
                        required 
                        class="form-input-dark w-full px-3.5 py-2.5 rounded-lg text-sm placeholder-slate-600 pr-10 font-normal border"
                    >
                    <button 
                        type="button" 
                        onclick="togglePasswordVisibility('confirmPassword', 'confirmPasswordToggleIcon')" 
                        class="absolute inset-y-0 right-0 px-3.5 flex items-center text-slate-500 hover:text-emerald-400 transition-colors focus:outline-none"
                        aria-label="Toggle confirm password visibility"
                    >
                        <i id="confirmPasswordToggleIcon" class="fa-regular fa-eye text-sm"></i>
                    </button>
                </div>
                <span class="text-xs text-rose-400 font-semibold hidden mt-1" id="confirmPasswordError">Passwords do not match</span>
            </div>

            <!-- Terms Checkbox -->
            <div class="pt-2">
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input 
                            id="terms" 
                            name="terms" 
                            type="checkbox" 
                            required 
                            class="h-4 w-4 bg-slate-950 border-slate-700 rounded text-emerald-500 focus:ring-emerald-500 focus:ring-offset-slate-900 cursor-pointer accent-emerald-500"
                        >
                    </div>
                    <div class="ml-2.5 text-xs">
                        <label for="terms" class="text-slate-400 leading-normal cursor-pointer select-none">
                            I agree to the <a href="#" onclick="showToast('Terms of Use opened', 'info'); return false;" class="text-emerald-400 hover:underline">Terms of Use</a> and <a href="#" onclick="showToast('Privacy Policy opened', 'info'); return false;" class="text-emerald-400 hover:underline">Privacy Policy</a>, and confirm my company has authorised me to access payroll.
                        </label>
                    </div>
                </div>
                <span class="text-xs text-rose-400 font-semibold hidden mt-1 block" id="termsError">You must accept the terms to continue</span>
            </div>

            <!-- Submit Button -->
            <div class="pt-2">
                <button 
                    type="submit" 
                    class="w-full py-3 px-4 bg-emerald-400 hover:bg-emerald-300 active:bg-emerald-500 text-slate-950 font-black rounded-lg shadow-lg shadow-emerald-500/20 hover:shadow-emerald-500/40 transition-all duration-200 text-sm flex items-center justify-center space-x-2 focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:ring-offset-2 focus:ring-offset-slate-900"
                >
                    <span>Create account</span>
                </button>
            </div>
        </form>

        <!-- Footer Helper Note -->
        <div class="mt-6 pt-4 border-t border-slate-800 text-center">
            <p class="text-xs text-slate-400 font-medium">
                Don’t have a company code? <a href="#" onclick="showToast('Contacting payroll administrator...', 'info'); return false;" class="text-emerald-400 font-bold hover:underline">Ask your payroll administrator.</a>
            </p>
        </div>
    </div>

    <!-- Toast Notification Container -->
    <div id="toast" class="fixed bottom-5 right-5 transform translate-y-20 opacity-0 transition-all duration-300 ease-out max-w-sm bg-slate-900 border border-slate-700 text-white text-xs px-4 py-3 rounded-xl shadow-2xl flex items-center space-x-2 z-50">
        <i id="toastIcon" class="fa-solid fa-circle-info text-emerald-400 text-base"></i>
        <span id="toastMessage" class="font-medium">Notification message</span>
    </div>

    <!-- Success Modal -->
<div id="successModal" class="fixed inset-0 bg-slate-950/80 backdrop-blur-md flex hidden items-center justify-center p-4 z-50 opacity-0 transition-opacity duration-300">
    <div class="bg-slate-900 border border-slate-700 rounded-2xl max-w-sm w-full p-6 text-center transform scale-95 transition-transform duration-300 shadow-2xl">
        <div class="w-12 h-12 bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 rounded-full flex items-center justify-center mx-auto mb-4 text-xl">
            <i class="fa-solid fa-check"></i>
        </div>
        <h3 class="text-xl font-black text-white mb-1">Account Created!</h3>
        <p class="text-xs text-slate-400 mb-6 leading-relaxed">
            Welcome onboard! We have sent a confirmation email to <span id="userEmailDisplay" class="font-semibold text-emerald-400"></span>.
        </p>
        <button 
            onclick="closeModal()" 
            class="w-full py-2.5 px-4 bg-emerald-400 hover:bg-emerald-300 text-slate-950 text-xs font-black rounded-lg shadow-lg shadow-emerald-500/20 transition-all"
        >
            Continue to Dashboard
        </button>
    </div>
</div>

    <script>
        function togglePasswordVisibility(inputId, iconId) {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }

        function showToast(message, type = 'info') {
            const toast = document.getElementById('toast');
            const toastMessage = document.getElementById('toastMessage');
            toastMessage.innerText = message;
            toast.classList.remove('translate-y-20', 'opacity-0');
            setTimeout(() => {
                toast.classList.add('translate-y-20', 'opacity-0');
            }, 3000);
        }

        function handleFormSubmit(e) {
            e.preventDefault();
            const email = document.getElementById('workEmail').value;
            document.getElementById('userEmailDisplay').innerText = email || 'user@company.com';
            
            const modal = document.getElementById('successModal');
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.remove('opacity-0');
            }, 10);
        }

        function closeModal() {
            const modal = document.getElementById('successModal');
            modal.classList.add('opacity-0');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }
    </script>
</body>
</html>