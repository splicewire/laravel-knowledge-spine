> You are in **splicewire/laravel-knowledge-spine** — the knowledge engine's shared Data/DTO vocabulary: three-valued Ternary, the EvaluationSubject seam, ordering points, the adjudication records (Assertion/Verdict/Determination/OrderingStamp), and the compliance + coherence Data classes (rules, resolution, change, concepts).

This is a Laravel package that provides the satellite-facing DTO half of the knowledge engine — the data surface hosts and satellites share for 1:1 parity, kept deliberately domain-agnostic. The predicate/adjudication/resolution kernel that consumes these DTOs stays private in a separate in-app repo (`laravel-knowledge-engine`), which depends on this package and never the reverse.

## Vendored family-package conventions

Any repo that vendors another family repo's code (composer `vendor/<vendor>/<pkg>/`, npm
`node_modules/<vendor>/<pkg>/`) checks that vendored repo's own `AGENTS.md` for conventions it
ships with itself before editing through into it.
