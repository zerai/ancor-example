<?php

declare(strict_types=1);

namespace Fpp;

use Nette\PhpGenerator\PsrPrinter;

return [
    'use_strict_types' => true,
    'printer' => fn () => (new PsrPrinter())->setTypeResolving(false),
    'file_parser' => parseFile,
    'comment' => 'null', // put `null` to disable
    'types' => [
        Type\Command\Command::class => Type\Command\typeConfiguration(),
        Type\Data\Data::class => Type\Data\typeConfiguration(),
        Type\Enum\Enum::class => Type\Enum\typeConfiguration(),
        Type\Event\Event::class => Type\Event\typeConfiguration(),
        Type\String_\String_::class => Type\String_\typeConfiguration(),
        Type\Int_\Int_::class => Type\Int_\typeConfiguration(),
        Type\Float_\Float_::class => Type\Float_\typeConfiguration(),
        Type\Bool_\Bool_::class => Type\Bool_\typeConfiguration(),
        Type\Marker\Marker::class => Type\Marker\typeConfiguration(),
        Type\Uuid\Uuid::class => Type\Uuid\typeConfiguration(),
        Type\Guid\Guid::class => Type\Guid\typeConfiguration(),
        \DateTimeImmutable::class => Type\DateTimeImmutable\typeConfiguration(),
    ],
];
