<?php
namespace App\Http\Controllers;

use App\Http\Requests\MedicineRequest;
use App\Models\Medicine;
use Request;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medicines = Medicine::with('alternatives')->get();
        return view('Medicine.MedicineTable', compact('medicines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Medicine.AddMedicine');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MedicineRequest $request)
    {
        $medicine = new Medicine();
        $this->saveMedicine($medicine, $request);

        return redirect()->route('medicine');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $medicine = Medicine::with('alternatives')->find($id);
        return view('Medicine.ShowMedicine', compact('medicine'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $medicine = Medicine::find($id);
        return view('Medicine.EditMedicine', compact('medicine'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MedicineRequest $request, Medicine $medicine)
    {
        $this->saveMedicine($medicine, $request);

        return redirect()->route('medicine');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $medicine = Medicine::findOrFail($id);
        $medicine->delete();
        return redirect()->route('medicine');
    }

    /**
     * Save medicine and its alternatives.
     */
    private function saveMedicine(Medicine $medicine, MedicineRequest $request)
{
    $medicine->arabic_name = $request->arabic_name;
    $medicine->english_name = $request->english_name;
    $medicine->composition = $request->composition;
    $medicine->indication = $request->indication;
    $medicine->type = $request->type;
    $medicine->number = $request->number;
    $medicine->titer = $request->titer;
    $medicine->company_name = $request->company_name;
    $medicine->purchase_price = $request->purchase_price;
    $medicine->selling_price = $request->selling_price;
    $medicine->save();

    if ($request->has('alternatives') && is_array($request->alternatives)) {
        $this->saveAlternatives($medicine, $request->alternatives);
    }
}

private function saveAlternatives(Medicine $mainMedicine, array $alternatives)
{
    $alternativeIds = [];

    foreach ($alternatives as $alternativeData) {
        $alternative = Medicine::updateOrCreate(
            ['english_name' => $alternativeData['english_name']],
            [
                'arabic_name' => $alternativeData['arabic_name'],
                'composition' => $alternativeData['composition'] ?? null,
                'indication' => $alternativeData['indication'] ?? null,
                'type' => $alternativeData['type'] ?? null,
                'number' => $alternativeData['number'] ?? null,
                'titer' => $alternativeData['titer'] ?? null,
                'company_name' => $alternativeData['company_name'] ?? null,
                'purchase_price' => $alternativeData['purchase_price'] ?? null,
                'selling_price' => $alternativeData['selling_price'] ?? null,
            ]
        );

        $alternativeIds[] = $alternative->id;
    }

    $mainMedicine->alternatives()->sync($alternativeIds);

    foreach ($alternativeIds as $alternativeId) {
        $alternative = Medicine::find($alternativeId);
        $alternative->alternatives()->syncWithoutDetaching(array_merge([$mainMedicine->id], array_diff($alternativeIds, [$alternativeId])));
    }
}

public function editPrice(string $id)
    {
        $medicine = Medicine::find($id);
        return view('Medicine.EditMedicinePrice', compact('medicine'));
    }


public function updatePrice(Request $request, $id)
{
    $request->validate([
        'purchase_price' => 'required|numeric',
        'selling_price' => 'required|numeric',
    ]);

    $medicine = Medicine::find($id);
    $medicine->purchase_price = $request->input('purchase_price');
    $medicine->selling_price = $request->input('selling_price');
    $medicine->save();

    return redirect()->route('medicine')->with('success', 'Medicine prices updated successfully.');
}



}
