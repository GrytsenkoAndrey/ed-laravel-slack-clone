<?php

declare(strict_types=1);

namespace App\Observers;

use App\Models\Workspace;
use App\Services\AuthenticatedUserService;

final /*readonly*/ class WorkspaceObserver
{
    public function __construct(
        private AuthenticatedUserService $service,
    ) {
    }

    public function created(Workspace $workspace): void
    {
        $this->service->completeOnboarding(
            workspace: $workspace,
        );
    }
}
