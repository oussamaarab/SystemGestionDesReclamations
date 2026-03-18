<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panneau d'administration</title>

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
        <div class="flex-1">

            <!-- HEADER -->
            <div class="flex justify-between items-center bg-white border-b border-slate-200 px-6 py-4">
                <h2 class="text-lg font-bold text-slate-800">
                    Gestion des utilisateurs
                </h2>

                <a href="{{ route('users.create') }}"
                   class="bg-primary text-white px-3.5 py-2 rounded-lg flex items-center gap-1.5 shadow-sm hover:opacity-90 transition text-sm">
                    <span class="material-symbols-outlined text-[18px]">add</span>
                    Creer un utilisateur
                </a>
            </div>

            <!-- TABLE -->
            <div class="p-6">

                @if(session('success'))
                    <div class="mb-5 bg-green-100 text-green-700 px-4 py-3 rounded-lg border border-green-200 text-sm">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="bg-white rounded-lg shadow-sm border border-slate-200 overflow-hidden">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-slate-50 text-left text-xs text-slate-500 uppercase">
                                <th class="px-5 py-3.5">Utilisateur</th>
                                <th class="px-5 py-3.5">Service</th>
                                <th class="px-5 py-3.5">Role</th>
                                <th class="px-5 py-3.5">Statut</th>
                                <th class="px-5 py-3.5 text-right">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($users as $user)
                                <tr class="border-t border-slate-100 hover:bg-slate-50 transition">
                                    <td class="px-5 py-3.5">
                                        <div class="flex items-center gap-3">
                                            <div class="w-9 h-9 bg-slate-200 rounded-full flex items-center justify-center">
                                                <span class="material-symbols-outlined text-slate-500 text-[18px]">
                                                    person
                                                </span>
                                            </div>

                                            <div>
                                                <p class="font-semibold text-slate-800 text-sm">
                                                    {{ $user->name }}
                                                </p>
                                                <p class="text-xs text-slate-500">
                                                    {{ $user->email }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-5 py-3.5 text-slate-700 text-sm">
                                        {{ $user->service?->name ?? '-' }}
                                    </td>

                                    <td class="px-5 py-3.5">
                                        <span class="bg-purple-100 text-purple-700 px-2.5 py-1 rounded-lg text-[11px] font-semibold">
                                            {{ $user->roles->first()?->name }}
                                        </span>
                                    </td>

                                    <td class="px-5 py-3.5">
                                        @if($user->is_active)
                                            <span class="flex items-center gap-2 text-green-600 text-sm">
                                                <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                                                Actif
                                            </span>
                                        @else
                                            <span class="flex items-center gap-2 text-slate-400 text-sm">
                                                <span class="w-2 h-2 bg-slate-400 rounded-full"></span>
                                                Inactif
                                            </span>
                                        @endif
                                    </td>

                                    <td class="px-5 py-3.5 text-right">
                                        <div class="flex justify-end gap-2.5">
                                            <a href="{{ route('users.show',$user->id) }}"
                                               class="text-blue-600 hover:text-blue-800 transition">
                                                <span class="material-symbols-outlined text-[19px]">
                                                    visibility
                                                </span>
                                            </a>

                                            <a href="{{ route('users.edit',$user->id) }}"
                                               class="text-purple-700 hover:text-purple-900 transition">
                                                <span class="material-symbols-outlined text-[19px]">
                                                    edit
                                                </span>
                                            </a>

                                            <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="text-red-600 hover:text-red-800 transition">
                                                    <span class="material-symbols-outlined text-[19px]">
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

                    <div class="p-3.5 border-t border-slate-200">
                        {{ $users->links() }}
                    </div>
                </div>

            </div>
        </div>

    </div>

</body>
</html>