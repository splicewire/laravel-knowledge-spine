<?php

namespace Splicewire\Knowledge\Compliance\Concept;

/*
 * Compliance -> Determination REVERSE stub (T2/B1). Deleted in T7 (contract).
 *
 * The real declaration now lives at src/Determination/Concept/Synonym.php. This file keeps the OLD
 * name resolving for consumers whose call sites have not migrated yet -- the same
 * expand seam as T1, with the alias direction flipped at the moment of the move.
 *
 * String literals on both ends deliberately: pint's fully_qualified_strict_types
 * rewrites a `\Fully\Qualified::class` argument into a `use` import plus a bare short
 * name identical to the symbol this file defines, which is one edit from a
 * relative-resolution bug. Verified in tower, which ships no pint.json.
 *
 * class_alias() covers classes, interfaces, enums AND traits (verified on PHP 8.4),
 * so there is no special case here.
 */

\class_alias('Splicewire\\Knowledge\\Determination\\Concept\\Synonym', 'Splicewire\\Knowledge\\Compliance\\Concept\\Synonym');
