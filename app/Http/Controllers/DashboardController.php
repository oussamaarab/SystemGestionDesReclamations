<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Reclamation;
use App\Models\ReclamationAssignment;
use App\Models\ReclamationResponse;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {/** @var User|null $user */
    $user = Auth::user();
        $reclamationsQuery = Reclamation::query()->visibleToUser($user);

        $totalReclamations = (clone $reclamationsQuery)->count();

        $statusStats = (clone $reclamationsQuery)
            ->selectRaw('status, COUNT(*) as total')
            ->groupBy('status')
            ->pluck('total', 'status');

        $divisionStats = Division::withCount([
            'reclamations' => function ($query) use ($user) {
                $query->visibleToUser($user);
            }
        ])->get();

        $serviceStats = Service::withCount([
            'reclamations' => function ($query) use ($user) {
                $query->visibleToUser($user);
            }
        ])->get();

        $latestAssignments = ReclamationAssignment::with(['reclamation', 'toDivision', 'toService', 'assignedBy'])
            ->when($user && $user->hasRole('AGENT_SERVICE'), function ($query) use ($user) {
                $query->whereHas('reclamation', function ($q) use ($user) {
                    $q->where('current_service_id', $user->service_id);
                });
            })
            ->get()
            ->map(function ($assignment) {
                return [
                    'type' => 'assignment',
                    'title' => 'Reclamation ' . ($assignment->reclamation->reference ?? $assignment->reclamation_id) . ' assigned',
                    'subtitle' => 'Assigned to '
                        . ($assignment->toDivision->name ?? 'No division')
                        . ($assignment->toService ? ' - ' . $assignment->toService->name : '')
                        . ' by ' . ucwords($assignment->assignedBy->name ?? 'Unknown user'),
                    'date' => $assignment->assigned_at,
                ];
            });

        $latestResponses = ReclamationResponse::with(['reclamation', 'respondedBy'])
            ->when($user && $user->hasRole('AGENT_SERVICE'), function ($query) use ($user) {
                $query->whereHas('reclamation', function ($q) use ($user) {
                    $q->where('current_service_id', $user->service_id);
                });
            })
            ->get()
            ->map(function ($response) {
                return [
                    'type' => 'response',
                    'title' => 'Response added to reclamation ' . ($response->reclamation->reference ?? $response->reclamation_id),
                    'subtitle' => 'Added by ' . ucwords($response->respondedBy->name ?? 'Unknown user'),
                    'date' => $response->responded_at,
                ];
            });

        $latestActivities = $latestAssignments
            ->concat($latestResponses)
            ->sortByDesc('date')
            ->take(10)
            ->values();

        return view('dashboard', compact(
            'totalReclamations',
            'statusStats',
            'divisionStats',
            'serviceStats',
            'latestActivities'
        ));
    }
}