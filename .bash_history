cd contracts/
la
ls 
cd ..
cd news/
ls
cd 20170426/
ls
cd ..
cd 201700426
cd 201700426/
cd 20170503/
ls
cdcd
cd f
cd 
cd frontend/
cd web/
ls
cd uploads/
ls
cd
cd backend/
cd web/
cd uploads/
ls
cd contracts/
ls
mysql -u root -p
ls
cd ..
ls
cd products/
ls
cd 
cd -
cd 201705/
ls
cd ..
ls
cd ..
ls
cd news/
ls
cd ..
ls
cd contracts/
ls
cd ..
cd news/
ls
cd ..
cd products/
ls
cd 201705/
ls
cd
cd frontend/
ls
cd web/
ls
cd uploads/
ls
rm 2017-04-20-76.jpg 
rm 2017-05-03-98.jpg 
ls
./yii/checkContracts/checkContracts
php yii/checkContracts/checkContracts
./yii/checkContracts/checkContracts
./yii /checkContracts/checkContracts
./yii cons/checkContracts/checkContracts
php ./yii cons/checkContracts/checkContracts
php yii cons/checkContracts/checkContracts
./yii
./yii checkContracts/checkContracts
./yii checkContracts/check-contracts
./yii cons/checkContracts/check-contracts
./yii cons/checkContracts/checkContracts
./yii cons/test/my
php yii cons/test/my
php cons/test/my
./yii
./yii test/my
./yii checkContracts/checkContracts
./yii checkContracts/check-contracts
./yii check-contracts/check-contracts
./yii check-contracts/collect
./yii checkContracts/collect
./yii check-contracts/collect
mysql -u root -p
cd
./yii check-contracts/collect
php yii check-contracts/collect
./yii check-contracts/collect
./yii /check-contracts/collect
./yii check-contracts/collect
cd /
cd etc/
cd crontab 
ls
cd crontab 
vi crontab 
cd
pwd
mysql -u root -p
yum -y install postfix
yum remove sendmail
ls
alternatives --config mta
alternatives --display mta
cd /etc/
cd postfix/
vi main.cf 
/etc/rc.d/init.d/postfix start
chkconfig postfix on
yum -y install dovecot
vi /etc/dovecot/dovecot.conf
vi /etc/dovecot/conf.d/10-auth.conf
vi /etc/dovecot/conf.d/10-mail.conf
vi /etc/dovecot/conf.d/10-master.conf
/etc/rc.d/init.d/dovecot start
chkconfig dovecot on
useradd mail
passwd -s mail
passwd -S mail
Passwd -S mail
passwd mail
reboot
dig -t txt mail.ewinjade.com
nslookup
alternatives --display mta
yum install opendkim
vi /etc/opendkim.conf
mkdir /etc/opendkim/keys/YourDomain.com
opendkim-genkey -D /etc/opendkim/keys/mail.ewinjade.com/ -d mail.ewinjade.com -s default 
default._domainkey.mail.ewinjade.com mail.ewinjade.com:default:/etc/opendkim/keys/mail.ewinjade.com/default.private
default._domainkey.mail.ewinjade.com mail.ewinjade.com:default:/etc/opendkim/keys/mail.ewinjade.com/default.privatecd /etc/opendkim/keys
cd /etc/opendkim/keys/
ls
rm -r YourDomain.com/
ls
mkdir /etc/opendkim/keys/mail.ewinjade.com
default._domainkey.mail.ewinjade.com mail.ewinjade.com:default:/etc/opendkim/keys/mail.ewinjade.com/default.privatecd /etc/opendkim/keys
ls
opendkim-genkey -D /etc/opendkim/keys/mail.ewinjade.com/ -d mail.ewinjade.com -s default 
default._domainkey.mail.ewinjade.com mail.ewinjade.com:default:/etc/opendkim/keys/mail.ewinjade.com/default.privatecd /etc/opendkim/keys
ls
wpd
pwd
cd ..
ls
cd KeyTable 
vi KeyTable 
vi SigningTable 
vi TrustedHosts 
cd keys/
ls
cd mail.ewinjade.com/
ls
vi default.txt 
cd /etc/
cd postfix/
ls
vi main.cf 
service opendkim start
postfix reload
reboot
nslookup
ls
cd
tail -f /var/log/maillog
vi /etc/dovecot/conf.d/10-mail.conf 
tail -f /var/log/maillog
reboot
Passwd -S mail
passwd -s mail
passwd -S mail
passwd mail
tail -f /var/log/maillog
nslookup -qt=txt ewinjade.com
dig -t txt ewinjade.com
dig -t txt mail.ewinjade.com
host ewinjade.com
dig txt hotmal.com
dig txt ewinjade.com
dig txt  dkim._domainkey.mail.ewinjade.com
chkconfig --list
php yii /check-contracts collect
php yii check-contracts/collect
cd
ls
cd uploads/
ls
ls -l
cd ..
ls -l
cd uploads/
ls
cd ..
rm -r uploads/
ls
git add .
git commit -m "完成了到期前提醒demo，接下来将做RBAC"
git push origin dev
mysql -u root -p
cd
php yii migrate/create add_name_column_for_table_admin
php yii migrate/up
php yii migrate/create create_table_role
php yii migrate/up
php yii migrate/create create_table_user_role
yii migrate/up
php yii migrate/up
php yii migrate/create create_table_access
php yii migrate/up
php yii migrate/create create_table_role_access
php yii migrate/up
php yii migrate/create create_table_user_access_log
php yii migrate/up
mysql -u root -p
cd backend/
ls -l
pwd
cd views/
ls -l
chmod 777 role/
ls -l
rm -rf role/
ls
mysql -u root -p
cd
php yii/migrate create add_source_column_for_table_user;
yii/migrate create add_source_column_for_table_user;
yii migrate create add_source_column_for_table_user;
php yii migrate create add_source_column_for_table_user;
php yii migrate/create add_source_column_for_table_user;
php yii migrate/up
select * from user;
mysql -u root -p
php yii migrate/create change_column_source_and_phone_for_table_user
./yii migrate/up
mysql -u root -p
cd
./yii migrate/create fix_table_user;
./yii migrate/up1
./yii migrate/up
mysql -u root -p
git add .
git commit -m "完成RBAC"
git push origin dev
git add .
git commit -m "设置了默认后台用户权限，接下来跟正式环境同步"
git push origin dev
cd..
cd ..
cd advanced
ls
git pull
./yii migrate/up
cd frontend/
cd config/
ls
vi main-local.php 
cd ..
cd console/
ls
cd config/
ls
vi main-local.php 
mysql -u root -p
cd ..
pwd
./yii migrate/up
./yii migrate/up 11
./yii migrate/up 10
mysql -u root -p
./yii migrate/up
cd frontend/
cd web/
vi index.php 
cd /
cd etc/
cd nginx/
ls
cd conf.d/
ls
vi yii.conf 
cd
cd ..
cd advanced
cd frontend/
cd web/
vi index.php 
cd ..
cd backend/
cd web/
vi index.php 
cd ..
cd controllers/
ls
cd common/
vi BaseController.php 
mysql -u root -p
git add .
git commit -m "日志功能有点问题，准备在本地同步"
git push origin dev
cd ..
cd advanced
ls
cd backend/
ls
cd web/
ls
cd uploads/
ls
mkdir contracts
ls
chmod 777 contracts/
ls
cd
cd ..
cd advanced
ls
./yii migrate/up
mysql -u root -p
cd backend/
cd co
cd controllers/
ls
vi ContractController.php 
cd ..
cd common/
ls
cd models/
ls
cd ..
ls
cd backend/
cd models/
ls
vi ContractForm.php 
cd
cd ..
cd advanced
./yii migrate/up
./yii migrate/up m170315_030429
mysql -u root -p
cd common/
cd config/
vi main-local.php 
vi test-local.php 
cd ..
cd console/
ls
cd config/
vi main-local.php 
cd ..
cd frontend/
ls
cd config/
ls
vi main-local.php 
vi test-local.php 
reboot
mysql -u root -p
cd
git add .
git commit -m "合同视图文件写错为大写"
git push origin dev
cd ..
cd advanced
ls
git pull
cd backend/
ls
cd web/
ls
cd uploads/
ls
cd contracts/
ls
mysql -u root -p
cd
cd ..
 cd advanced
