<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\VoteSystem\Repositories\PropositionRepository;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    public function __construct(
        private PropositionRepository $propositionRepository,
    ) {
        parent::__construct();
    }

    public function index(): View
    {
        $proposition = $this
            ->propositionRepository
            ->currentProposition();

        return view('views.admin.index', [
            'welcomeMessage' => $this->config->get('admin_welcome_message'),
            'proposition' => $proposition
        ]);
    }
}
