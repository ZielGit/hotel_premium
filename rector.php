<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\ValueObject\PhpVersion;

return RectorConfig::configure()
    ->withPaths([
        __DIR__ . '/core',
    ])
    // uncomment to reach your current PHP version
    ->withPhpSets(php56: true)
    ->withPhpVersion(PhpVersion::PHP_82)
    ->withTypeCoverageLevel(0);
