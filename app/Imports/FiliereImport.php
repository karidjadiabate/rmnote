<?php

namespace App\Imports;

use App\Models\Filiere;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class FiliereImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        // Ignorer la première ligne qui contient les en-têtes
        $rows->shift(); // Cela enlève la première ligne de la collection

        foreach ($rows as $row)
        {
            if (isset($row[1]) && !empty($row[1])) {
                // Créer une nouvelle matière
                Filiere::create([
                    'code' => $row[1],
                    'nomfiliere' => $row[2],
                    'description' => $row[3]
                ]);
            } else {
                // Lever une exception si 'nommatiere' est manquant
                throw new \Exception('Erreur : la colonne "nomfiliere" est manquante ou vide dans la ligne : ' . json_encode($row));
            }
        }
    }
}
