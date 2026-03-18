<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Creer une division</title>

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

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
        body {
            font-family: "Public Sans", sans-serif;
        }
    </style>
</head>

<body class="bg-background-light font-display text-slate-900 min-h-screen">

    <div class="min-h-screen flex items-center justify-center px-4 py-8">
        <div class="w-full max-w-2xl">

            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 md:p-8">

                <div class="mb-7">
                    <div class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center mb-4">
                        <div class="w-5 h-5 rounded-md bg-primary"></div>
                    </div>

                    <h2 class="text-2xl font-extrabold text-slate-800 tracking-tight">
                        Creer une division
                    </h2>

                    <p class="text-sm text-slate-500 mt-1">
                        Ajouter une nouvelle division organisationnelle
                    </p>
                </div>

                @if($errors->any())
                    <div class="mb-6 p-4 bg-red-50 text-red-700 rounded-xl border border-red-200">
                        <ul class="list-disc pl-5 space-y-1 text-sm">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('divisions.store') }}" method="POST" class="space-y-5">
                    @csrf

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Nom de la division
                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="ex. Ressources humaines"
                            class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-primary/10 focus:border-primary outline-none"
                        >
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Code de la division
                        </label>

                        <input
                            type="text"
                            name="code"
                            value="{{ old('code') }}"
                            placeholder="DIV-001"
                            class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-primary/10 focus:border-primary outline-none"
                        >
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Statut
                        </label>

                        <select
                            name="is_active"
                            class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-primary/10 focus:border-primary outline-none">
                            <option value="1">Actif</option>
                            <option value="0">Inactif</option>
                        </select>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-3 pt-4">
                        <button
                            type="submit"
                            class="sm:flex-1 py-2.5 bg-primary text-white text-sm font-semibold rounded-xl shadow-sm hover:bg-primary/90 transition">
                            Creer une division
                        </button>

                        <a href="{{ route('divisions.index') }}"
                           class="sm:flex-1 py-2.5 text-center bg-slate-100 text-slate-700 text-sm font-semibold rounded-xl hover:bg-slate-200 transition">
                            Annuler
                        </a>
                    </div>
                </form>

            </div>

        </div>
    </div>

</body>
</html>