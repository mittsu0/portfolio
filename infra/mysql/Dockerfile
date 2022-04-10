FROM mysql/mysql-server:8.0

ENV MYSQL_DATABASE=laravel \
  MYSQL_USER=phper \
  MYSQL_PASSWORD=secret \
  MYSQL_ROOT_PASSWORD=secret \
  TZ=Asia/Tokyo

# Windows環境でボリュームマウントを行うと、ファイルパーミッションが777になる
# my.cnf に書き込み権限が付いてるとMySQLの起動時にエラーが発生する
# その対策としてボリュームマウントではなくDockerfileを作成して my.cnf ファイルコピー、読み取り専用に権限変更
COPY ./my.cnf /etc/my.cnf
RUN chmod 644 /etc/my.cnf