FROM mariadb:latest

COPY config/mariadb/*.sql /docker-entrypoint-initdb.d/
COPY config/mariadb/conf.d/*.cnf /etc/mysql/conf.d/
