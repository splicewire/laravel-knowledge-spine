<?php

namespace Splicewire\Knowledge\Compliance\Data;

use Carbon\CarbonImmutable;
use Schemastud\DataSchemas\Attributes\Description;
use Schemastud\DataSchemas\Attributes\Example;
use Spatie\LaravelData\Data;
use Splicewire\Knowledge\Compliance\Concerns\HasBitemporalValidity;
use Splicewire\Knowledge\Compliance\Enums\RuleLayer;
use Splicewire\Knowledge\Compliance\Enums\RuleStatus;
use Splicewire\Knowledge\Compliance\SourceRef;

/**
 * An atomic rule fragment — the authored unit of the layered corpus.
 *
 * This Data class is the source of truth (schemas all the way down): its
 * JSON-Schema projection is what every consumer reads, whether the fragment is
 * authored locally as PHP here or codegen'd remotely from a host's tenant
 * store. See ADR-0001 and schema reference §1.2.
 */
class Rule extends Data
{
    use HasBitemporalValidity;

    public function __construct(
        #[Description('The rule\'s governed citation key — a domain-prefixed stable identifier, e.g. RULE-0042, under a declared `rule` namespace. Never a fragment UUID.')]
        #[Example('RULE-0042')]
        public string $ruleKey,

        #[Description('Corpus layer this rule is authored in.')]
        public RuleLayer $layer,

        #[Description('Citable source, e.g. "Visa Core Rules §5.4.2", "21 CFR 1308.13".')]
        #[Example('Visa Core Rules §5.4.2')]
        public string $source,

        #[Description('The atomic rule statement.')]
        public string $body,

        #[Description('Boolean predicate tree evaluated against the subject under three-valued logic.')]
        public array $appliesTo,

        #[Description('The dimension this rule speaks to. The host vertical defines its dimension keys.')]
        public string $requirementKey,

        #[Description('The value asserted on the requirement_key.')]
        public mixed $requirement,

        #[Description('Integer precedence used by the Precedence policy — higher wins. The host names its ladder (e.g. law > regulator > contract); the engine compares only the ordering.')]
        public int $precedenceTier,

        #[Description('When the rule came into force in the world (effective-time lower bound).')]
        public ?CarbonImmutable $effectiveStart = null,

        #[Description('When the rule ceased to be in force; null means currently in force.')]
        public ?CarbonImmutable $effectiveEnd = null,

        #[Description('Knowledge-time: when the corpus learned this fragment.')]
        public ?CarbonImmutable $ingestedAt = null,

        #[Description('Set only if we retroactively learned this knowledge-time fact was wrong.')]
        public ?CarbonImmutable $knownUntil = null,

        #[Description('rule_key this rule supersedes, dropped from the candidate set before resolution.')]
        public ?string $supersedes = null,

        #[Description('Why it changed — the human-facing change explanation.')]
        public ?string $changeNote = null,

        public RuleStatus $status = RuleStatus::Active,

        #[Description('The governed-key source namespace this rule was asserted under. Governed keys are addressed `{provider}:{alias}` — two providers asserting the same bare rule_key are distinct by construction; the alias is the final deterministic tiebreak in the precedence total order. First-party canon is `system:default`.')]
        public SourceRef $sourceRef = new SourceRef,

        #[Description('The declared source tier of the conduit that projected this rule — higher wins across sources. The first precedence key, above the rule\'s own precedence_tier. Defaults to 0 (the first-party baseline).')]
        public int $tierRank = 0,

        #[Description('The per-instance override knob for named exceptions — breaks ties within a tier_rank. Defaults to 0.')]
        public int $explicitPriority = 0,
    ) {}
}
