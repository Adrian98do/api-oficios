<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\Container4uR13iA\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/Container4uR13iA/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/Container4uR13iA.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\Container4uR13iA\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \Container4uR13iA\App_KernelDevDebugContainer([
    'container.build_hash' => '4uR13iA',
    'container.build_id' => '33e4b0a0',
    'container.build_time' => 1727477883,
    'container.runtime_mode' => \in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) ? 'web=0' : 'web=1',
], __DIR__.\DIRECTORY_SEPARATOR.'Container4uR13iA');
