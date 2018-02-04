#!/bin/bash
set -e

psql -v ON_ERROR_STOP=1 --username "$POSTGRES_USER" <<-EOSQL
    CREATE USER db_user;
    CREATE DATABASE db_sc3;
    GRANT ALL PRIVILEGES ON DATABASE db_sc3 TO db_user;
EOSQL


for file_name in $(ls sqls)
do
	psql trkultur < $file_name
done
