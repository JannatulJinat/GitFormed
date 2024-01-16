<?php

namespace App\Http\Controllers;

use App\Http\Requests\PullRequest;
use App\Models\Repository;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PullRequestController extends Controller
{
    public function create(Request $request): View
    {
        return view('createPullRequest', [
            'user_name' => $request->user_name,
            'repository_title' => $request->repository_title,
        ]);
    }

    public function store(PullRequest $request, $owner_name, $repository_title)
    {
        //only logged in user can pull request on their own repo
        if (auth()->user()->user_name === $owner_name) {
            $repository = Repository::where('repository_name', $repository_title)
                ->where('user_id', auth()->id())
                ->first();
            if ($repository) {
                $repository->pullRequest()->create([
                    'repository_id' => $repository->id,
                    'pull_request_title' => $request->pull_request_title,
                ]);

                return redirect('/profile');
            } else {
                return redirect()->back()->withErrors('pull_request_title', 'Repository not found!!!');
            }
        } else {
            return back()->withErrors([
                'pull_request_title' => 'Note: When you are logged in, you can pull request on your own repo',
            ]);
        }
    }
}
