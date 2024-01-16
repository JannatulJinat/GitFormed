<?php

namespace App\Http\Controllers;

use App\Http\Requests\RepositoryCreationRequest;
use App\Models\PullRequest;
use App\Models\Repository;
use App\Models\User;
use Illuminate\Contracts\View\View;

class RepositoryController extends Controller
{
    public function create(): View
    {
        return view('createRepository');
    }

    public function store(RepositoryCreationRequest $request)
    {
        $request->validated();
        if (auth()->check()) {
            User::find(auth()->id())->repositories()->create([
                'user_id' => auth()->id(),
                'repository_name' => $request->repository_name,
            ]);
        }

        return redirect('profile');
    }

    public function show($owner_name, $repository_title): View
    {
        $user = User::where('user_name', $owner_name)->first();
        $repository = Repository::where('repository_name', $repository_title)->first();
        if ($user && $repository) {
            $pull_requests = PullRequest::where('repository_id', $repository->id)->get();

            return view(
                'singleRepository',
                [
                    'owner_name' => $owner_name,
                    'repository_title' => $repository_title,
                    'pull_requests' => $pull_requests,
                ]
            );
        } else {
            dd('need to show not found page');
        }
    }
}
