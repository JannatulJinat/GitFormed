<?php

namespace App\Http\Controllers;

use App\Http\Requests\RepositoryCreationRequest;
use App\Models\User;
use App\Models\Repository;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class RepositoryController extends Controller
{
    public function create():View
    {
        return view('createRepository');
    }

    public function store(RepositoryCreationRequest $request)
    {
        $request->validated();
        if(auth()->check())
        {
            User::find(auth()->id())->repositories()->create([
                'user_id' => auth()->id(),
                'repository_name' => $request->repository_name,
            ]);
        }
        return redirect('profile');
    }
}
