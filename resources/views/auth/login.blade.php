<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GovResolve - Official Login</title>

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
                    },
                    borderRadius: {
                        DEFAULT: "0.25rem",
                        lg: "0.5rem",
                        xl: "0.75rem",
                        full: "9999px"
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
                        <span class="material-symbols-outlined text-3xl">account_balance</span>
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

                <!-- TOP CARD -->
                <div class="relative h-32 bg-sidebar-dark flex items-center justify-center overflow-hidden">

                    <div class="absolute inset-0 opacity-20"
                        style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 24px 24px;">
                    </div>

                    <div class="relative z-10 text-center text-white">
                        <span class="material-symbols-outlined text-white text-5xl">
                            admin_panel_settings
                        </span>
                    </div>

                </div>

                <!-- FORM -->
                <div class="p-8">

                    <!-- TITLE -->
                    <div class="text-center mb-8">

                        <h1 class="text-2xl font-bold text-slate-900 dark:text-slate-100">
                            Officer Login
                        </h1>

                        <p class="text-slate-500 dark:text-slate-400 mt-2 text-sm font-medium">
                            Complaint Management System Dashboard
                        </p>

                    </div>

                    @if(session('status'))
                    <div class="mb-4 text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                    @endif

                    <!-- LOGIN FORM -->
                    <form method="POST" action="{{ route('login') }}" class="space-y-6">

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

                        <!-- PASSWORD -->
                        <div>

                            <div class="flex items-center justify-between mb-2">

                                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300">
                                    Password
                                </label>

                                @if (Route::has('password.request'))
                                <a class="text-xs font-medium text-primary hover:underline"
                                    href="{{ route('password.request') }}">
                                    Forgot Password?
                                </a>
                                @endif

                            </div>

                            <div class="relative">

                                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg">
                                    lock
                                </span>

                                <input
                                    class="w-full pl-10 pr-10 py-3 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg text-slate-900 dark:text-slate-100 focus:ring-2 focus:ring-primary focus:border-transparent placeholder:text-slate-400"
                                    id="password"
                                    name="password"
                                    type="password"
                                    placeholder="••••••••"
                                    required>

                            </div>

                            @error('password')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror

                        </div>

                        <!-- REMEMBER -->
                        <div class="flex items-center">

                            <input
                                class="h-4 w-4 text-primary focus:ring-primary border-slate-300 rounded"
                                id="remember"
                                name="remember"
                                type="checkbox">

                            <label class="ml-2 block text-sm text-slate-600 dark:text-slate-400 font-medium">
                                Remember my session
                            </label>

                        </div>

                        <!-- BUTTON -->
                        <button
                            type="submit"
                            class="w-full bg-primary hover:bg-primary/90 text-white font-bold py-3.5 px-4 rounded-lg shadow-lg shadow-primary/20 transition-all flex items-center justify-center gap-2 group">

                            <span>Access Dashboard</span>

                            <span class="material-symbols-outlined text-lg group-hover:translate-x-1 transition-transform">
                                arrow_forward
                            </span>

                        </button>

                    </form>

                    <!-- INFO BOX -->
                    <div class="mt-8 pt-6 border-t border-slate-100 dark:border-slate-800">

                        <div class="flex items-start gap-3 p-4 bg-slate-50 dark:bg-slate-800/50 rounded-lg border border-slate-200 dark:border-slate-800">

                            <span class="material-symbols-outlined text-primary text-xl">
                                info
                            </span>

                            <p class="text-xs leading-relaxed text-slate-600 dark:text-slate-400">
                                This is a secure government system. Unauthorized access is prohibited and subject to legal action.
                            </p>

                        </div>

                    </div>

                </div>

            </div>

            <!-- COPYRIGHT -->
            <p class="mt-8 text-center text-slate-500 text-xs font-medium">
                © 2026 GovResolve Complaint Management System. All Rights Reserved.
            </p>

        </div>

    </main>

    <!-- FOOTER -->
    <footer class="py-6 px-4 border-t border-slate-200 dark:border-slate-800 text-center bg-white dark:bg-slate-900"></footer>

</body>

</html>