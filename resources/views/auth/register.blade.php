<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            50: '#f4f3ff',
                            100: '#ebe9fe',
                            500: '#6366f1',
                            600: '#4f46e5',
                            700: '#4338ca',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        /* Custom styling for sleek focus rings and transitions */
        .form-input {
            transition: all 0.2s ease-in-out;
        }
        .form-input:focus {
            outline: none;
            border-color: #4f46e5;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.15);
        }
    </style>
</head>
<body class="bg-slate-50 min-h-screen flex items-center justify-center p-4 sm:p-6 md:p-8">

    <!-- Card Container -->
    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl shadow-slate-200/50 p-6 sm:p-8 border border-slate-100 relative">
        
        <!-- App Header / Logo placeholder -->
        <div class="mb-6">
            <h1 class="text-2xl sm:text-3xl font-bold text-slate-900 tracking-tight">Create account</h1>
            <p class="text-sm text-slate-500 mt-1 font-medium">
                Already registered? 
                <a href="#" onclick="showToast('Navigating to Sign in page...', 'info'); return false;" class="text-indigo-600 font-semibold hover:text-indigo-700 underline underline-offset-2 transition-colors">Sign in</a>
            </p>
        </div>

        <!-- Registration Form -->
        <form id="registrationForm" onsubmit="handleFormSubmit(event)" novalidate class="space-y-4">
            
            <!-- First Name & Last Name Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                <div>
                    <label for="firstName" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">First name</label>
                    <input 
                        type="text" 
                        id="firstName" 
                        name="firstName" 
                        required 
                        class="form-input w-full px-3.5 py-2.5 bg-white border border-slate-300 rounded-lg text-slate-900 text-sm placeholder-slate-400 font-normal"
                    >
                    <span class="text-xs text-red-500 hidden mt-1" id="firstNameError">First name is required</span>
                </div>
                <div>
                    <label for="lastName" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Last name</label>
                    <input 
                        type="text" 
                        id="lastName" 
                        name="lastName" 
                        required 
                        class="form-input w-full px-3.5 py-2.5 bg-white border border-slate-300 rounded-lg text-slate-900 text-sm placeholder-slate-400 font-normal"
                    >
                    <span class="text-xs text-red-500 hidden mt-1" id="lastNameError">Last name is required</span>
                </div>
            </div>

            <!-- Work Email -->
            <div>
                <label for="workEmail" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Work email</label>
                <input 
                    type="email" 
                    id="workEmail" 
                    name="workEmail" 
                    placeholder="name@company.com" 
                    required 
                    class="form-input w-full px-3.5 py-2.5 bg-white border border-slate-300 rounded-lg text-slate-900 text-sm placeholder-slate-400 font-normal"
                >
                <span class="text-xs text-red-500 hidden mt-1" id="emailError">Please enter a valid work email</span>
            </div>

            <!-- Company Code & Role Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                <div>
                    <label for="companyCode" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Company code</label>
                    <input 
                        type="text" 
                        id="companyCode" 
                        name="companyCode" 
                        placeholder="e.g. ACME-1234" 
                        required 
                        class="form-input w-full px-3.5 py-2.5 bg-white border border-slate-300 rounded-lg text-slate-900 text-sm placeholder-slate-400 font-normal"
                    >
                    <span class="text-xs text-red-500 hidden mt-1" id="companyCodeError">Company code is required</span>
                </div>
                <div>
                    <label for="role" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Role</label>
                    <div class="relative">
                        <select 
                            id="role" 
                            name="role" 
                            class="form-input w-full px-3.5 py-2.5 bg-white border border-slate-300 rounded-lg text-slate-900 text-sm appearance-none font-normal cursor-pointer pr-10"
                        >
                            <option value="Employee" selected>Employee</option>
                            <option value="Manager">Manager</option>
                            <option value="Payroll Admin">Payroll Admin</option>
                            <option value="HR">HR</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-slate-500">
                            <i class="fa-solid fa-chevron-down text-xs"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Password</label>
                <div class="relative">
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        placeholder="Create a password" 
                        required 
                        class="form-input w-full px-3.5 py-2.5 bg-white border border-slate-300 rounded-lg text-slate-900 text-sm placeholder-slate-400 pr-10 font-normal"
                    >
                    <button 
                        type="button" 
                        onclick="togglePasswordVisibility('password', 'passwordToggleIcon')" 
                        class="absolute inset-y-0 right-0 px-3.5 flex items-center text-slate-400 hover:text-slate-600 transition-colors focus:outline-none"
                        aria-label="Toggle password visibility"
                    >
                        <i id="passwordToggleIcon" class="fa-regular fa-eye text-sm"></i>
                    </button>
                </div>
                <p class="text-xs text-slate-500 mt-1 font-normal">At least 8 characters, with a number and a symbol.</p>
                <span class="text-xs text-red-500 hidden mt-1" id="passwordError">Password must be at least 8 chars with a number and symbol</span>
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="confirmPassword" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Confirm password</label>
                <div class="relative">
                    <input 
                        type="password" 
                        id="confirmPassword" 
                        name="confirmPassword" 
                        placeholder="Re-enter your password" 
                        required 
                        class="form-input w-full px-3.5 py-2.5 bg-white border border-slate-300 rounded-lg text-slate-900 text-sm placeholder-slate-400 pr-10 font-normal"
                    >
                    <button 
                        type="button" 
                        onclick="togglePasswordVisibility('confirmPassword', 'confirmPasswordToggleIcon')" 
                        class="absolute inset-y-0 right-0 px-3.5 flex items-center text-slate-400 hover:text-slate-600 transition-colors focus:outline-none"
                        aria-label="Toggle confirm password visibility"
                    >
                        <i id="confirmPasswordToggleIcon" class="fa-regular fa-eye text-sm"></i>
                    </button>
                </div>
                <span class="text-xs text-red-500 hidden mt-1" id="confirmPasswordError">Passwords do not match</span>
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
                            class="h-4 w-4 text-indigo-600 border-slate-300 rounded focus:ring-indigo-500 cursor-pointer"
                        >
                    </div>
                    <div class="ml-2.5 text-xs">
                        <label for="terms" class="text-slate-600 leading-normal cursor-pointer select-none">
                            I agree to the <a href="#" onclick="showToast('Terms of Use opened', 'info'); return false;" class="text-indigo-600 hover:underline">Terms of Use</a> and <a href="#" onclick="showToast('Privacy Policy opened', 'info'); return false;" class="text-indigo-600 hover:underline">Privacy Policy</a>, and confirm my company has authorised me to access payroll.
                        </label>
                    </div>
                </div>
                <span class="text-xs text-red-500 hidden mt-1 block" id="termsError">You must accept the terms to continue</span>
            </div>

            <!-- Submit Button -->
            <div class="pt-2">
                <button 
                    type="submit" 
                    class="w-full py-3 px-4 bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800 text-white font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-200 text-sm flex items-center justify-center space-x-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                >
                    <span>Create account</span>
                </button>
            </div>
        </form>

        <!-- Footer Helper Note -->
        <div class="mt-6 pt-4 border-t border-slate-100 text-center">
            <p class="text-xs text-slate-500 font-medium">
                Don’t have a company code? <a href="#" onclick="showToast('Contacting payroll administrator...', 'info'); return false;" class="text-indigo-600 font-semibold hover:underline">Ask your payroll administrator.</a>
            </p>
        </div>
    </div>

    <!-- Toast Notification Container -->
    <div id="toast" class="fixed bottom-5 right-5 transform translate-y-20 opacity-0 transition-all duration-300 ease-out max-w-sm bg-slate-900 text-white text-xs px-4 py-3 rounded-lg shadow-xl flex items-center space-x-2 z-50">
        <i id="toastIcon" class="fa-solid fa-circle-info text-indigo-400 text-base"></i>
        <span id="toastMessage" class="font-medium">Notification message</span>
    </div>

    <!-- Success Modal -->
    <div id="successModal" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm hidden items-center justify-center p-4 z-50 opacity-0 transition-opacity duration-300">
        <div class="bg-white rounded-2xl max-w-sm w-full p-6 text-center transform scale-95 transition-transform duration-300 shadow-2xl">
            <div class="w-12 h-12 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center mx-auto mb-4 text-xl">
                <i class="fa-solid fa-check"></i>
            </div>
            <h3 class="text-xl font-bold text-slate-900 mb-1">Account Created!</h3>
            <p class="text-xs text-slate-600 mb-6 leading-relaxed">
                Welcome onboard! We have sent a confirmation email to <span id="userEmailDisplay" class="font-semibold text-slate-800"></span>.
            </p>
            <button 
                onclick="closeModal()" 
                class="w-full py-2.5 px-4 bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-semibold rounded-lg shadow transition-colors"
            >
                Continue to Dashboard
            </button>
        </div>
    </div>

    
</body>
</html>