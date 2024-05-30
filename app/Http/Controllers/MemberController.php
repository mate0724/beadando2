<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Borrowing;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        $members = Member::all();

        $query = Member::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $filter = $request->input('filter');

            switch ($filter) {
                case 'name':
                    $query->where('name', 'LIKE', "%{$search}%");
                    break;
                case 'address':
                    $query->where('address', 'LIKE', "%{$search}%");
                    break;
                
            }
        }

        $members = $query->get();

        return view('members.index', compact('members'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
        ]);

        Member::create($request->all());

        return redirect()->route('members.index')->with('success', 'Member created successfully.');
    }

    public function edit(Member $member)
    {
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, Member $member)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
        ]);

        $member->update($request->all());

        return redirect()->route('members.index')->with('success', 'Member updated successfully.');
    }

    public function destroy(Member $member)
    {
        $member->delete();

        return redirect()->route('members.index')->with('success', 'Member deleted successfully.');
    }


    public function show($id)
    {
        $member = Member::findOrFail($id);
        $borrowing = Borrowing::where('member_id', $id)->get();
/*         die(var_dump($borrowing)); */
        return view('members.show')->with('member', $member)->with('borrowings', $borrowing);
    }


}
