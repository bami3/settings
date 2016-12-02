#!/usr/bin/env perl -ln
use strict;

$_ =~ s/([^ 0-9a-zA-Z])/"%".uc(unpack("H2",$1))/eg;
$_ =~ s/ /+/g;
print;
