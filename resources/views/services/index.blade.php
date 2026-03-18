<!DOCTYPE html>
<html lang="fr">

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Gestion des services</title>

<script src="https://cdn.tailwindcss.com?plugins=forms"></script>

<link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">

<script>
tailwind.config = {
darkMode:"class",
theme:{
extend:{
colors:{
primary:"#1f003d",
"background-light":"#f6f6f8",
"background-dark":"#101622"
},
fontFamily:{
display:["Public Sans"]
}
}
}
}
</script>

<style>
body{
font-family:"Public Sans",sans-serif;
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

<body class="bg-background-light font-display min-h-screen">

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

        @can('view_dashboard')
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
        @endcan

        @canany(['view_reclamations', 'create_reclamations', 'assign_reclamations', 'transfer_reclamations', 'respond_reclamations'])
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
        @endcanany

        @if(auth()->user()->hasPermissionTo('manage_services') || auth()->user()->hasPermissionTo('view_own_service'))
    <a href="{{ auth()->user()->hasPermissionTo('manage_services') ? route('services.index') : route('services.my') }}"
       class="{{ request()->routeIs('services.*') ? 'group relative flex items-center gap-3 px-3 py-2.5 rounded-xl bg-gradient-to-r from-primary/15 to-primary/5 text-primary font-semibold shadow-sm transition-all duration-300' : 'group relative flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-700 font-medium transition-all duration-300 hover:bg-gradient-to-r hover:from-slate-100 hover:to-white hover:text-primary' }}">

        @if(request()->routeIs('services.*'))
            <div class="absolute left-0 top-2 bottom-2 w-1 rounded-r-full bg-primary"></div>
        @endif

        <div class="w-9 h-9 rounded-lg bg-slate-100 flex items-center justify-center transition-all duration-300 group-hover:bg-primary/10 group-hover:text-primary">
            <span class="material-symbols-outlined text-[18px]">analytics</span>
        </div>

        <span class="text-[15px]">Services</span>
    </a>
@endif

        @can('manage_divisions')
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
        @endcan

        @can('manage_users')
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
        @endcan

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

<!-- HEADER -->

<header class="h-14 bg-white border-b border-slate-200 flex items-center justify-between px-6">

    <h2 class="font-bold text-lg text-slate-800">
        Gestion des services
    </h2>

    @can('manage_services')
    <a href="{{ route('services.create') }}"
       class="bg-primary text-white px-3.5 py-2 rounded-lg flex items-center gap-1.5 font-semibold hover:bg-primary/90 text-sm shadow-sm">

        <span class="material-icons text-[18px]">add</span>
        Creer un service

    </a>
    @endcan

</header>

<!-- CONTENT -->

<div class="flex-1 overflow-y-auto p-6">

    @if(session('success'))

        <div class="mb-5 px-4 py-3 bg-green-50 border border-green-200 rounded-lg text-green-700 text-sm">
            {{ session('success') }}
        </div>

    @endif

    <!-- FILTER -->

    <div class="bg-white border border-slate-200 rounded-lg p-4 mb-5">

        <form method="GET" action="{{ route('services.index') }}" class="flex items-center gap-3 flex-wrap">

            <label class="font-semibold text-sm text-slate-700">
                Filtrer par division
            </label>

            <select name="division_id"
                    class="px-3 py-2 border border-slate-200 rounded-lg bg-slate-50 text-sm">

                <option value="">Toutes les divisions</option>

                @foreach($divisions as $division)

                    <option value="{{ $division->id }}"
                        {{ request('division_id') == $division->id ? 'selected' : '' }}>

                        {{ $division->name }}

                    </option>

                @endforeach

            </select>

            <button type="submit"
                    class="bg-primary text-white px-3.5 py-2 rounded-lg text-sm font-semibold hover:bg-primary/90">

                Filtrer

            </button>

        </form>

    </div>

    <!-- TABLE -->

    <div class="bg-white border border-slate-200 rounded-lg overflow-hidden shadow-sm">

        <div class="overflow-x-auto">

            <table class="w-full text-left">

                <thead class="bg-slate-50 text-[11px] uppercase text-slate-500 font-bold">

                    <tr>

                        <th class="px-5 py-3.5">ID</th>
                        <th class="px-5 py-3.5">Division</th>
                        <th class="px-5 py-3.5">Service</th>
                        <th class="px-5 py-3.5">Code</th>
                        <th class="px-5 py-3.5">Statut</th>
                        <th class="px-5 py-3.5 text-right">Actions</th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-slate-100 text-sm">

                    @foreach($services as $service)

                        <tr class="hover:bg-slate-50 transition">

                            <td class="px-5 py-3.5 font-mono text-xs text-slate-500">
                                SRV-{{ $service->id }}
                            </td>

                            <td class="px-5 py-3.5 font-semibold text-sm text-slate-800">
                                {{ $service->division->name }}
                            </td>

                            <td class="px-5 py-3.5 text-sm text-slate-700">
                                {{ $service->name }}
                            </td>

                            <td class="px-5 py-3.5">
                                <span class="px-2 py-1 bg-slate-100 rounded text-[11px] font-semibold">
                                    {{ $service->code }}
                                </span>
                            </td>

                            <td class="px-5 py-3.5">

                                @if($service->is_active)

                                    <span class="inline-flex items-center gap-1.5 px-2 py-1 text-[11px] font-bold bg-green-100 text-green-700 rounded-full">

                                        <span class="w-2 h-2 bg-green-500 rounded-full"></span>

                                        Actif

                                    </span>

                                @else

                                    <span class="inline-flex items-center gap-1.5 px-2 py-1 text-[11px] font-bold bg-gray-100 text-gray-600 rounded-full">

                                        <span class="w-2 h-2 bg-gray-400 rounded-full"></span>

                                        Inactif

                                    </span>

                                @endif

                            </td>

                            <td class="px-5 py-3.5 text-right">

                                <div class="flex justify-end items-center gap-2">

                                    @canany(['manage_services', 'view_own_service'])
                                    <a href="{{ route('services.show',$service->id) }}"
                                       class="p-1.5 text-blue-600 hover:bg-blue-50 rounded-lg transition"
                                       title="Voir">

                                        <span class="material-icons text-[18px]">
                                            visibility
                                        </span>

                                    </a>
                                    @endcanany

                                    @can('manage_services')
                                    <a href="{{ route('services.edit',$service->id) }}"
                                       class="p-1.5 text-primary hover:bg-slate-100 rounded-lg transition"
                                       title="Modifier">

                                        <span class="material-icons text-[18px]">
                                            edit
                                        </span>

                                    </a>
                                    @endcan

                                    @can('manage_services')
                                    <form action="{{ route('services.destroy',$service->id) }}"
                                          method="POST"
                                          class="inline">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                onclick="return confirm('Supprimer ce service ?')"
                                                class="p-1.5 text-red-600 hover:bg-red-50 rounded-lg transition"
                                                title="Supprimer">

                                            <span class="material-icons text-[18px]">
                                                delete
                                            </span>

                                        </button>

                                    </form>
                                    @endcan

                                </div>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

        <div class="p-3.5 border-t border-slate-100">

            {{ $services->appends(request()->query())->links() }}

        </div>

    </div>

</div>

</main>

</div>

</body>
</html>