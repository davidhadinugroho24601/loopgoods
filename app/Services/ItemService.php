<?php

namespace App\Services;

use App\Models\Item;
use App\Models\Request;

class ItemService
{
    public function acceptRequest(Request $request, string $status): void
    {
        $request->update([
            'status' => $status,
        ]);
    }
    public function declineRequest(Request $request,  string $status): void
    {
        $request->update([
            'status' => $status,
        ]);
    }
    // Tambahkan fungsi lainnya sesuai kebutuhan
}
