<!DOCTYPE html>
<html lang="fr">

<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

<title>Gestion des divisions</title>
<link rel="icon" type="image/png" href="{{ asset('myicon.png') }}">
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

<link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet"/>

<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100..700,0..1&display=swap" rel="stylesheet"/>

<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<script>
tailwind.config = {
darkMode: "class",
theme: {
extend: {
colors: {
primary: "#1f003d",
"background-light": "#f6f6f8",
"background-dark": "#101622",
},
fontFamily: {
display: ["Public Sans"]
},
}
}
}
</script>

<style>
.material-symbols-outlined {
font-variation-settings: 'FILL' 0,'wght' 400,'GRAD' 0,'opsz' 24;
}

body{
font-family:"Public Sans",sans-serif;
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

<body class="bg-background-light font-display text-slate-900 min-h-screen">

<div class="flex h-screen overflow-hidden">

<!-- SIDEBAR -->
<aside class="w-64 min-h-screen bg-white border-r border-slate-200 flex flex-col shadow-sm">

    <div class="relative px-5 py-4 border-b border-slate-200 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-primary/10 via-white to-fuchsia-100/30"></div>

        <div class="relative flex items-center gap-3">
            <div class="animate-float-slow w-10 h-10 rounded-xl bg-gradient-to-br from-primary to-purple-700 flex items-center justify-center text-white shadow-md shadow-primary/20">
                <span class="material-symbols-outlined text-[20px]">
                    account_balance
                </span>
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
                <span class="material-symbols-outlined text-[18px]">group</span>
            </div>

            <span class="text-[15px]">Utilisateurs</span>
        </a>

    </nav>

    <div class="p-3 border-t border-slate-200 bg-gradient-to-t from-slate-50 to-white">
        <a href="{{ route('profile.edit') }}"
           class="group flex items-center gap-3 p-3 rounded-xl border border-slate-200 bg-white shadow-sm hover:shadow-md transition-all duration-300">

            <div class="relative w-10 h-10 rounded-full bg-gradient-to-br from-slate-200 to-slate-300 flex items-center justify-center text-slate-700 shadow-inner">
                <span class="material-symbols-outlined text-[20px]">
                    person
                </span>

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

<main class="flex-1 flex flex-col overflow-hidden">

<header class="h-14 bg-white border-b border-slate-200 flex items-center justify-between px-6">

    <h2 class="text-lg font-bold text-slate-800">
        Gestion des divisions
    </h2>

    <a href="{{ route('divisions.create') }}"
       class="bg-primary text-white px-3.5 py-2 rounded-lg flex items-center gap-1.5 text-sm font-semibold shadow-sm hover:bg-primary/90">

        <span class="material-symbols-outlined text-[18px]">add_circle</span>
        Creer une division

    </a>

</header>

<div class="flex-1 overflow-y-auto p-6">

    @if(session('success'))

        <div class="mb-4 px-4 py-3 bg-green-100 text-green-700 rounded-lg text-sm border border-green-200">
            {{ session('success') }}
        </div>

    @endif
        @if(session('error'))
        <div class="mb-4 px-4 py-3 bg-red-100 text-red-700 rounded-lg text-sm border border-red-200">
            {{ session('error') }}
        </div>
    @endif

    <div class="bg-white rounded-lg border border-slate-200 overflow-hidden shadow-sm">

        <div class="overflow-x-auto">

            <table class="w-full text-left">

                <thead>

                    <tr class="bg-slate-50 text-slate-500 text-[11px] font-bold uppercase">

                        <th class="px-5 py-3.5">ID</th>
                        <th class="px-5 py-3.5">Nom de la division</th>
                        <th class="px-5 py-3.5">Code</th>
                        <th class="px-5 py-3.5">Statut</th>
                        <th class="px-5 py-3.5 text-right">Actions</th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-slate-100 text-sm">

                    @foreach($divisions as $division)

                        <tr class="hover:bg-slate-50 transition">

                            <td class="px-5 py-3.5 font-mono text-xs text-slate-500">
                                DIV-{{ $division->id }}
                            </td>

                            <td class="px-5 py-3.5 font-semibold text-sm text-slate-800">
                                {{ $division->name }}
                            </td>

                            <td class="px-5 py-3.5">
                                <span class="px-2 py-1 bg-slate-100 rounded text-[11px] font-semibold">
                                    {{ $division->code }}
                                </span>
                            </td>

                            <td class="px-5 py-3.5">

                                @if($division->is_active)

                                    <span class="inline-flex items-center gap-1.5 px-2 py-1 text-[11px] font-bold bg-green-100 text-green-700 rounded-full">
                                        Actif
                                    </span>

                                @else

                                    <span class="inline-flex items-center gap-1.5 px-2 py-1 text-[11px] font-bold bg-gray-100 text-gray-600 rounded-full">
                                        Inactif
                                    </span>

                                @endif

                            </td>

                            <td class="px-5 py-3.5 text-right">

                                <div class="flex justify-end gap-2">

                                    <a href="{{ route('divisions.show',$division->id) }}"
                                       class="p-1.5 text-blue-500 hover:bg-blue-50 rounded-lg transition">

                                        <span class="material-symbols-outlined text-[18px]">
                                            visibility
                                        </span>

                                    </a>

                                    <a href="{{ route('divisions.edit',$division->id) }}"
                                       class="p-1.5 text-primary hover:bg-slate-100 rounded-lg transition">

                                        <span class="material-symbols-outlined text-[18px]">
                                            edit
                                        </span>

                                    </a>

                                    <form action="{{ route('divisions.destroy',$division->id) }}"
                                          method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button class="p-1.5 text-red-500 hover:bg-red-50 rounded-lg transition">

                                            <span class="material-symbols-outlined text-[18px]">
                                                delete
                                            </span>

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

        <div class="p-3.5 border-t border-slate-100">

            {{ $divisions->links() }}

        </div>

    </div>

</div>

</main>

</div>

</body>
</html>