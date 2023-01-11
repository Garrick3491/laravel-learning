<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Session;
use App\Models\File;
use Illuminate\Support\Facades\Storage;

class FileHistoryController extends Controller
{
    public function viewFileHistory(Request $request)
    {
        $page = $request->get('page') ?: 1;

        $files = Auth::user()->files;

        $recordCount = count($files);

        if ($page == 1)
        {
            $previousLink = null;
        }
        else {
            $previousPage = $page - 1;
            $previousLink = url()->current() . '?page=' . $previousPage;
        }

        if ($page * 10 >= $recordCount)
        {
            $nextLink = null;
        }
        else {
            $nextPage = $page + 1;
            $nextLink = url()->current() . '?page=' . $nextPage;
        }

        $links = [
            'previous' => ['url' => $previousLink, 'label' => '&laquo; Previous'],
            'next' => ['url' => $nextLink, 'label' => 'Next &raquo;']
        ];

        return view('file-history', [
            'files' => $files,
            'recordCount' => $recordCount,
            'links' => $links,
        ]);
    }

    public function deleteFile(File $file)
    {
        Storage::delete($file->location);
        $file->delete();

        return redirect()->route('list-files');
    }
}
