@echo off
cd /d c:\wamp*
cd bin
cd mysql
cd mysql*
cd bin
mysqldump -uroot -p --databases wisemind > D:\Escola\ano3\PW2\Trabson\banco\wisemind.sql
