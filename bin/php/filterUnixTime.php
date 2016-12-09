#!/usr/bin/env php
<?php
error_reporting(E_ALL);
/**
 * Filtering UnixTime to Readable datetime string
 *
 * - 10 digit (1000000000 - 1999999999)
 *   - treat as UNIXTIME
 * - 11-14 digit (10000000000 - 19999999999999)
 *   - treat as UNIXTIME + microtime
 */
while ($line = fgets(STDIN)) {
    $line = trim($line);
    $match = array();
    if (preg_match_all('/\b1\d{9}\b/', $line, $match)) {
        foreach ($match[0] as $utime) {
            $line = str_replace($utime, sprintf("\033[36m%s\033[0m", date('Y-m-d H:i:s', $utime)), $line);
        }
    }
    if (preg_match_all('/\b1\d{10,13}\b/', $line, $match)) {
        foreach ($match[0] as $utime_micro) {
            $line = str_replace($utime_micro, sprintf("\033[36m%s.%s\033[0m",
                date('Y-m-d H:i:s', substr($utime_micro, 0, 10)),
                substr($utime_micro, 10, 4)
            ), $line);
        }
    }
    echo $line . "\n";
}
