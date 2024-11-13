<?php

namespace App\Policies;

use App\Models\User;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Category;

class AdminPolicy
{
    use AuthorizesRequests;
    /**
     * Determine if the user is an admin.
     */
    public function index()
{
    $this->authorize('admin');

    return view('dashboard.categories.index', [
        'categories' => Category::all()
    ]);
}

}
