<?php

namespace Splicewire\Knowledge\Determination\Concerns;

use Splicewire\Knowledge\Compliance\Concerns\HasBitemporalValidity as ComplianceHasBitemporalValidity;

/**
 * Determination-namespace name for the bitemporal validity trait.
 *
 * A trait cannot be aliased — class_alias() covers classes, interfaces and enums only —
 * so the stub seam its siblings use cannot reach this one. It is wrapped instead: the
 * behaviour still lives in the Compliance-namespace trait, and this is the new name for
 * it, so a consumer can migrate before the file moves.
 *
 * In T7 (contract) the bodies move here and the Compliance-namespace trait is deleted.
 */
trait HasBitemporalValidity
{
    use ComplianceHasBitemporalValidity;
}
