<?php

namespace App\Http\Controllers\Establishment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Models\Establishment\OpeningHour;

class OpeningHourController extends Controller
{
    public function store(Request $request)
    {
        $establishment =  $request->user()->establishments()->findOrFail($request->establishment_id);

        $daysOfWeek = $request->openingHour;

        //Regra de Negocio
        foreach ($daysOfWeek as $key => $value) {
            $openingHour = OpeningHour::where('day', $value['day'])
            ->where('establishment_id', $establishment->id)->first();

            if(!$openingHour){
                $openingHour = new OpeningHour();
                $openingHour->day = $value['day'];
                $openingHour->establishment_id = $establishment->id;
            }
            $openingHour->start_time = $value['start_time'];
            $openingHour->end_time = $value['end_time'];
            $openingHour->not_open = $value['not_open'];

            $openingHour->save();
        }

        return Redirect::route('establishmentIndex')->with('success', 'Estabelecimento atualizado com sucesso!.');
    }

}
