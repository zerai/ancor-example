<?php

declare(strict_types=1);

use PhpCsFixer\Fixer\ArrayNotation\ArraySyntaxFixer;
use PhpCsFixer\Fixer\Import\NoUnusedImportsFixer;
use PhpCsFixer\Fixer\NamespaceNotation\BlankLineAfterNamespaceFixer;
use PhpCsFixer\Fixer\PhpTag\BlankLineAfterOpeningTagFixer;
use PhpCsFixer\Fixer\Strict\DeclareStrictTypesFixer;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\EasyCodingStandard\ValueObject\Option;
use Symplify\EasyCodingStandard\ValueObject\Set\SetList;

return static function (ContainerConfigurator $containerConfigurator): void {
    $parameters = $containerConfigurator->parameters();
    $parameters->set(Option::PATHS, [
        __DIR__ . '/src',
        __DIR__ . '/test',
        __DIR__ . '/task-management/src',
        __DIR__ . '/task-management/tests',
        __DIR__ . '/ecs.php',
    ]);

    $services = $containerConfigurator->services();
    $services->set(ArraySyntaxFixer::class)
        ->call('configure', [[
            'syntax' => 'short',
        ]]);
    $services->set(DeclareStrictTypesFixer::class);
    $services->set(NoUnusedImportsFixer::class);
    $services->set(BlankLineAfterNamespaceFixer::class);
    // run and fix, one by one
    // $containerConfigurator->import(SetList::SPACES);
    // $containerConfigurator->import(SetList::ARRAY);
    // $containerConfigurator->import(SetList::DOCBLOCK);
    $containerConfigurator->import(SetList::PSR_12);

    $parameters->set(
        'skip',
        [
            BlankLineAfterOpeningTagFixer::class,
        ]
    );
};
