<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lead;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    public function store(Request $request) {
        $data = $request->all();

        // Validare i dati
        $validator = Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        // Se ci sono errori di validazione
        // tornare la risposta in json
        // success -> false
        // errors -> struttura dati con gli errori
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        // Salvare nel db il nuovo lead
        $newLead = new Lead();
        $newLead->fill($data);
        $newLead->save();

        // Tornare una risposta di success
        return response()->json([
            'success' => true
        ]);
    }
}
