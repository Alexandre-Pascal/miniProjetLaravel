<?php

namespace App\Observers;

use App\Models\Sauce;

class SauceObserver
{
    /**
     * Handle the Sauce "created" event.
     */
    public function created(Sauce $sauce): void
    {
        //
    }

    /**
     * Handle the Sauce "updated" event.
     */
    public function updated(Sauce $sauce): void
    {
        //
    }

    /**
     * Handle the Sauce "deleted" event.
     */
    public function deleted(Sauce $sauce): void
    {
        //
    }

    /**
     * Handle the Sauce "restored" event.
     */
    public function restored(Sauce $sauce): void
    {
        //
    }

    /**
     * Handle the Sauce "force deleted" event.
     */
    public function forceDeleted(Sauce $sauce): void
    {
        //
    }

    /**
     * Handle the Sauce "saving" event.
     */
    public function saving(Sauce $sauce): void
    {
          // Si un fichier a été téléchargé
          if ($sauce->file) {
            // Récupérer le nom de fichier d'origine
            $filename = $sauce->file->getClientOriginalName();
            // Stocker le nom de fichier dans le champ name du modèle
            $sauce->name = $filename;
        }
    
    }
}
