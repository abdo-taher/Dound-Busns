<?php

namespace App\Http\Controllers\ClubDashboard;

use App\Models\Club;
use App\Models\Club\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BranchesController extends Controller
{
    public function index(Request $request)
    {
        $clubId = auth('club')->id();
        $club = Club::find($clubId);

        if (!$club) {
            return response()->json([
                'status' => 404,
                'message' => 'Club not found'
            ], 404);
        }


        $data = Branch::with('city', 'club.currency')->where('club_id', $clubId)->get();    // return $data;
        return view('club-dashboard.branches.index', compact('data'));
    }

    public function create()
    {
        return view('club-dashboard.branches.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'city_id' => 'required|exists:cities,id',
            'lat' => 'nullable|numeric',
            'lng' => 'nullable|numeric',
            'location' => 'nullable|string',
            'balance' => 'required|numeric',
        ]);

        $data = $request->all();
        $data['club_id'] = auth('club')->id();

        Branch::create($data);

        return redirect()->route('club.branches.index')
            ->with('success', __('models.added_successfully'));
    }

    public function show($id)
    {
        $clubId = auth('club')->id();
        $data = Branch::where('club_id', $clubId)->findOrFail($id);

        return view('club-dashboard.branches.show', compact('data'));
    }

    public function edit($id)
    {
        $data = Branch::where('club_id', auth('club')->id())->findOrFail($id);

        return view('club-dashboard.branches.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'city_id' => 'required|exists:cities,id',
            'lat' => 'nullable|numeric',
            'lng' => 'nullable|numeric',
            'location' => 'nullable|string',
            'balance' => 'required|numeric',
        ]);

        $model = Branch::where('club_id', auth('club')->id())->findOrFail($id);

        $model->update($request->all());

        return redirect()->route('club.branches.index')
            ->with('success', __('models.edited_successfully'));
    }

    public function destroy($id)
    {
        $model = Branch::where('club_id', auth('club')->id())->findOrFail($id);
        $model->delete();

        return redirect()->route('club.branches.index')
            ->with('success', __('models.deleted_successfully'));
    }

    public function deleteSelected(Request $request)
    {
        $ids = $request->ids;

        foreach ($ids as $id) {
            $model = Branch::where('club_id', auth('club')->id())->find($id);
            if ($model) {
                $model->delete();
            }
        }

        return response()->json(['success' => true]);
    }
}
