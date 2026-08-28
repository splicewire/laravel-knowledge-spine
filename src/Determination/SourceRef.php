<?php

namespace Splicewire\Knowledge\Determination;

/*
 * Determination <- Compliance expand seam (T1). Deleted in T7 (contract).
 *
 * A PSR-4 stub, NOT a composer `autoload.files` hook. In this estate a package is
 * symlinked live into its consumers' vendor/, but installed.json keeps the autoload
 * block captured at INSTALL time -- so a manifest change is inert at every consumer
 * until a real reinstall, and `composer dump-autoload` does not repair it (measured
 * 2026-08-28). The PSR-4 prefix `Splicewire\Knowledge\ => src/` is already in every
 * consumer's installed.json, so this file resolves live with no reinstall anywhere.
 *
 * The autoloader includes this file and re-checks the symbol; class_alias() defines
 * it, satisfying PSR-4 without duplicating the declaration.
 */

\class_alias(\Splicewire\Knowledge\Compliance\SourceRef::class, __NAMESPACE__.'\\SourceRef');
