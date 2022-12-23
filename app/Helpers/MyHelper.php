<?php

namespace App\Helpers;

use App\Models\WisataView;
use Carbon\Carbon;

class MyHelper
{
    public function countViewWisata($id)
    {
        $count = WisataView::where('wisata_id', $id)->whereDate('created_at', Carbon::now())->distinct('session_id')->count();

        return $count;
    }

    public function countViewWisataWeek($id)
    {
        $count = WisataView::where('wisata_id', $id)->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->distinct('session_id')->count();

        return $count;
    }
}


