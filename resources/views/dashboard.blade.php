<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord d'administration CMS</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: "#1f003d",
                        background: "#f6f6f8"
                    },
                    boxShadow: {
                        soft: "0 8px 24px rgba(15,23,42,0.06)",
                        softlg: "0 14px 34px rgba(15,23,42,0.10)"
                    }
                }
            }
        }
    </script>

    <style>
        body {
            font-family: 'Public Sans', sans-serif;
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

        @keyframes fadeUp {
            0% {
                opacity: 0;
                transform: translateY(12px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes pulseSoft {
            0%, 100% {
                box-shadow: 0 0 0 0 rgba(31, 0, 61, 0.08);
            }
            50% {
                box-shadow: 0 0 0 8px rgba(31, 0, 61, 0.00);
            }
        }

        @keyframes growBar {
            0% {
                transform: scaleY(0);
                opacity: 0;
            }
            100% {
                transform: scaleY(1);
                opacity: 1;
            }
        }

        @keyframes slideWidth {
            0% {
                width: 0;
                opacity: 0.7;
            }
            100% {
                opacity: 1;
            }
        }

        .animate-fade-up {
            animation: fadeUp 0.6s ease both;
        }

        .animate-float-slow {
            animation: floatSlow 3.5s ease-in-out infinite;
        }

        .animate-pulse-soft {
            animation: pulseSoft 2.5s infinite;
        }

        .bar-grow {
            transform-origin: bottom;
            animation: growBar 0.8s ease both;
        }

        .progress-animate {
            animation: slideWidth 0.9s ease both;
        }

        .glass-card {
            background: rgba(255,255,255,0.88);
            backdrop-filter: blur(8px);
        }

        .grid-auto-fit {
            grid-template-columns: repeat(auto-fit, minmax(190px, 1fr));
        }

        .custom-scroll::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        .custom-scroll::-webkit-scrollbar-thumb {
            background: rgba(148, 163, 184, 0.55);
            border-radius: 9999px;
        }

        .custom-scroll::-webkit-scrollbar-track {
            background: transparent;
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
                    {{ ucfirst(strtolower(auth()->user()->getRoleNames()->first() ?? '-')) }}
                </p>
            </div>

            <span class="material-symbols-outlined text-slate-400 group-hover:text-primary transition text-[20px]">
                chevron_right
            </span>
        </a>
    </div>
</aside>

        <!-- MAIN -->
        <main class="flex-1 px-6 py-5 space-y-5 custom-scroll overflow-x-hidden">

            <!-- TOP HEADER -->
            <div class="animate-fade-up flex items-center justify-between gap-4 flex-wrap">
                <div>
                    <p class="text-xs text-slate-500 mb-1.5">Bon retour</p>
                    <h2 class="text-2xl md:text-3xl font-black tracking-tight text-slate-900">
                        Vue d'ensemble du tableau de bord
                    </h2>
                </div>

                <div class="flex items-center gap-3">
                    <a href="{{ route('reclamations.create') }}"
                       class="inline-flex items-center gap-2 rounded-xl bg-primary px-4 py-2.5 text-white text-sm font-semibold shadow-md shadow-primary/15 hover:opacity-95 transition-all duration-300">
                        <span class="material-symbols-outlined text-[18px]">add</span>
                        Nouvelle reclamation
                    </a>
                </div>
            </div>

            <!-- STATS -->
            <div class="grid grid-auto-fit gap-4">

                <div class="animate-fade-up glass-card p-4 rounded-2xl shadow-soft border border-slate-200 hover:-translate-y-0.5 hover:shadow-softlg transition-all duration-300">
                    <div class="flex justify-between items-start mb-4">
                        <div class="p-2.5 bg-primary/10 text-primary rounded-xl">
                            <span class="material-symbols-outlined text-[19px]">inventory_2</span>
                        </div>

                        <span class="text-[11px] font-semibold px-2 py-1 rounded-full bg-primary/10 text-primary">
                            Global
                        </span>
                    </div>

                    <p class="text-slate-500 text-xs font-medium">Total des reclamations</p>
                    <h3 class="text-3xl font-black mt-1.5 tracking-tight">{{ $totalReclamations }}</h3>
                    <p class="mt-2 text-[11px] text-slate-400">Toutes les reclamations enregistrees dans le systeme</p>
                </div>

                <div class="animate-fade-up glass-card p-4 rounded-2xl shadow-soft border border-slate-200 hover:-translate-y-0.5 hover:shadow-softlg transition-all duration-300" style="animation-delay:0.08s;">
                    <div class="flex justify-between items-start mb-4">
                        <div class="p-2.5 bg-amber-100 text-amber-600 rounded-xl">
                            <span class="material-symbols-outlined text-[19px]">pending_actions</span>
                        </div>

                        <span class="text-[11px] font-semibold px-2 py-1 rounded-full bg-amber-100 text-amber-700">
                            En cours
                        </span>
                    </div>

                    <p class="text-slate-500 text-xs font-medium">En cours de traitement</p>
                    <h3 class="text-3xl font-black mt-1.5 tracking-tight">
                        {{ $statusStats['EN_COURS_DE_TRAITEMENT'] ?? 0 }}
                    </h3>
                    <p class="mt-2 text-[11px] text-slate-400">Dossiers actuellement en cours de traitement</p>
                </div>

                <div class="animate-fade-up glass-card p-4 rounded-2xl shadow-soft border border-slate-200 hover:-translate-y-0.5 hover:shadow-softlg transition-all duration-300" style="animation-delay:0.16s;">
                    <div class="flex justify-between items-start mb-4">
                        <div class="p-2.5 bg-emerald-100 text-emerald-600 rounded-xl">
                            <span class="material-symbols-outlined text-[19px]">check_circle</span>
                        </div>

                        <span class="text-[11px] font-semibold px-2 py-1 rounded-full bg-emerald-100 text-emerald-700">
                            Termine
                        </span>
                    </div>

                    <p class="text-slate-500 text-xs font-medium">Traitees</p>
                    <h3 class="text-3xl font-black mt-1.5 tracking-tight">
                        {{ $statusStats['TRAITEE'] ?? 0 }}
                    </h3>
                    <p class="mt-2 text-[11px] text-slate-400">Reclamations resolues avec succes</p>
                </div>

                <div class="animate-fade-up glass-card p-4 rounded-2xl shadow-soft border border-slate-200 hover:-translate-y-0.5 hover:shadow-softlg transition-all duration-300" style="animation-delay:0.24s;">
                    <div class="flex justify-between items-start mb-4">
                        <div class="p-2.5 bg-slate-100 text-slate-600 rounded-xl">
                            <span class="material-symbols-outlined text-[19px]">swap_horiz</span>
                        </div>

                        <span class="text-[11px] font-semibold px-2 py-1 rounded-full bg-slate-100 text-slate-700">
                            Affectee
                        </span>
                    </div>

                    <p class="text-slate-500 text-xs font-medium">Transferees</p>
                    <h3 class="text-3xl font-black mt-1.5 tracking-tight">
                        {{ $statusStats['AFFECTEE'] ?? 0 }}
                    </h3>
                    <p class="mt-2 text-[11px] text-slate-400">Reclamations transferees ou assignees</p>
                </div>

            </div>

            <!-- DIAGRAMS -->
            <div class="grid grid-cols-1 xl:grid-cols-3 gap-4">

                <!-- STATUS DIAGRAM -->
                <div class="animate-fade-up bg-white p-4 rounded-2xl border border-slate-200 shadow-soft hover:shadow-softlg transition-all duration-300">
                    <div class="flex items-center justify-between mb-5">
                        <h4 class="font-bold text-base text-slate-800">Reclamations par statut</h4>
                        <div class="w-9 h-9 rounded-xl bg-primary/10 text-primary flex items-center justify-center">
                            <span class="material-symbols-outlined text-[18px]">donut_large</span>
                        </div>
                    </div>

                    @php
                        $maxStatus = collect($statusStats)->max() ?: 1;
                    @endphp

                    <div class="space-y-4">
                        @foreach($statusStats as $status => $total)
                            <div>
                                <div class="flex justify-between text-xs mb-1.5">
                                    <span class="font-medium text-slate-700">{{ $status }}</span>
                                    <span class="font-bold text-slate-800">{{ $total }}</span>
                                </div>

                                <div class="w-full bg-slate-100 h-2.5 rounded-full overflow-hidden">
                                    <div class="progress-animate h-2.5 rounded-full bg-gradient-to-r from-primary to-purple-600"
                                         style="width: {{ ($total / $maxStatus) * 100 }}%">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- DIVISION CHART -->
                <div class="animate-fade-up xl:col-span-2 bg-white p-4 rounded-2xl border border-slate-200 shadow-soft hover:shadow-softlg transition-all duration-300">
                    <div class="flex items-center justify-between mb-5">
                        <h4 class="font-bold text-base text-slate-800">Reclamations par division</h4>
                        <div class="w-9 h-9 rounded-xl bg-primary/10 text-primary flex items-center justify-center">
                            <span class="material-symbols-outlined text-[18px]">bar_chart</span>
                        </div>
                    </div>

                    @php
                        $maxDivision = collect($divisionStats)->max('reclamations_count') ?: 1;
                    @endphp

                    <div class="overflow-x-auto custom-scroll">
                        <div class="flex items-end gap-4 h-60 min-w-max pt-2 px-1">
                            @foreach($divisionStats as $index => $division)
                                <div class="flex flex-col items-center group min-w-[64px]">
                                    <div class="relative flex items-end h-44">
                                        <div class="bar-grow w-11 rounded-t-xl bg-gradient-to-t from-primary via-purple-700 to-fuchsia-500 shadow-md shadow-primary/15 transition-all duration-300 group-hover:scale-105"
                                             style="height: {{ max((($division->reclamations_count / $maxDivision) * 160), 16) }}px; animation-delay: {{ $index * 0.08 }}s;">
                                        </div>
                                    </div>

                                    <p class="text-[11px] mt-2.5 text-slate-500 text-center font-medium line-clamp-2">
                                        {{ $division->name }}
                                    </p>

                                    <p class="text-xs font-extrabold text-primary mt-1">
                                        {{ $division->reclamations_count }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>

            <!-- LATEST ACTIVITIES -->
        <div class="animate-fade-up bg-white p-4 rounded-2xl border border-slate-200 shadow-soft hover:shadow-softlg transition-all duration-300">
    <div class="flex items-center justify-between mb-5">
        <h4 class="font-bold text-base text-slate-800">Dernieres activites</h4>
        <div class="w-9 h-9 rounded-xl bg-primary/10 text-primary flex items-center justify-center">
            <span class="material-symbols-outlined text-[18px]">history</span>
        </div>
    </div>

    <div class="space-y-3">
        @foreach($latestActivities as $activity)
            <div class="group flex items-start justify-between gap-4 p-3 rounded-xl border border-slate-100 bg-slate-50/80 hover:bg-white hover:border-slate-200 hover:shadow-sm transition-all duration-300">
                <div class="flex items-start gap-3">
                    <div class="w-9 h-9 rounded-xl {{ $activity['type'] === 'assignment' ? 'bg-amber-100 text-amber-700' : 'bg-emerald-100 text-emerald-700' }} flex items-center justify-center shrink-0">
                        <span class="material-symbols-outlined text-[18px]">
                            {{ $activity['type'] === 'assignment' ? 'assignment_ind' : 'reply' }}
                        </span>
                    </div>

                    <div>
                        <p class="text-sm font-semibold text-slate-800">
                            {{ $activity['title'] }}
                        </p>

                        <p class="text-[11px] text-slate-500 mt-0.5">
                            {{ $activity['subtitle'] }}
                        </p>
                    </div>
                </div>

                <span class="text-[11px] text-slate-400 whitespace-nowrap">
                    {{ \Carbon\Carbon::parse($activity['date'])->format('d M Y H:i') }}
                </span>
            </div>
        @endforeach
    </div>
</div>

        </main>
    </div>
</body>
</html>