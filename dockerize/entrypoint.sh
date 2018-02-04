#!/bin/bash
/etc/init.d/php7.0-fpm stop
/etc/init.d/php7.0-fpm start
tail -f /etc/passwd
