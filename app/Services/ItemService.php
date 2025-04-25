<?php

namespace App\Services;

use App\Models\Item;
use App\Models\Request;
use Illuminate\Validation\ValidationException;
use Filament\Notifications\Notification;

class ItemService
{



    public function acceptRequest(Request $request, string $status): void
    {
        $item = $request->item;
    
        // Check if stock is enough
        if ($item->stock < $request->quantity) {
            Notification::make()
                ->title('Insufficient Stock')
                ->body("Only {$item->stock} available. Cannot accept the request.")
                ->danger()
                ->send();
    
            return;
        }
    
        // Update request status
        $request->update([
            'status' => $status,
        ]);
    
        // Decrement the stock
        $item->stock -= $request->quantity;
        $item->save();
    
        // Success notification
        Notification::make()
            ->title('Request Accepted')
            ->body("The request has been accepted and {$request->quantity} item(s) were deducted from stock.")
            ->success()
            ->send();
    }
    

    
    
    

    public function declineRequest(Request $request,  string $status): void
    {
        $request->update([
            'status' => $status,
        ]);
    }


    // public function requestAccepted(Item $item, string $status): void
    // {
    //     $item->decrement('stock');
    // }


}
