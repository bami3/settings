#!/usr/bin/env php
<?php
error_reporting(E_ALL);
/**
 * Filtering URL-Encoded Strings To Readable Strings
 */
while ($line = fgets(STDIN)) {
    $line = trim($line);
    $line = str_replace('\x', '%', $line);
    $line = str_replace('\n#', "\n#", $line);
    echo urldecode($line) . "\n";
}
