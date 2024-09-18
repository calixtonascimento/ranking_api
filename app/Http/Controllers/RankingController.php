<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Movement;
use App\Models\PersonalRecord;
use Illuminate\Support\Facades\DB;

class RankingController extends Controller
{

    public function getRanking($movementId)
    {
        // Validação para evitar erros
        $movement = Movement::find($movementId);
        if (!$movement) {
            return response()->json(['error' => 'Movimento não encontrato!'], 404);
        }

        $records = PersonalRecord::where('movement_id', $movementId)
            ->select('user_id', DB::raw('MAX(value) as highest_value'), DB::raw('MAX(date) as latest_date'))
            ->groupBy('user_id')
            ->orderBy('highest_value', 'desc')
            ->get();

            $rankings = [];
            $currentPosition = 1;
            $previousValue = null;
            $positionOffset = 0;
        
            foreach ($records as $index => $record) {
                // Aqui estou verificando o valor anterior para decidir se posição é a mesma...
                if ($record->highest_value !== $previousValue) {
                    $currentPosition = $index + 1 - $positionOffset;
                } else {
                    // Só para manter a posição correta na próxima iteração...
                    $positionOffset++;
                }
        
                $user = User::find($record->user_id);
        
                $rankings[] = [
                    'position' => $currentPosition,
                    'user' => $user->name,
                    'highest_value' => $record->highest_value,
                    'date' => $record->latest_date,
                ];
        
                $previousValue = $record->highest_value;
            }

            
        
            return response()->json([
                'movement' => $movement->name,
                'ranking' => $rankings ? $rankings : 'Sem Resultados',
            ]);
    }
}
