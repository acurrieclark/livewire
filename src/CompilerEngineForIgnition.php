<?php

namespace Livewire;

use Illuminate\View\Engines\PhpEngine;
use Illuminate\View\Engines\CompilerEngine;
use Livewire\ComponentConcerns\RendersLivewireComponents;
use Throwable;

class CompilerEngineForIgnition extends CompilerEngine
{
    use RendersLivewireComponents;

    protected function handleViewException(Throwable $e, $obLevel)
    {
        if ($this->shouldBypassExceptionForLivewire($e, $obLevel)) {
            PhpEngine::handleViewException($e, $obLevel);

            return;
        }

        parent::handleViewException($e, $obLevel);
    }
}
