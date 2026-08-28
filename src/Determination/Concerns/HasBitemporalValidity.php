<?php

namespace Splicewire\Knowledge\Determination\Concerns;

/*
 * Determination <- Compliance expand seam (T1). Deleted in T7 (contract).
 *
 * Originally a wrapper trait (`trait New { use Old; }`), on the assumption that
 * class_alias() cannot alias a trait. B2 disproved that: class_alias() DOES alias a
 * trait on PHP 8.4, verified under real PSR-4 autoloading. The wrapper was also less
 * faithful -- `class_uses()` on a consumer reports the WRAPPER's name, not the original
 * (measured: returns `Wrap`, not `Orig`) -- so anything reflecting over traits saw a
 * different answer through the new name than through the old.
 *
 * Now identical in form to its 26 siblings, which removes the special case rather than
 * documenting it.
 */

\class_alias('Splicewire\\Knowledge\\Compliance\\Concerns\\HasBitemporalValidity', 'Splicewire\\Knowledge\\Determination\\Concerns\\HasBitemporalValidity');
