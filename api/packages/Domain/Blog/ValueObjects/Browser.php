<?php

namespace Packages\Domain\Blog\ValueObjects;

enum Browser: string {
    case FIREFOX           = 'Mozilla FireFox';
    case OPERA             = 'Opera';
    case CHROME            = 'Google Chrome';
    case SAFARI            = 'Safari';
    case NETSCAPE          = 'Netscape';
    case EDGE              = 'Edge';
    case INTERNET_EXPLORER = 'Internet Explorer';
    case UNKNOWN           = 'Unknown';
}
