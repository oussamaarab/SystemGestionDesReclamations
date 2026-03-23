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
                        "sidebar-dark": "#0a0a0f",
                        "primary-soft": "#2f0d57",
                        "line-light": "#e8ebf2"
                    },
                    fontFamily: {
                        display: ["Public Sans", "sans-serif"]
                    },
                    borderRadius: {
                        DEFAULT: "0.25rem",
                        lg: "0.5rem",
                        xl: "0.75rem",
                        "2xl": "1rem",
                        full: "9999px"
                    },
                    boxShadow: {
                        soft: "0 10px 30px rgba(15, 23, 42, 0.08)",
                        card: "0 20px 50px rgba(15, 23, 42, 0.12)",
                        glow: "0 12px 35px rgba(31, 0, 61, 0.22)"
                    }
                }
            }
        }
    </script>

    <style>
        body {
            font-family: "Public Sans", sans-serif;
            background-image:
                radial-gradient(circle at top left, rgba(31, 0, 61, 0.08), transparent 28%),
                radial-gradient(circle at bottom right, rgba(99, 102, 241, 0.06), transparent 22%);
        }

        .material-symbols-outlined {
            font-variation-settings:
                'FILL' 0,
                'wght' 500,
                'GRAD' 0,
                'opsz' 24;
        }

        @keyframes floatSoft {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-4px);
            }
        }

        @keyframes pulseRing {
            0% {
                box-shadow: 0 0 0 0 rgba(255,255,255,0.18);
            }
            70% {
                box-shadow: 0 0 0 18px rgba(255,255,255,0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(255,255,255,0);
            }
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(14px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-float-soft {
            animation: floatSoft 4s ease-in-out infinite;
        }

        .animate-fade-up {
            animation: fadeUp 0.7s ease-out both;
        }

        .animate-pulse-ring {
            animation: pulseRing 2.6s infinite;
        }

        .glass-panel {
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        input::placeholder {
            letter-spacing: 0.01em;
        }
    </style>

</head>

<body class="bg-background-light dark:bg-background-dark min-h-screen flex flex-col font-display text-slate-800 dark:text-slate-100">

    <!-- HEADER -->
    <header class="w-full bg-white/90 dark:bg-slate-900/90 glass-panel border-b border-slate-200/80 dark:border-slate-800 sticky top-0 z-20">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="flex items-center justify-between h-16">

                <div class="flex items-center gap-3">

                    <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-primary via-primary-soft to-purple-700 text-white flex items-center justify-center shadow-glow animate-float-soft">
                        <span class="material-symbols-outlined text-[28px]">account_balance</span>
                    </div>

                    <div class="flex flex-col">
                        <h2 class="text-slate-900 dark:text-slate-100 text-lg font-extrabold tracking-tight">
                            Province AL Haouz
                        </h2>

                        <span class="text-[10px] uppercase tracking-[0.22em] text-slate-500 font-bold">
                            Government of Administration
                        </span>
                    </div>

                </div>

            </div>

        </div>

    </header>

    <!-- MAIN -->
    <main class="flex-1 flex items-center justify-center py-4 px-4">

        <div class="w-full max-w-md animate-fade-up">

            <div class="relative bg-white/95 dark:bg-slate-900/95 glass-panel shadow-card rounded-2xl overflow-hidden border border-white/60 dark:border-slate-800">

                <div class="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-primary via-purple-600 to-fuchsia-500"></div>

                <!-- TOP CARD -->
                <div class="relative h-24 bg-gradient-to-br from-sidebar-dark via-primary to-purple-900 flex items-center justify-center overflow-hidden">

                    <div class="absolute inset-0 opacity-20"
                        style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 24px 24px;">
                    </div>

                    <div class="absolute -top-10 -left-10 w-32 h-32 rounded-full bg-white/10 blur-2xl"></div>
                    <div class="absolute -bottom-10 -right-8 w-32 h-32 rounded-full bg-fuchsia-400/10 blur-2xl"></div>

                    <div class="relative z-10 text-center text-white">
                        <div class="w-16 h-16 mx-auto rounded-full border border-white/20 bg-white/10 flex items-center justify-center shadow-2xl animate-pulse-ring">
                            <span class="material-symbols-outlined text-white text-4xl">
                                admin_panel_settings
                            </span>
                        </div>
                    </div>

                </div>

                <!-- FORM -->
                <div class="p-6 sm:p-7">

                    <!-- TITLE -->
                    <div class="text-center mb-6">

                        <h1 class="text-2xl sm:text-[1.7rem] font-extrabold tracking-tight text-slate-900 dark:text-slate-100">
                            Officer Login
                        </h1>

                        <p class="text-slate-500 dark:text-slate-400 mt-2 text-sm font-medium">
                            Complaint Management System Dashboard
                        </p>

                    </div>

                    @if(session('status'))
                    <div class="mb-4 text-sm text-green-700 bg-green-50 border border-green-200 rounded-lg px-4 py-3">
                        {{ session('status') }}
                    </div>
                    @endif

                    <!-- LOGIN FORM -->
                    <form method="POST" action="{{ route('login') }}" class="space-y-4">

                        @csrf

                        <!-- EMAIL -->
                        <div>

                            <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">
                                Official Email Address
                            </label>

                            <div class="relative group">

                                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-primary transition-colors duration-200 text-lg">
                                    mail
                                </span>

                                <input
                                    class="w-full pl-10 pr-4 py-3 bg-slate-50/90 dark:bg-slate-800/90 border border-slate-200 dark:border-slate-700 rounded-xl text-slate-900 dark:text-slate-100 focus:ring-4 focus:ring-primary/10 focus:border-primary placeholder:text-slate-400 shadow-sm transition-all duration-200 hover:border-slate-300 dark:hover:border-slate-600"
                                    id="email"
                                    name="email"
                                    type="email"
                                    value="{{ old('email') }}"
                                    placeholder="officer.name@gov.in"
                                    required>

                            </div>

                            @error('email')
                            <p class="text-red-500 text-xs mt-2 font-medium">{{ $message }}</p>
                            @enderror

                        </div>

                        <!-- PASSWORD -->
                        <div>

                            <div class="flex items-center justify-between mb-2">

                                <label class="block text-sm font-bold text-slate-700 dark:text-slate-300">
                                    Password
                                </label>

                                @if (Route::has('password.request'))
                                <a class="text-xs font-semibold text-primary hover:text-primary-soft hover:underline transition"
                                    href="{{ route('password.request') }}">
                                    Forgot Password?
                                </a>
                                @endif

                            </div>

                            <div class="relative group">

                                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-primary transition-colors duration-200 text-lg">
                                    lock
                                </span>

                                <input
                                    class="w-full pl-10 pr-10 py-3 bg-slate-50/90 dark:bg-slate-800/90 border border-slate-200 dark:border-slate-700 rounded-xl text-slate-900 dark:text-slate-100 focus:ring-4 focus:ring-primary/10 focus:border-primary placeholder:text-slate-400 shadow-sm transition-all duration-200 hover:border-slate-300 dark:hover:border-slate-600"
                                    id="password"
                                    name="password"
                                    type="password"
                                    placeholder="••••••••"
                                    required>

                            </div>

                            @error('password')
                            <p class="text-red-500 text-xs mt-2 font-medium">{{ $message }}</p>
                            @enderror

                        </div>

                        <!-- REMEMBER -->
                        <div class="flex items-center justify-between gap-3 rounded-xl border border-slate-200 dark:border-slate-800 bg-slate-50/80 dark:bg-slate-800/40 px-4 py-3">

                            <div class="flex items-center">
                                <input
                                    class="h-4 w-4 text-primary focus:ring-primary border-slate-300 rounded"
                                    id="remember"
                                    name="remember"
                                    type="checkbox">

                                <label class="ml-2 block text-sm text-slate-600 dark:text-slate-400 font-semibold">
                                    Remember my session
                                </label>
                            </div>

                            <span class="hidden sm:inline-flex items-center gap-1 text-[11px] font-semibold uppercase tracking-wider text-slate-400">
                                <span class="w-2 h-2 rounded-full bg-green-500"></span>
                                Secure
                            </span>

                        </div>

                        <!-- BUTTON -->
                        <button
                            type="submit"
                            class="w-full bg-gradient-to-r from-primary via-primary-soft to-purple-700 hover:from-primary hover:via-purple-900 hover:to-purple-800 text-white font-extrabold py-3 px-4 rounded-xl shadow-glow transition-all duration-300 flex items-center justify-center gap-2 group hover:-translate-y-0.5 active:translate-y-0">

                            <span>Access Dashboard</span>

                            <span class="material-symbols-outlined text-lg group-hover:translate-x-1 transition-transform duration-300">
                                arrow_forward
                            </span>

                        </button>

                    </form>

                    <!-- INFO BOX -->
                    <div class="mt-6 pt-4 border-t border-slate-100 dark:border-slate-800">

                        <div class="flex items-start gap-3 p-3 rounded-xl border border-slate-200 dark:border-slate-800 bg-gradient-to-r from-slate-50 to-white dark:from-slate-800/70 dark:to-slate-800/40 shadow-soft">

                            <div class="w-9 h-9 rounded-lg bg-primary/10 text-primary flex items-center justify-center shrink-0">
                                <span class="material-symbols-outlined text-xl">
                                    info
                                </span>
                            </div>

                            <p class="text-xs leading-relaxed text-slate-600 dark:text-slate-400 font-medium">
                                This is a secure government system. Unauthorized access is prohibited and subject to legal action.
                            </p>

                        </div>

                    </div>

                </div>

            </div>

            <!-- COPYRIGHT -->
            <p class="mt-5 text-center text-slate-500 text-xs font-semibold tracking-wide">
                © 2026 Complaint Management System. All Rights Reserved.
            </p>

        </div>

    </main>

    <!-- FOOTER -->
    <footer class="py-4 px-4 border-t border-slate-200 dark:border-slate-800 text-center bg-white/90 dark:bg-slate-900/90 glass-panel"></footer>

</body>

</html>