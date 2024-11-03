<?php

namespace App\Imports;

use App\Models\Matiere;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class MatiereImport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
        // Ignorer la première ligne qui contient les en-têtes
        $rows->shift(); // Cela enlève la première ligne de la collection

        foreach ($rows as $row) {
            // Vérifie si 'nommatiere' est présent dans la ligne
            if (isset($row[1]) && !empty($row[1])) {
                Matiere::create([
                    'code' => $row[1], // Utilise l'index 1 pour 'nommatiere'
                    'nommatiere' => $row[2], // Utilise l'index 1 pour 'nommatiere'
                ]);
            } else {
                // Lever une exception si 'nommatiere' est manquant
                throw new \Exception('Erreur : la colonne "nommatiere" est manquante ou vide dans la ligne : ' . json_encode($row));
            }
        }
    }
}