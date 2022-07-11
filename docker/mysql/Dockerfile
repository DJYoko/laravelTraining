FROM mysql:8.0.15

COPY ./my.cnf /etc/mysql/my.cnf

RUN set -eux && \
  chmod 644 /etc/mysql/my.cnf && \
  mkdir /var/lib/mysql-files && \
  mkdir /var/log/mysql && \
  chmod 0750 /var/log/mysql && \
  chmod 0775 /var/log && \
  chmod 0755 /var && \
  chown mysql:root /var/log/mysql

COPY ./sql/* /docker-entrypoint-initdb.d/
