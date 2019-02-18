#!/usr/bin/env php

path = $1

if $source
then tail -f $source
else touch $source
exit 0