<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Trainer;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    //

    public function index()
    {
        $trainers = Trainer::orderBy('trainer_id', 'DESC')->paginate(12);
        return view('trainer.trainer-list', ['trainers' => $trainers]);
    }

    public function search(Request $request)
    {
        $request->validate([
            'q'     => 'required'
        ]);

        $key = $request->q;

        $trainers = Trainer::whereHas('company', function (Builder $query) use ($key) {
            return $query->where('company_name', 'LIKE', "%{$key}%");
        })->orWhere('trainer_name', 'Like', "%{$key}%")
            ->orWhere('trainer_phone', 'Like', "%{$key}%")
            ->orWhere('trainer_address',  'Like', "%{$key}%")
            ->orderBy('trainer_id', 'DESC')->paginate(12)->appends($request->except('page'));
        return view('trainer.trainer-list', ['trainers' => $trainers]);
    }

    public function edit_view($id)
    {
        $trainer = Trainer::find($id);
        if ($trainer == null) {
            return abort(404, 'Trainer not found');
        }
        $companies = Company::pluck('company_name', 'company_id');
        return view('trainer.trainer-form', ['trainer' => $trainer, 'companies' => $companies]);
    }

    public function edit(Request $request)
    {
        $request->validate([
            'trainer_name'      =>  'required',
            'trainer_phone'     =>  'required',
            'trainer_address'   =>  'required',
            'company_id'        =>  'required|regex:/^[0-9]+$/'
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

    public function create(Request $request)
    {

        $request->validate([
            'trainer_name'      =>  'required',
            'trainer_phone'     =>  'required',
            'trainer_address'   =>  'required',
            'company_id'        =>  'required|regex:/^[0-9]+$/'
        ]);

        $data = $request->all();
        $trainer = new Trainer($data);
        $trainer->save();

        return redirect()->route('trainer.list')->with('add-message', "create trainer successfully!");
    }

    public function delete($id)
    {
        Trainer::find($id)->delete();
        return redirect()->route('trainer.list')->with('delete-message', 'delete trainer successfully!');
    }
}
