<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Creer Reclamation</title>

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
                    },
                    boxShadow: {
                        soft: "0 10px 30px rgba(15, 23, 42, 0.08)"
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

    <div class="max-w-5xl mx-auto px-6 py-10">

        @if(session('success'))
            <div class="mb-6 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-green-700 shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="mb-6 rounded-xl border border-red-200 bg-red-50 px-4 py-4 text-red-700 shadow-sm">
                <div class="font-semibold mb-2 flex items-center gap-2">
                    <span class="material-icons text-[18px]">error</span>
                    Veuillez corriger les erreurs suivantes
                </div>

                <ul class="list-disc list-inside space-y-1 text-sm">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white border border-slate-200 rounded-2xl shadow-soft overflow-hidden">

            <div class="px-8 py-6 border-b border-slate-200 bg-gradient-to-r from-white to-slate-50">
                <div class="flex items-center justify-between flex-wrap gap-4">
                    <div>
                        <p class="text-sm text-slate-500 mb-1">Gestion des reclamations</p>
                        <h1 class="text-2xl font-bold text-slate-800">Nouvelle Reclamation</h1>
                    </div>

                    <a href="{{ route('reclamations.index') }}"
                       class="inline-flex items-center gap-1 text-slate-600 hover:text-primary transition font-medium">
                        <span class="material-icons text-[18px]">arrow_back</span>
                        Retour
                    </a>
                </div>
            </div>

            <form method="POST"
                  action="{{ route('reclamations.store') }}"
                  enctype="multipart/form-data"
                  class="p-8">

                @csrf

                <div class="mb-6">
                    <h2 class="text-lg font-semibold text-slate-800">Informations de la reclamation</h2>
                    <p class="text-sm text-slate-500 mt-1">
                        Remplissez les informations suivantes pour enregistrer une nouvelle reclamation.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>
                        <label for="depot_date" class="mb-2 flex items-center gap-2 text-sm font-medium text-slate-700">
                            <span class="material-icons text-[18px] text-slate-500">event</span>
                            Date depot
                        </label>
                        <input type="date"
                               id="depot_date"
                               name="depot_date"
                               value="{{ old('depot_date', date('Y-m-d')) }}"
                               class="w-full rounded-xl border-slate-300 bg-white px-4 py-3 text-sm shadow-sm transition focus:border-primary focus:ring-primary hover:border-slate-400">
                    </div>

                    <div>
                        <label for="citizen_fullname" class="mb-2 flex items-center gap-2 text-sm font-medium text-slate-700">
                            <span class="material-icons text-[18px] text-slate-500">person</span>
                            Nom citoyen
                        </label>
                        <input type="text"
                               id="citizen_fullname"
                               name="citizen_fullname"
                               value="{{ old('citizen_fullname') }}"
                               placeholder="Entrer le nom complet"
                               class="w-full rounded-xl border-slate-300 bg-white px-4 py-3 text-sm shadow-sm transition focus:border-primary focus:ring-primary hover:border-slate-400">
                    </div>

                    <div>
                        <label for="citizen_phone" class="mb-2 flex items-center gap-2 text-sm font-medium text-slate-700">
                            <span class="material-icons text-[18px] text-slate-500">call</span>
                            Telephone
                        </label>
                        <input type="text"
                               id="citizen_phone"
                               name="citizen_phone"
                               value="{{ old('citizen_phone') }}"
                               placeholder="Entrer le numero de telephone"
                               class="w-full rounded-xl border-slate-300 bg-white px-4 py-3 text-sm shadow-sm transition focus:border-primary focus:ring-primary hover:border-slate-400">
                    </div>

                    <div>
                        <label for="citizen_cin" class="mb-2 flex items-center gap-2 text-sm font-medium text-slate-700">
                            <span class="material-icons text-[18px] text-slate-500">badge</span>
                            CIN
                        </label>
                        <input type="text"
                               id="citizen_cin"
                               name="citizen_cin"
                               value="{{ old('citizen_cin') }}"
                               placeholder="Entrer le CIN"
                               class="w-full rounded-xl border-slate-300 bg-white px-4 py-3 text-sm shadow-sm transition focus:border-primary focus:ring-primary hover:border-slate-400">
                    </div>

                    <div class="md:col-span-2">
                        <label for="subject" class="mb-2 flex items-center gap-2 text-sm font-medium text-slate-700">
                            <span class="material-icons text-[18px] text-slate-500">title</span>
                            Sujet
                        </label>
                        <input type="text"
                               id="subject"
                               name="subject"
                               value="{{ old('subject') }}"
                               placeholder="Entrer le sujet de la reclamation"
                               class="w-full rounded-xl border-slate-300 bg-white px-4 py-3 text-sm shadow-sm transition focus:border-primary focus:ring-primary hover:border-slate-400">
                    </div>

                    <div class="md:col-span-2">
                        <label for="description" class="mb-2 flex items-center gap-2 text-sm font-medium text-slate-700">
                            <span class="material-icons text-[18px] text-slate-500">description</span>
                            Description
                        </label>
                        <textarea id="description"
                                  name="description"
                                  rows="6"
                                  placeholder="Entrer la description de la reclamation"
                                  class="w-full rounded-xl border-slate-300 bg-white px-4 py-3 text-sm shadow-sm transition focus:border-primary focus:ring-primary hover:border-slate-400">{{ old('description') }}</textarea>
                    </div>

                    <div class="md:col-span-2">
                        <label for="scan" class="mb-2 flex items-center gap-2 text-sm font-medium text-slate-700">
                            <span class="material-icons text-[18px] text-slate-500">attach_file</span>
                            Scan
                        </label>

                        <div class="rounded-2xl border-2 border-dashed border-slate-300 bg-slate-50 p-6 hover:border-primary transition">
                            <input type="file"
                                   id="scan"
                                   name="scan"
                                   class="w-full rounded-lg border-slate-300 bg-white text-sm file:mr-4 file:rounded-lg file:border-0 file:bg-primary file:px-4 file:py-2 file:text-sm file:font-medium file:text-white hover:file:opacity-90">
                            <p class="mt-3 text-xs text-slate-500">
                                Ajouter un document scanne si disponible.
                            </p>
                        </div>
                    </div>

                </div>

                <div class="mt-8 flex flex-wrap gap-4">
                    <button type="submit"
                            class="inline-flex items-center gap-2 rounded-xl bg-primary px-5 py-3 text-white font-medium shadow-sm hover:opacity-90 transition">
                        <span class="material-icons text-[18px]">save</span>
                        Enregistrer
                    </button>

                    <a href="{{ route('reclamations.index') }}"
                       class="inline-flex items-center gap-2 rounded-xl bg-slate-100 px-5 py-3 text-slate-700 font-medium hover:bg-slate-200 transition">
                        <span class="material-icons text-[18px]">close</span>
                        Annuler
                    </a>
                </div>

            </form>
        </div>
    </div>

</body>
</html>