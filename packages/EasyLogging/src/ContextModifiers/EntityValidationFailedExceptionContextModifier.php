<?php

declare(strict_types=1);

namespace EonX\EasyLogging\ContextModifiers;

use App\Exceptions\EntityValidationFailedException;
use EonX\EasyLogging\Interfaces\ExceptionContextModifierInterface;

final class EntityValidationFailedExceptionContextModifier implements ExceptionContextModifierInterface
{
    /**
     * @param mixed[] $context
     *
     * @return mixed[]
     */
    public function modifyContext(\Throwable $throwable, array $context): array
    {
        if ($throwable instanceof EntityValidationFailedException) {
            $context['errors'] = $throwable->getErrors();
        }

        return $context;
    }
}
