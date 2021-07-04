<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Trainer;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    //

    public function index()
    {
        $trainers = Trainer::paginate(12);
        return view('trainer.trainer-list', ['trainers' => $trainers]);
    }

    public function edit_view($id)
    {
        $trainer = Trainer::find($id);
        $companies = Company::pluck('company_name', 'company_id');
        return view('trainer.trainer-form', ['trainer' => $trainer, 'companies' => $companies]);
    }

    public function edit(Request $request)
    {
        $request->validate([
            'trainer_phone'    => 'regex:/^[0-9]{10}$/'
        ]);

        $data = $request->only('trainer_name', 'trainer_phone', 'trainer_address', 'company_id');
        Trainer::find($request->trainer_id)->update($data);
        return redirect()->route('trainer.edit', [$request->trainer_id])->with('success', 'Updated successfully!');
    }

    public function create_view()
    {
        $companies = Company::pluck('company_name', 'company_id');
        return view('trainer.trainer-form',  ['companies' => $companies]);
    }

    public function delete($id)
    {
        Trainer::find($id)->delete();
        return redirect()->route('trainer.list');
    }
}

