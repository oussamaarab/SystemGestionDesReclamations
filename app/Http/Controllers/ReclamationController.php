<?php
//YAJRA
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Division;
use App\Models\Reclamation;
use App\Models\ReclamationAssignment;
use App\Models\ReclamationResponse;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;




class ReclamationController extends Controller
{
    private function ensureAgentOwnsReclamation($reclamation)
{
    /** @var User $user */
    $user = Auth::user();

    if ($user && $user->hasRole('AGENT_SERVICE') && $reclamation->current_service_id != $user->service_id) {
        abort(403);
    }
}

  public function index(Request $request)
{
    /** @var User $user */
    $user = Auth::user();

    //use laravel scoop
    $query = Reclamation::with(['division', 'service'])
    ->filter($request, $user);
    


    $reclamations = $query->latest()->paginate(10)->appends($request->query());

    $divisions = Division::orderBy('name')->get();
    $services = Service::orderBy('name')->get();

    $statuses = [
        'EN_COURS_DE_TRAITEMENT',
        'AFFECTEE',
        'EN_ATTENTE_INFO',
        'TRAITEE',
        'CLOTUREE',
    ];

    return view('reclamations.index', compact(
        'reclamations',
        'divisions',
        'services',
        'statuses'
    ));
    
}
    public function create()
    {
        return view('reclamations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'depot_date' => 'required|date|before_or_equal:today',
            'citizen_fullname' => 'required',
            'citizen_phone' => 'nullable',
            'citizen_cin' => 'nullable',
            'subject' => 'required',
            'description' => 'nullable',
            'scan' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10000'
        ]);

        $scanPath = null;

        if ($request->hasFile('scan')) {
            $scanPath = $request->file('scan')->store('reclamations', 'public');
        }

        Reclamation::create([
            'reference' => 'REC-' . time(),
            'depot_date' => $request->depot_date,
            'citizen_fullname' => $request->citizen_fullname,
            'citizen_phone' => $request->citizen_phone,
            'citizen_cin' => $request->citizen_cin,
            'subject' => $request->subject,
            'description' => $request->description,
            'scan_path' => $scanPath,
            'status' => 'EN_COURS_DE_TRAITEMENT',
            'created_by' => Auth::id()
        ]);

        return redirect()
            ->route('reclamations.index')
            ->with('success', 'Reclamation created successfully');
    }

    public function show(Reclamation $reclamation)
    {
        $this->ensureAgentOwnsReclamation($reclamation);
        $reclamation->load([
            'assignments.fromDivision',
            'assignments.fromService',
            'assignments.toDivision',
            'assignments.toService',
            'assignments.assignedBy',
            'responses.respondedBy'
        ]);

        return view('reclamations.show', compact('reclamation'));
    }

    public function assignForm(Reclamation $reclamation)
    {
        $divisions = Division::all();
        $services = Service::all();

        return view('reclamations.assign', compact(
            'reclamation',
            'divisions',
            'services'
        ));
    }

    public function assignStore(Request $request, Reclamation $reclamation)
{
    $request->validate([
        'division_id' => 'nullable|exists:divisions,id',
        'service_id' => 'nullable|exists:services,id',
        'comment' => 'nullable'
    ]);

    $divisionId = $request->division_id;
    $serviceId = $request->service_id;

    if ($serviceId) {
        $service = Service::find($serviceId);

        if (! $divisionId) {
            $divisionId = $service->division_id;
        }
    }

    ReclamationAssignment::create([
        'reclamation_id'   => $reclamation->id,
        'from_division_id' => $reclamation->current_division_id,
        'from_service_id'  => $reclamation->current_service_id,
        'to_division_id'   => $divisionId,
        'to_service_id'    => $serviceId,
        'comment'          => $request->comment,
        'assigned_by'      => Auth::id(),
        'assigned_at'      => now(),
    ]);

    $reclamation->update([
        'current_division_id' => $divisionId,
        'current_service_id'  => $serviceId,
        'status'              => 'AFFECTEE',
    ]);

    return redirect()
        ->route('reclamations.show', $reclamation->id)
        ->with('success', 'Reclamation assigned successfully');
}

    public function transferForm(Reclamation $reclamation)
    {
        $this->ensureAgentOwnsReclamation($reclamation);
        $divisions = Division::all();
        $services  = Service::all();

        return view('reclamations.transfer', [
            'reclamation' => $reclamation,
            'divisions'   => $divisions,
            'services'    => $services
        ]);
    }


    public function transferStore(Request $request, Reclamation $reclamation)
{
    $this->ensureAgentOwnsReclamation($reclamation);

    $request->validate([
        'division_id' => 'nullable|exists:divisions,id',
        'service_id'  => 'nullable|exists:services,id',
        'comment'     => 'required'
    ]);

    $divisionId = $request->division_id;
    $serviceId = $request->service_id;

    if ($serviceId) {
        $service = Service::find($serviceId);

        if (! $divisionId) {
            $divisionId = $service->division_id;
        }
    }

    if (! $divisionId && ! $serviceId) {
        return back()->withErrors([
            'division_id' => 'Choose at least a division or a service.'
        ])->withInput();
    }

    ReclamationAssignment::create([
        'reclamation_id'   => $reclamation->id,
        'from_division_id' => $reclamation->current_division_id,
        'from_service_id'  => $reclamation->current_service_id,
        'to_division_id'   => $divisionId,
        'to_service_id'    => $serviceId,
        'comment'          => $request->comment,
        'assigned_by'      => Auth::id(),
        'assigned_at'      => now()
    ]);

    $reclamation->update([
        'current_division_id' => $divisionId,
        'current_service_id'  => $serviceId,
        'status'              => 'AFFECTEE'
    ]);

    return redirect()
        ->route('reclamations.show', $reclamation->id)
        ->with('success', 'Reclamation transferred');
}
    public function responseForm(Reclamation $reclamation)
    {
        $this->ensureAgentOwnsReclamation($reclamation);
        return view('reclamations.response', compact('reclamation'));
    }



        public function responseStore(Request $request, Reclamation $reclamation)
    {
        $this->ensureAgentOwnsReclamation($reclamation);
        $request->validate([
            'response_text' => 'required',
            'attachment' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10000'
        ]);

        $filePath = null;

        if ($request->hasFile('attachment')) {
            $filePath = $request->file('attachment')->store('reclamation_responses', 'public');
        }

        ReclamationResponse::create([
            'reclamation_id' => $reclamation->id,
            'responded_by' => Auth::id(),
            'response_text' => $request->response_text,
            'response_file_path' => $filePath,
            'responded_at' => now()
        ]);

        $reclamation->update([
            'status' => 'TRAITEE'
        ]);

        return redirect()
            ->route('reclamations.show', $reclamation->id)
            ->with('success', 'Response added successfully');
    }
    
}

