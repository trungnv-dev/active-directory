<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sites\SiteCreateRequest;
use App\Models\Site;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Illuminate\Support\Str;

class SiteController extends Controller
{
    /**
     * Display the registration view.
     */
    public function index(Request $request): View
    {
        return view('admin.sites.create', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Display the registration view.
     */
    public function create(Request $request): View
    {
        return view('admin.sites.create', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(SiteCreateRequest $request): RedirectResponse
    {
        try {
            Site::create([
                'name' => Str::uuid(),
                'connection' => json_encode($request->validated())
            ]);
    
            return redirect()->route('admin.sites.create')->withMessage('Success!');
        } catch (Exception $e) {
            Log::error("ERROR_CREATE_SITE::{$e->getMessage()}");
            return redirect()->route('admin.sites.create')->withInput($request->all())->withError('Failed!');
        }
    }
}
