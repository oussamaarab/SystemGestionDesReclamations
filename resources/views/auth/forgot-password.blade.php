<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>GovResolve - Reset Password</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100..700,0..1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        primary: "#1f003d",
                        "background-light": "#f6f6f8",
                        "background-dark": "#101622",
                        "sidebar-dark": "#0a0a0f"
                    },
                    fontFamily: {
                        display: ["Public Sans", "sans-serif"]
                    }
                }
            }
        }
    </script>

    <style>
        body {
            font-family: "Public Sans", sans-serif;
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark min-h-screen flex flex-col font-display">

    <!-- HEADER -->
    <header class="w-full bg-white dark:bg-slate-900 border-b border-slate-200 dark:border-slate-800">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="flex items-center justify-between h-16">

                <div class="flex items-center gap-3">

                    <div class="text-primary">
                        <span class="material-symbols-outlined text-3xl">
                            account_balance
                        </span>
                    </div>

                    <div class="flex flex-col">
                        <h2 class="text-slate-900 dark:text-slate-100 text-lg font-bold tracking-tight">
                            Province AL Haouz
                        </h2>

                        <span class="text-[10px] uppercase tracking-widest text-slate-500 font-semibold">
                            Government of Administration
                        </span>
                    </div>

                </div>

            </div>

        </div>

    </header>

    <!-- MAIN -->
    <main class="flex-1 flex items-center justify-center pt-4 pb-8 px-4">

        <div class="w-full max-w-md">

            <div class="bg-white dark:bg-slate-900 shadow-xl rounded-xl overflow-hidden border border-slate-200 dark:border-slate-800">

                <!-- CARD HEADER -->
                <div class="relative h-32 bg-sidebar-dark flex items-center justify-center overflow-hidden">

                    <div class="absolute inset-0 opacity-20"
                        style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 24px 24px;">
                    </div>

                    <div class="relative z-10 text-center text-white">
                        <span class="material-symbols-outlined text-white text-5xl">
                            lock_reset
                        </span>
                    </div>

                </div>

                <!-- FORM CARD -->
                <div class="p-8">

                    <!-- TITLE -->
                    <div class="text-center mb-8">

                        <h1 class="text-2xl font-bold text-slate-900 dark:text-slate-100">
                            Reset Password
                        </h1>

                        <p class="text-slate-500 dark:text-slate-400 mt-2 text-sm font-medium">
                            Enter your email to receive a password reset link
                        </p>

                    </div>

                    <!-- DESCRIPTION -->
                    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                        {{ __('Forgot your password? No problem. Just enter your email address and we will send you a reset link.') }}
                    </div>

                    <!-- SESSION STATUS -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- FORM -->
                    <form method="POST" action="{{ route('password.email') }}" class="space-y-6">

                        @csrf

                        <!-- EMAIL -->
                        <div>

                            <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">
                                Official Email Address
                            </label>

                            <div class="relative">

                                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg">
                                    mail
                                </span>

                                <input
                                    class="w-full pl-10 pr-4 py-3 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg text-slate-900 dark:text-slate-100 focus:ring-2 focus:ring-primary focus:border-transparent placeholder:text-slate-400"
                                    id="email"
                                    name="email"
                                    type="email"
                                    value="{{ old('email') }}"
                                    placeholder="officer.name@gov.in"
                                    required>

                            </div>

                            @error('email')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror

                        </div>

                        <!-- BUTTON -->
                        <button
                            type="submit"
                            class="w-full bg-primary hover:bg-primary/90 text-white font-bold py-3.5 px-4 rounded-lg shadow-lg shadow-primary/20 transition-all flex items-center justify-center gap-2 group">

                            <span>Email Password Reset Link</span>

                            <span class="material-symbols-outlined text-lg group-hover:translate-x-1 transition-transform">
                                arrow_forward
                            </span>

                        </button>

                    </form>

                </div>

            </div>

            <!-- COPYRIGHT -->
            <p class="mt-8 text-center text-slate-500 text-xs font-medium">
                © 2026 GovResolve Complaint Management System. All Rights Reserved.
            </p>

        </div>

    </main>

</body>

</html>