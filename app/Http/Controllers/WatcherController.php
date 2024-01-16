<?php

namespace App\Http\Controllers;

use App\Models\Watcher;
use Illuminate\Http\Request;

class WatcherController extends Controller
{
    public function store(Request $request)
    {
        $repository_id = $request->input('repository_id');
        $watcher = Watcher::where('user_id', auth()->user()->id)
            ->where('repository_id', $repository_id)->first();
        //if watcher doesn't exist, create a new one
        if (! $watcher) {
            Watcher::create([
                'user_id' => auth()->user()->id,
                'repository_id' => $repository_id,
            ]);
        } else {
            dd('Already added as a watcher!!!');
        }

        return redirect('/profile');
    }
}
