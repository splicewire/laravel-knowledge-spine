# laravel-knowledge-spine — Context Map (spoke)

The satellite-facing DTO half of the knowledge engine (`Assertion`/`Verdict`/`Determination`/
`CanonFact` — `ComplianceClaim` retired in the determination rename). Layering + shared seam rules: `splicewire-app/CONTEXT-MAP.md`.

## The seam this file exists to record

Its consumer is the engine PACKAGE beside it (the in-app era this file described ended with the
ESP renames): `splicewire/laravel-knowledge-engine` (`Splicewire\Knowledge\`) depends on this package —
**never the reverse** (1:1 parity). Adjudication is domain-agnostic — this is the package
most tempted to name host vocabulary (`merchant`/`MCC`/`SKU`/`ingredient`); it must not.
Pattern: app ADR-0044.
