<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\Update;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function medicines(){

    $medicines = Medicine::all()
        ->filter(function ($medicine) {
            return $medicine->name !== 'medicine';
        })
        ->map(function ($medicine) {
            return [
                'id' => $medicine->id,
                'name' => $medicine->name,
                'composition' => $medicine->composition,
                'indication' => $medicine->indication,
                'type' => $medicine->type,
                'number' => $medicine->number,
                'titer' => $medicine->titer,
                'company_name' => $medicine->company_name,
                'purchase_price' => $medicine->purchase_price,
                'selling_price' => $medicine->selling_price,
            ];
        })->values();

    return response()->json($medicines);
    }

    public function updates(){

        $updates = Update::all()
            ->filter(function ($update) {
                return $update->name !== 'update';
            })
            ->map(function ($update) {
                return [
                    'id' => $update->id,
                    'name' => $update->name,
                    'news' => $update->news,
                    'created_at' => $update->created_at,
                    'updated_at' => $update->updated_at,
                ];
            })->values();
    
        return response()->json($updates);
        }


    public function search(Request $request)
    {
        $query = $request->input('query');

        $medicines = Medicine::where('arabic_name', 'LIKE', "%{$query}%")
                             ->orWhere('english_name', 'LIKE', "%{$query}%")
                             ->get();

        if ($medicines->isEmpty()) {
            return response()->json(['message' => 'No medicines found.'], 404);
        }

        return response()->json($medicines, 200);
    }
}