cd backend/
ls
cd controllers/
ls
pwd
vi ContractController.php 
cd ..
 cd views/
ls
cd contract/
ls
vi view.php 
ls
cd ..
cd m
cd ..
cd models/
ls
pwd
ls
cd ..
ls
cd ..
pwd
ls
cd backend/
ls
cd views/
cd contract/
ls
vi view.php 
ls
cd ..
cd controllers/
ls
cd common/
ls
vi BaseController.php 
ls
cd ..
cd web/
ls
cd uploads/
ls -l
cd contracts/
ls
rm c3-2017-05-23-70.pdf 
rm c3-2017-05-23-80.pdf 
rm c3-2017-05-23-96.pdf 
rm c3-2017-05-23-99.pdf 
rm c3-2017-05-23-34.pdf 
rm c6-2017-05-23-34.pdf 
rm c6-2017-05-23-36.pdf 
ls
cd
cd ..
cd advanced
ls
cd frontend/
cd web/
ls
cd uploads/
ls
cd ..
ls -l
cd
git add .
git commit -m "视图详情有问题"
git push orgin dev
git push origin dev
cd
cd ..
cd advanced
git pull
mysql -u root -p
cd /
cd etc/
cd nginx/
cd conf.d/
ls
vi yii.conf 
vi yii-test.conf
ls
pwd
useradd -d /usr/share/nginx/html/advanced-test
useradd -d /usr/share/nginx/html/advanced prod
passwd prod
usermod -s /sbin/nologin prod
service vsftpd restart
userdel -r prod
cd
cd ..
cd advanced
cd backend/
cd views/
ls
cd user/
ls
vi view.php 
vi index.php 
mysql -u root -p
cd ..
cd advanced
cd backend/
cd config/
ls
vi main-local.php 
cd
cd ..
cd advanced
composer update
cd ..
cd advanced
composer update
composer install
composer update
ls
composer
composer show
composer update yiisoft/yii2
cd backend/
cd views/
ls
cd user/
ls
vi view.php 
mysql -u root -p
cd ..
cd advanced
cd backend/
cd web/
ls
vi index.php 
reboot
cd ..
cd advanced
composer config -g repo.packagist composer https://packagist.phpcomposer.com
ls
vi composer.json 
ls
composer install
composer update
composer update config.fxp-asset.installer-paths
cd ..
cd advanced
composer update
composer global require fxp/composer-asset-plugin:^1.2.0
composer update
compoesr show
composer show
composer global require "fxp/composer-asset-plugin:*"
composer install
ls
rm -rf vendor/
rm composer.lock 
composer install
cd
cd ..
cd advanced
cd backend/
cd config/
ls
vi main-local.php 
cd
cd ..
cd advanced
ls
./yii init
init
./init
cd
pwd
/usr/share/nginx/html/advanced-test
crontab -e 00 09 * * * /usr/share/nginx/html/advanced-test/yii check-contracts/collect
crontab -e
composer require scotthuangzl/yii2-export2excel "dev-master"
compoesr update
composer update
cd /
cd etc/
ls
cd php.d/
ls
cd ..
vi php.ini
reboot
git add .
./yii migrate/create add_column_for_contract
mysql -u root -p
./yii migrate/up
cd
git add .
git commit -m "端午节前的最后Push"
git push origin dev
cd ..
cd advanced
git pull
composer update
composer show
cd ..
cd advanced
composer show
composer require scotthuangzl/yii2-export2excel "dev-master"
git pull
git add .
git commit -m "为正式环境配置做设置"
git push
git checkout
git push origin master
git pull
git add .
git commit -m "解决beforeaction的登录前验证问题"
git push origin dev
cd ..
cd advanced
git pull
git commit -a
git pull
cd
git add .
git commit -m "解决注销后不跳转登录的问题"
git push origin dev
cd
cd ..
cd advanced
git pull
crontab -e
cd
./yii check-contracts/collect
git add .
git commit -m "检查是否有未同步"
git push origin dev
cd ..
cd advanced
git pull
./yii migrate
mysql -u root -p]
mysql -u root -p
cd
git add .
git commit -m "修复bug"
git push origin dev
cd
git add .
git commit -m "刚才push不成功？"
git push origin dev
cd ..
cd advanced
git pul
git pull
git push origin dev
ls
git add .
git commit -m "修改管理员及客户的信息，但密码暂时不可以，修复了一些bug"
git push origin dev
cd ..
cd advanced
ls
git pull
mysql -u root -p
cd
git add .
git commit -m "完善了模块显示，修复产品图片更新bug，菜单栏新增我的合同模块"
git push origin dev
cd ..
cd advanced
git pull
mysql -u root -p
crontab -e
mysql -u root -p
cd /etc
ls
cd nginx/
ls
cd conf.d/
ls
vi yii.conf
vi progress.conf
ls
cd
pwd
mysql -u root -p
cd
ls -l
chmod 777 progress.sql 
mysql -u root -p
mysql -u root -p Ww070101 progress</usr/share/nginx/html/advanced-test/progress.sql
mysql -u -p progress < /usr/share/nginx/html/advanced-test/progress.sql
mysql -u progress < /usr/share/nginx/html/advanced-test/progress.sql
mysql -u root -p progress < /usr/share/nginx/html/advanced-test/progress.sql
mysql -u root -p
cd
ls
cd ..
ls
mkdir progress;
ls
cd progress/
cd ..
rm progress/
rm -rf progress/
ls
git clone git@github.com:wangjiatong/progress.git
cd progress/
ls
cd config/
ls
vi db.php 
reboot
cd
cd ..
ls
cd progress/
ls
./yii
ls -l
cd
ls
ls -l
cd ..
cd progress/
ls
./yii
php ./yii
composer install
./yii
php yii
php ./yii
./yii
php yii
php ./yii
./yii
ls
ls -l
chmod 744 yii
ls -l
./yii
./init
ls
init
php init
./yii init
composer
ls
composer show
ls
cd web/
ls
ls -l
cd ..
ls
cd vendor/
ls
cd yiisoft/
ls
cd yii2
cd web/
ls
vi User.php 
cd
cd ..
cd progress/
ls
init
./init
./yii
vi /usr/share/nginx/html/progress/vendor/yiisoft/yii2/web/User.php
cd web/
ls- l
ls -l
cd
cd frontend/
cd web/
ls -l
cd
cd ..
cd progress/
cd web/
ls
chmod 777 assets/
mysql u root -p
mysql -u root -p
cd ..
git pull
cd config/
ls
vi web.php 
cd db.php 
vi db.php 
pwd
cd ..
cd models/
vi User.php 
cd ..
git pull
cd ..
cd advanced
composer install
ls
rm composer.lock 
composer install
composer list
composer update
composer install -v
composer update -v
composer clearcache
cd vendor/
cd composer/
ls
vi installed.json 
cd ..
composer install
cd vendor/
cd composer/
ls
vi installed.json 
cd ..
composer install
vim /usr/share/nginx/html/advanced/vendor/composer/installed.json
composer install
cp /usr/share/nginx/html/advanced/vendor/composer/installed.json  /usr/share/nginx/html/advanced_test/
cp /usr/share/nginx/html/advanced/vendor/composer/installed.json  /usr/share/nginx/html/advanced_test/install.json
vim /usr/share/nginx/html/advanced/vendor/composer/installed.json
composer install
vim /usr/share/nginx/html/advanced/vendor/composer/installed.json
vi /usr/share/nginx/html/advanced_test/install.json
cd
ls
la
cd advanced
ls
cd ..
ls -l
cd advanced
pwd
cd ..
rm -rf advanced
ls
cd ..
ls
cp /usr/share/nginx/html/advanced/vendor/composer/installed.json  /usr/share/nginx/html/advanced-test/install.json
cd
ls
vi /usr/share/nginx/html/advanced_test/install.json
vim /usr/share/nginx/html/advanced/vendor/composer/installed.json
composer install
pwd
composer update
cd ..
cd advanced
composer install
vim /usr/share/nginx/html/advanced/vendor/composer/installed.json
composer install
vim /usr/share/nginx/html/advanced/vendor/composer/installed.json
composer install
vim /usr/share/nginx/html/advanced/vendor/composer/installed.json
composer install
vim /usr/share/nginx/html/advanced/vendor/composer/installed.json
composer install
vim /usr/share/nginx/html/advanced/vendor/composer/installed.json
mv /usr/share/nginx/html/advanced/vendor/composer/installed.json
vim /usr/share/nginx/html/advanced/vendor/composer/installed.json
cd vendor/
cd composer/
ls
mv installed.json  installed.json1
ls
cd
cd vendor/
cd composer/
ls
cp installed.json /user/share/nginx/html/advanced/vendor/composer
cp installed.json /user/share/nginx/html/advanced/vendor/composer/
cp installed.json /usr/share/nginx/html/advanced/vendor/composer/
cd
cd ..
cd advanced
composer install
pwd
composer list
composer show
composer install
cd
composer install
composer update
composer clearcache
composer
composer selfupdate
composer validate
composer update
require.kucha/ueditor : unbound version constraints (*) should be avoided
php composer.phar require scotthuangzl/yii2-export2excel "dev-master"
composer require scotthuangzl/yii2-export2excel "dev-master"
cd ..
cd advanced
composer clearcache
composer selfupdate
composer install
composer update
composer require scotthuangzl/yii2-export2excel "dev-master"
ls
cd ..
cd progress/
ls
composer install
composerupdate
composer update
composer validate
composer clearcache
ls
ls -l
cd..
cd ..
cd
ls -l
cd backend/
ls
ls-l
ls -l
cd
cd ..
cd progress/
ls
chmod 777 runtime/
ls -l
cd runtime/
ls
ls-l
ls -l
cd /
cd var/
ls
cd lib
ls
cd php/
ls
cd session/
ls
cd ..
ls -l
chmod 777 session/
mysql -u root -p
cd ..
cd progress/
ls
cd vendor/
ls
cd yiisoft/
ls
cd yii2
ls
cd web/
ls
vi User.php 
cd
composer require scotthuangzl/yii2-export2excel "dev-master"
composer global require "fxp/composer-asset-plugin:dev-master"
composer update
composer require scotthuangzl/yii2-export2excel "dev-master"
cd ..
ls
cd progress/
git pull
cd ..
cd progress/
git pull
cd ..
cd progress/
ls
git pull
cd config/
ls
vi web.php 
mysql -u root -p
cd conf
ls
vi web.php 
cd..
cd ..
git pull
git stash
git pull
cd config/
ls
vi db.php 
vi web.php 
vi db.php 
cd..
cd ..
pwd
git pull
cd config/
ls
vi web.php 
mysql -u root -p
cd
ls
pwd
cd backend/
cd web/
ls
cd uploads/
ls
pwd
cd
composer require scotthuangzl/yii2-export2excel "dev-master"
composer require "fxp/composer-asset-plugin:~1.0"
composer require scotthuangzl/yii2-export2excel "dev-master"
ls
vi composer.json 
vi composer.lock 
composer
composer status
composer list
composer show
