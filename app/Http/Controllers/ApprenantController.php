<?php

namespace App\Http\Controllers;

use App\Models\Apprenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApprenantController extends Controller
{
    public function index()
    {
        return view('Ajouter_apprenant');
    }

    public function ajouterapprenantsumbit(Request $req)
    {

        $ValidateData = $req->validate([
            'prenom' => 'required',
            'nom' => 'required',
            'email' => 'required | email',
            'promotion' => 'required'
        ]);

        DB::table('apprenant')->insert([
            'Prenom' => $req->prenom,
            'Nom' => $req->nom,
            'email' => $req->email,
            'id_promotion' => $req->promotion
        ]);
        return back()->with('apprenant_created', 'Apprenant Has Been Created SuccessFully !!');
    }
    public function getAllApprenant()
    {
        $apprenantt = DB::table('apprenant')->get();
        return view('gestion_apprenant', compact('apprenantt'));
    }
    public function editApprenant($id)
    {
        $apprenant = DB::table('apprenant')->where('id', $id)->first();
        return view('Edit_apprenant', compact('apprenant'));
    }
    public function deleteApprenant($id)
    {
        DB::table('apprenant')->where('id', $id)->delete();
        return back()->with('apprenant_deleted', 'Apprenant Has Been Deleted Successfully');
    }
    public function updateApprenant(Request $req, $id)
    {
        $validateData = $req->validate([
            'prenom_promo' => 'required',
            'nom_promo' => 'required',
            'email_promo' => 'required | email',
        ]);
        DB::table('apprenant')->where('id', $id)->update([
            'Prenom' => $req->input('prenom_promo'),
            'Nom' => $req->input('nom_promo'),
            'email' => $req->input('email_promo'),
        ]);
        return back()->with('promo_updated', 'Promotion Has Been Updated Successfully');
    }
    public function searchA(Request $request)
    {
        if ($request->ajax()) {
            $input = $request->key;
            $outputt = "";
            $searchApprenant = Apprenant::where('Nom', 'like', '%' . $input . "%")->get();
            if ($searchApprenant) {
                foreach ($searchApprenant as $apprenant) {
                    $outputt .= '<tr>
                <td>' . $apprenant->id . '</td>
                <td>' . $apprenant->Prenom . '</td>
                <td>' . $apprenant->Nom . '</td>
                <td>' . $apprenant->email . '</td>';
                }
                return Response($outputt);
            }
        }
    }
    public function getApprenantByID($id)
    {
        $apprenantt = DB::table('apprenant')->where('id', $id)->get();
        return view('gestion_apprenant', compact('apprenantt'));
    }
    public function getApprenantByID2($id)
    {
        $apprenanttt = DB::table('apprenant')->where('id', $id)->get();
        return view('Ajouter_apprenant', compact('apprenanttt'));
    }
    public function getAllPromotion2()
    {
        $promos = DB::table('promotion')->get();
        return view('Ajouter_apprenant', compact('promos'));
    }
}
