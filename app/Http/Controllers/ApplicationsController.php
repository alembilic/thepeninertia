<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ApplicationsController extends Controller
{
    public function index() {
        // TODO: Need organisation id
        $applications = ApplicationForm::whereNull('deleted_at')
            ->withCount('pendingSubmissions')
            ->withCount('approvedSubmissions')
            ->withCount('rejectedSubmissions')
            ->orderBy('open_from', 'desc')
            ->get();

        return Inertia::render('Users', [
            'applications' => $applications
        ]);
    }
}
