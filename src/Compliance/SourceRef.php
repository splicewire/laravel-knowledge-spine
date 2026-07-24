<?php

namespace Splicewire\KnowledgeSpineData\Compliance;

use Spatie\LaravelData\Data;

/**
 * The governed-key source namespace, `{provider}:{alias}`, as one value object.
 *
 * Every governed corpus row (concepts, synonyms, statuses, rules, evidence) is
 * addressed under a provider namespace and a subscriber-side instance alias:
 * two providers asserting the same bare governed key are distinct by
 * construction. First-party canon is `system:default`.
 *
 * This folds what used to travel as two loose `provider` + `alias` strings
 * across the spine DTOs into one addressable pair — a code-review followup on
 * the knowledge-source-ref-model feature (Primitive Obsession). The DB columns
 * stay flat; only the DTO/domain layer nests them here.
 */
class SourceRef extends Data
{
    public function __construct(
        public string $provider = 'system',
        public string $alias = 'default',
    ) {}

    /** The provider-addressable governed-key namespace, `{provider}:{alias}`. */
    public function key(): string
    {
        return $this->provider.':'.$this->alias;
    }

    /**
     * Parse a `{provider}:{alias}` handle, splitting on the FIRST `:`. A bare
     * `{provider}` (no `:`) leaves the alias at its `default`. Callers that need
     * the "bare provider matches provider only" semantic branch on the presence
     * of a `:` themselves (see the SourceProvider filter operator).
     */
    public static function parse(string $raw): self
    {
        if (! str_contains($raw, ':')) {
            return new self($raw);
        }

        [$provider, $alias] = explode(':', $raw, 2);

        return new self($provider, $alias === '' ? 'default' : $alias);
    }

    /** First-party canon: `system:default`. */
    public static function system(): self
    {
        return new self('system', 'default');
    }

    public function is(SourceRef $other): bool
    {
        return $this->provider === $other->provider && $this->alias === $other->alias;
    }
}
