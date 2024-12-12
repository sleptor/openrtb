<?php

namespace OpenRtb\BidRequest\Specification;

use OpenRtb\Tools\Traits\GetConstants;

/**
 * Class FeedType
 * @package OpenRtb\BidRequest\Specification
 */
class FeedType
{
    use GetConstants;

    const MUSIC_SERVICE = 1;
    const BROADCAST = 2;
    const PODCAST = 3;
    const CATCH_UP_RADIO = 4;
    const WEB_RADIO = 5;
    const VIDEO_GAME = 6;
    const TEXT_TO_SPEACH = 7;
}
