<?php

declare(strict_types=1);

namespace OSM\Core\Models;

class TeamLineup extends AbstractModel
{
    // formations
    public const FORMATION_433 = '4-3-3';
    public const FORMATION_442 = '4-4-2';
    public const FORMATION_451 = '4-5-1';
    public const FORMATION_541 = '5-4-1';
    public const FORMATION_532 = '5-3-2';
    public const FORMATION_352 = '3-5-2';
    public const FORMATION_343 = '3-4-3';

    // pressures
    public const PRESSURE_SOFT = 'soft';
    public const PRESSURE_NORMAL = 'normal';
    public const PRESSURE_HARD = 'hard';

    // tactics
    public const TACTIC_NONE = 'none';
    public const TACTIC_OFFENSIVE = 'offensive';
    public const TACTIC_DEFENSIVE = 'defensive';
    public const TACTIC_COUNTER_ATTACKS = 'counter-attacks';
    public const TACTIC_TOWARDS_MIDDLE = 'towards-middle';
    public const TACTIC_ATTACKERS_TOWARDS_MIDDLE = 'attackers-towards-middle';
    public const TACTIC_DEFENDERS_TOWARDS_MIDDLE = 'defenders-towards-middle';
    public const TACTIC_MIDFIELDERS_TOWARDS_DEFENSE = 'midfielders-towards-defense';
    public const TACTIC_MIDFIELDERS_TOWARDS_ATTACK = 'midfielders-towards-attack';
    public const TACTIC_PLAY_IT_WIDE = 'play-it-wide';

    // passing styles
    public const PASSING_SHORT = 'short';
    public const PASSING_LONG = 'long';
    public const PASSING_MIXED = 'mixed';

    // defensive lines
    public const DEFENSIVE_LINE_LOW = 'low';
    public const DEFENSIVE_LINE_HIGH = 'high';
    public const DEFENSIVE_LINE_NORMAL = 'normal';

    public int $teamId;
    public string $name;
    public bool $isDefault = false;
    public string $passingStyle = self::PASSING_MIXED;
    public string $defensiveLine = self::DEFENSIVE_LINE_NORMAL;
    public string $tactic = self::TACTIC_NONE;
    public string $pressure = self::PRESSURE_NORMAL;
}
