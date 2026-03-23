<!DOCTYPE html>
<html lang="fr">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Creer un utilisateur</title>

<script src="https://cdn.tailwindcss.com"></script>

<link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

<script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    primary: "#1f003d",
                    background: "#f5f6fa"
                }
            }
        }
    }
</script>

<style>
body {
    font-family: 'Public Sans', sans-serif;
    background: #f5f6fa;
}

.material-symbols-outlined {
    font-variation-settings:
        'FILL' 0,
        'wght' 400,
        'GRAD' 0,
        'opsz' 24;
}

@keyframes floatSlow {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-2px); }
}

.animate-float-slow {
    animation: floatSlow 3.5s ease-in-out infinite;
}

@keyframes pulseSoft {
    0%, 100% { transform: scale(1); opacity: 1; }
    50% { transform: scale(1.04); opacity: 0.9; }
}

.animate-pulse-soft {
    animation: pulseSoft 2s ease-in-out infinite;
}

nav::-webkit-scrollbar {
    width: 5px;
}

nav::-webkit-scrollbar-thumb {
    background: rgba(148, 163, 184, 0.5);
    border-radius: 9999px;
}

nav::-webkit-scrollbar-track {
    background: transparent;
}
</style>

</head>

<body class="bg-background text-slate-900">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-64 h-screen sticky top-0 bg-white border-r border-slate-200 flex flex-col shadow-sm">

        <div class="relative px-5 py-4 border-b border-slate-200 overflow-hidden shrink-0">
            <div class="absolute inset-0 bg-gradient-to-br from-primary/10 via-white to-fuchsia-100/30"></div>

            <div class="relative flex items-center gap-3">
                <div class="animate-float-slow w-10 h-10 rounded-xl bg-gradient-to-br from-primary to-purple-700 flex items-center justify-center text-white shadow-md shadow-primary/20">
                    <span class="material-icons text-[20px]">account_balance</span>
                </div>

                <div>
                    <h1 class="text-lg font-extrabold tracking-tight text-slate-800">
                        Province AL Haouz
                    </h1>
                    <p class="text-[11px] text-slate-500 font-medium">
                        Gestion du systeme
                    </p>
                </div>
            </div>
        </div>

        <nav class="flex-1 p-3 space-y-1.5 overflow-y-auto">

            <a href="{{ route('dashboard') }}"
               class="{{ request()->routeIs('dashboard') ? 'group relative flex items-center gap-3 px-3 py-2.5 rounded-xl bg-gradient-to-r from-primary/15 to-primary/5 text-primary font-semibold shadow-sm transition-all duration-300' : 'group relative flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-700 font-medium transition-all duration-300 hover:bg-gradient-to-r hover:from-slate-100 hover:to-white hover:text-primary' }}">
                @if(request()->routeIs('dashboard'))
                    <div class="absolute left-0 top-2 bottom-2 w-1 rounded-r-full bg-primary"></div>
                @endif

                <div class="w-9 h-9 rounded-lg bg-slate-100 flex items-center justify-center transition-all duration-300 group-hover:bg-primary/10 group-hover:text-primary">
                    <span class="material-symbols-outlined text-[18px]">dashboard</span>
                </div>

                <span class="text-[15px]">Tableau de bord</span>
            </a>

            <a href="{{ route('reclamations.index') }}"
               class="{{ request()->routeIs('reclamations.*') ? 'group relative flex items-center gap-3 px-3 py-2.5 rounded-xl bg-gradient-to-r from-primary/15 to-primary/5 text-primary font-semibold shadow-sm transition-all duration-300' : 'group relative flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-700 font-medium transition-all duration-300 hover:bg-gradient-to-r hover:from-slate-100 hover:to-white hover:text-primary' }}">
                @if(request()->routeIs('reclamations.*'))
                    <div class="absolute left-0 top-2 bottom-2 w-1 rounded-r-full bg-primary"></div>
                @endif

                <div class="w-9 h-9 rounded-lg bg-slate-100 flex items-center justify-center transition-all duration-300 group-hover:bg-primary/10 group-hover:text-primary">
                    <span class="material-symbols-outlined text-[18px]">chat_bubble</span>
                </div>

                <span class="text-[15px]">Reclamations</span>
            </a>

            <a href="{{ route('services.index') }}"
               class="{{ request()->routeIs('services.*') ? 'group relative flex items-center gap-3 px-3 py-2.5 rounded-xl bg-gradient-to-r from-primary/15 to-primary/5 text-primary font-semibold shadow-sm transition-all duration-300' : 'group relative flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-700 font-medium transition-all duration-300 hover:bg-gradient-to-r hover:from-slate-100 hover:to-white hover:text-primary' }}">
                @if(request()->routeIs('services.*'))
                    <div class="absolute left-0 top-2 bottom-2 w-1 rounded-r-full bg-primary"></div>
                @endif

                <div class="w-9 h-9 rounded-lg bg-slate-100 flex items-center justify-center transition-all duration-300 group-hover:bg-primary/10 group-hover:text-primary">
                    <span class="material-symbols-outlined text-[18px]">analytics</span>
                </div>

                <span class="text-[15px]">Services</span>
            </a>

            <a href="{{ route('divisions.index') }}"
               class="{{ request()->routeIs('divisions.*') ? 'group relative flex items-center gap-3 px-3 py-2.5 rounded-xl bg-gradient-to-r from-primary/15 to-primary/5 text-primary font-semibold shadow-sm transition-all duration-300' : 'group relative flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-700 font-medium transition-all duration-300 hover:bg-gradient-to-r hover:from-slate-100 hover:to-white hover:text-primary' }}">
                @if(request()->routeIs('divisions.*'))
                    <div class="absolute left-0 top-2 bottom-2 w-1 rounded-r-full bg-primary"></div>
                @endif

                <div class="w-9 h-9 rounded-lg bg-slate-100 flex items-center justify-center transition-all duration-300 group-hover:bg-primary/10 group-hover:text-primary">
                    <span class="material-symbols-outlined text-[18px]">apartment</span>
                </div>

                <span class="text-[15px]">Divisions</span>
            </a>

            <a href="{{ route('users.index') }}"
               class="{{ request()->routeIs('users.*') ? 'group relative flex items-center gap-3 px-3 py-2.5 rounded-xl bg-gradient-to-r from-primary/15 to-primary/5 text-primary font-semibold shadow-sm transition-all duration-300' : 'group relative flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-700 font-medium transition-all duration-300 hover:bg-gradient-to-r hover:from-slate-100 hover:to-white hover:text-primary' }}">
                @if(request()->routeIs('users.*'))
                    <div class="absolute left-0 top-2 bottom-2 w-1 rounded-r-full bg-primary"></div>
                @endif

                <div class="w-9 h-9 rounded-lg bg-slate-100 flex items-center justify-center transition-all duration-300 group-hover:bg-primary/10 group-hover:text-primary">
                    <span class="material-symbols-outlined text-[18px]">groups</span>
                </div>

                <span class="text-[15px]">Utilisateurs</span>
            </a>

        </nav>

        <div class="p-3 border-t border-slate-200 bg-gradient-to-t from-slate-50 to-white shrink-0">
            <a href="{{ route('profile.edit') }}"
               class="group flex items-center gap-3 p-3 rounded-xl border border-slate-200 bg-white shadow-sm hover:shadow-md transition-all duration-300">

                <div class="relative w-10 h-10 rounded-full bg-gradient-to-br from-slate-200 to-slate-300 flex items-center justify-center text-slate-700 shadow-inner">
                    <span class="material-symbols-outlined text-[20px]">person</span>
                    <span class="absolute bottom-0 right-0 w-3 h-3 bg-green-500 border-2 border-white rounded-full animate-pulse-soft"></span>
                </div>

                <div class="flex-1 min-w-0">
                    <p class="text-sm font-bold text-slate-800 truncate">
                        {{ auth()->user()->name }}
                    </p>
                    <p class="text-[11px] text-slate-500">
                        Admin
                    </p>
                </div>

                <span class="material-symbols-outlined text-slate-400 group-hover:text-primary transition text-[20px]">
                    chevron_right
                </span>
            </a>
        </div>

    </aside>

    <!-- MAIN -->
    <div class="flex-1 flex flex-col overflow-hidden">

        <!-- HEADER -->
        <div class="flex justify-between items-center bg-white border-b border-slate-200 px-6 py-4">
            <div>
                <h2 class="text-lg font-bold text-slate-800">
                    Creer un utilisateur
                </h2>
                <p class="text-xs text-slate-500">
                    Ajouter un nouvel utilisateur
                </p>
            </div>

            <a href="{{ route('users.index') }}"
               class="bg-slate-100 text-slate-700 px-3.5 py-2 rounded-lg flex items-center gap-1.5 shadow-sm hover:bg-slate-200 transition text-sm font-semibold">
                <span class="material-symbols-outlined text-[18px]">arrow_back</span>
                Retour
            </a>
        </div>

        <!-- CONTENT -->
        <div class="flex-1 overflow-y-auto p-6">

            @if($errors->any())
                <div class="mb-5 bg-red-50 text-red-700 px-4 py-3 rounded-lg border border-red-200 text-sm">
                    <ul class="space-y-1">
                        @foreach($errors->all() as $error)
                            <li>- {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="max-w-4xl mx-auto">
                <div class="bg-white shadow-sm rounded-2xl border border-slate-200 overflow-hidden">

                    <div class="px-6 py-5 border-b border-slate-100 bg-slate-50/70">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-lg font-bold text-slate-800">
                                    Informations de l'utilisateur
                                </h3>
                                <p class="text-sm text-slate-500 mt-1">
                                    Remplissez les champs ci-dessous pour creer un nouvel utilisateur.
                                </p>
                            </div>

                            <div class="hidden md:flex w-12 h-12 rounded-xl bg-primary/10 items-center justify-center text-primary">
                                <span class="material-symbols-outlined text-[22px]">person_add</span>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('users.store') }}" method="POST" class="p-6 space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            <div class="md:col-span-2">
                                <label class="block text-sm font-semibold text-slate-700 mb-2">
                                    Nom
                                </label>

                                <input
                                    type="text"
                                    name="name"
                                    value="{{ old('name') }}"
                                    class="w-full border border-slate-200 rounded-xl px-4 py-3 bg-slate-50 text-sm focus:outline-none focus:ring-2 focus:ring-primary/10 focus:border-primary"
                                    placeholder="Entrer le nom complet"
                                    required>

                                @error('name')
                                    <div class="mt-2 text-sm text-red-600">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-sm font-semibold text-slate-700 mb-2">
                                    Email
                                </label>

                                <input
                                    type="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    class="w-full border border-slate-200 rounded-xl px-4 py-3 bg-slate-50 text-sm focus:outline-none focus:ring-2 focus:ring-primary/10 focus:border-primary"
                                    placeholder="Entrer l'adresse email"
                                    required>

                                @error('email')
                                    <div class="mt-2 text-sm text-red-600">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">
                                    Mot de passe
                                </label>

                                <input
                                    type="password"
                                    name="password"
                                    class="w-full border border-slate-200 rounded-xl px-4 py-3 bg-slate-50 text-sm focus:outline-none focus:ring-2 focus:ring-primary/10 focus:border-primary"
                                    required>

                                @error('password')
                                    <div class="mt-2 text-sm text-red-600">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">
                                    Confirmer le mot de passe
                                </label>

                                <input
                                    type="password"
                                    name="password_confirmation"
                                    class="w-full border border-slate-200 rounded-xl px-4 py-3 bg-slate-50 text-sm focus:outline-none focus:ring-2 focus:ring-primary/10 focus:border-primary"
                                    required>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">
                                    Service
                                </label>

                                <select
                                    name="service_id"
                                    class="w-full border border-slate-200 rounded-xl px-4 py-3 bg-slate-50 text-sm focus:outline-none focus:ring-2 focus:ring-primary/10 focus:border-primary">

                                    <option value="">-- Choisir un service --</option>

                                    @foreach($services as $service)
                                        <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>
                                            {{ $service->name }}
                                        </option>
                                    @endforeach

                                </select>

                                @error('service_id')
                                    <div class="mt-2 text-sm text-red-600">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">
                                    Role
                                </label>

                                <select
                                    name="role"
                                    class="w-full border border-slate-200 rounded-xl px-4 py-3 bg-slate-50 text-sm focus:outline-none focus:ring-2 focus:ring-primary/10 focus:border-primary">

                                    <option value="">-- Choisir un role --</option>

                                    @foreach($roles as $role)
                                        <option value="{{ $role->name }}" {{ old('role') == $role->name ? 'selected' : '' }}>
                                            {{ $role->name }}
                                        </option>
                                    @endforeach

                                </select>

                                @error('role')
                                    <div class="mt-2 text-sm text-red-600">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>

                        <div class="pt-4 border-t border-slate-100 flex items-center justify-end gap-3">
                            <a
                                href="{{ route('users.index') }}"
                                class="px-5 py-2.5 rounded-xl bg-slate-100 text-slate-700 text-sm font-medium hover:bg-slate-200 transition">
                                Annuler
                            </a>

                            <button
                                type="submit"
                                class="bg-primary text-white px-5 py-2.5 rounded-xl hover:opacity-90 flex items-center gap-2 text-sm font-semibold shadow-sm transition">
                                <span class="material-symbols-outlined text-[18px]">person_add</span>
                                Creer un utilisateur
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>

</body>
</html>