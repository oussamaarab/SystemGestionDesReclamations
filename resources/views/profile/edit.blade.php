<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: "#1f003d",
                        "background-light": "#f6f6f8"
                    },
                    fontFamily: {
                        display: ["Public Sans"]
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
<body class="bg-background-light min-h-screen font-display">

    <div class="py-10 min-h-screen">
        <div class="max-w-5xl mx-auto px-6 space-y-6">

            <div class="flex items-center justify-between flex-wrap gap-4">
    <div>
        <p class="text-sm text-slate-500 mb-1">Account settings</p>
        <h2 class="font-bold text-2xl text-slate-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </div>

    <div class="flex items-center gap-3">
        <a href="{{ route('dashboard') }}"
           class="inline-flex items-center gap-2 rounded-xl bg-white border border-slate-200 px-4 py-2.5 text-slate-700 font-medium shadow-sm hover:bg-slate-50 hover:text-primary transition">
            <span class="material-icons text-[18px]">arrow_back</span>
            Back
        </a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit"
                class="inline-flex items-center gap-2 rounded-xl bg-red-600 px-4 py-2.5 text-white font-medium shadow-sm hover:bg-red-700 transition">
                <span class="material-icons text-[18px]">logout</span>
                Logout
            </button>
        </form>
    </div>
</div>

            <div class="bg-white border border-slate-200 shadow-[0_10px_30px_rgba(15,23,42,0.08)] rounded-2xl overflow-hidden">
                <div class="px-6 py-5 border-b border-slate-200 bg-gradient-to-r from-white to-slate-50">
                    <h3 class="text-lg font-semibold text-slate-800">Informations personnelles</h3>
                    <p class="text-sm text-slate-500 mt-1">Modifier les informations de votre compte et votre adresse email.</p>
                </div>

                <div class="p-6 sm:p-8">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="bg-white border border-slate-200 shadow-[0_10px_30px_rgba(15,23,42,0.08)] rounded-2xl overflow-hidden">
                <div class="px-6 py-5 border-b border-slate-200 bg-gradient-to-r from-white to-slate-50">
                    <h3 class="text-lg font-semibold text-slate-800">Securite</h3>
                    <p class="text-sm text-slate-500 mt-1">Mettez a jour votre mot de passe pour securiser votre compte.</p>
                </div>

                <div class="p-6 sm:p-8">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="bg-white border border-red-200 shadow-[0_10px_30px_rgba(15,23,42,0.08)] rounded-2xl overflow-hidden">
                <div class="px-6 py-5 border-b border-red-200 bg-gradient-to-r from-red-50 to-white">
                    <h3 class="text-lg font-semibold text-red-700">Zone dangereuse</h3>
                    <p class="text-sm text-red-600 mt-1">Cette action est irreversible. Veuillez proceder avec prudence.</p>
                </div>

                <div class="p-6 sm:p-8">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>

</body>
</html>