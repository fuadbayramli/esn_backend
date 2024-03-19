<?php

namespace App\Http\Controllers\Admin\Voyager;

use App\Exports\MembersExport;
use App\Exports\SubscribersExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ExcelController extends Controller
{
    /**
     * @return BinaryFileResponse
     */
    public function exportMember(): BinaryFileResponse
    {
        return Excel::download(new MembersExport, 'members.xlsx');
    }

    /**
     * @return BinaryFileResponse
     */
    public function exportSubscriber(): BinaryFileResponse
    {
        return Excel::download(new SubscribersExport, 'subscribers.xlsx');
    }
}
