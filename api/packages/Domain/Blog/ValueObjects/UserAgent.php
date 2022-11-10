<?php

namespace Packages\Domain\Blog\ValueObjects;

use Packages\Domain\NoSQLColumnString;
use Packages\Domain\StringLengthLimit;

final class UserAgent extends StringLengthLimit {
    use NoSQLColumnString;

    protected int $lengthLimit      = 2000;
    protected string $name          = 'ユーザー情報';
    private array $regexBrowsers    = [
        '/Firefox/i'    => Browser::FIREFOX,
        '/OPR/i'        => Browser::OPERA,
        '/Chrome/i'     => Browser::CHROME,
        '/Safari/i'     => Browser::SAFARI,
        '/Netscape/i'   => Browser::NETSCAPE,
        '/Edge/i'       => Browser::EDGE,
        '/Trident/i'    => Browser::INTERNET_EXPLORER,
    ];

    public function browser(): Browser {
        foreach ($this->regexBrowsers as $regex => $browser) {
            if (preg_match($regex, $this->value)) {
                return $browser;
            }
        }

        return Browser::UNKNOWN;
    }

    public static function of($value): UserAgent {
        return parent::of($value);
    }
}
