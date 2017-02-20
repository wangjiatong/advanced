git commit -m "add business action"
cd ..
ls
cd frontend/
ls
cd views
cd site
ls
git add business.php 
git commit -m "add business.php"
cd ..
ls
cd layouts/
ls
git add main.php 
git commit -m "modified the url for business page"
cd ..
ls
cd ..
ls
cd controller
cd controllers/
ls
git add SiteController.php 
git commit -m "change the action product to products"
cd ..
ls
cd views/
ls
cd layouts/
ls
git add main.php 
git commit -m "change product to products"
cd ..
cd site
ls
git add products.php 
git commit -m "rename product.php to products.php"
ls
git add products.php 
git commit -m "change the wrong title"
cd ..
ls
cd controllers/
ls
git add SiteController.php
git commit -m "add actionNews"
cd ..
cd views
cd layouts/
ls
git add main.php 
git commit -m "add actionNews"
cd ..
cd site/
git add news.php 
git commit -m "add news.php"
cd ..
cd layouts/
ls
git add main.php 
git commit -m "change the url for contact"
cd ..
cd site/
ls
git add contact.php 
git commit -m "change the template for contact.php"
cd ..
cd controllers/
git add SiteController.php 
git commit -m "add actionJoinUs"
cd ..
ls
cd views/
cd layouts/
ls
git add main.php 
git commit -m "add the url for joinUs and login
git commit -m "add the url for joinUs and login"




/
cd
:q
git commit -m "add the url for joinUs and login"
cd ..
cd site/
git add joinUs.php 
git commit -m "add joinUs.php"
git add join.php 
git commit -m "rename joinUs.php to join.php"
cd ..
cd layouts/
git add main.php 
git commit -m "fix the url for index and join"
cd ..
cd controllers/
git add SiteController.php 
git commit -m "rename the actionJoinUs to Join"
cd ..
cd views/
cd layouts/
ls
git add main.php 
git commit -m "translate it"
ls
git add main.php 
cd ..
cd site/
git add .
git commit -m "fix the <a> color problem"
cd
ls
git add .
git commit -m "almost finish the frontend template"
git push origin dev
cd ..
ls
cd advanced
git pull
cd
ls
cd frontend/
ls
cd web/
ls
cd img/
ls
cd
ls
cd frontend/
cd web/
ls
cd img/
ls
git add logo.png
git commit -m "change the logo"
git push origin dev
cd
cd ..
ls
cd advanced
ls
git merge dev
git pull
cd
cd frontend/
cd views/
cd site/
git add error.php 
git commit -m "modified the error page"
git add login.php 
git commit -m "comment the passwd reset temply"
ls
cd backend/
ls
cd web/
ls
git add css img js
git commit -m "add the backend template assets that backend needs"
cd ..
ls
cd views/
ls
cd site/
ls
git add index.php login.php 
cd ..
cd layouts/
git add main.php 
 cd ..
ls
cd ..
cd assets/
git add AppAsset.php 
git commit -m "init the template for backend then do something about backend login next"
cd ..
ls
cd models/
ls
git add LoginForm.php User.php 
git commit -m "add new models for backend users"
cd ..
cd config/
ls
git add main.php
cd ..
cd controllers/
git add SiteController.php 
git commit -m "modified the confs for new user models at backend"
git add SiteController.php 
cd ..
cd models/
git add PasswordResetRequestForm.php ResetPasswordForm.php SignupForm.php 
cd ..
cd views/
cd site/
git add requestPasswordResetToken.php resetPassword.php signup.php 
git commit -m "create the models and views for the backend users"
cd ..
cd controllers/
ls
git add SiteController.php 
git commit -m "change user to admin"
cd ..
cd models/
git add .
git commit -m "change the user to admin"
cd ..
cd config/
git add main
git add main.php
git commit -m "change the user to admin"
mysql -u root -p
msql -u root -p
mysql -u root -p
git add main.php 
git commit -m "add component db"
yii migrate/create create_admin_table
cd
yii migrate/create create_admin_table
php yii migrate/create create_admin_table
ls
cd console/
ls
cd migrations/
ls
cd
php yii migrate/create create_admin_table
cd console/
cd migrations/
ls
git add m161108_042108_create_admin_table.php 
git commit -m "create a migration"
git push origin dev
ls
vi m161108_042108_create_admin_table.php 
vi m130524_201442_init.php 
vi m161108_042108_create_admin_table.php 
git add m161108_042108_create_admin_table.php 
cd ..
ls
cd backend/
cd models/
ls
git add AdminSignupForm.php 
git commit -m "add $auth for admin"
cd
yii migrate
php yii migrate
cd backend/
php yii migrate
yii migrate
cd ..
cd console/
yii migrate
php yii migrate
cd
ls
php yii migrate
php yii migrate/to m161108_042108_create_admin_table
service mysqld status
chkconfig --list mysqld
mysql -u root -p
/var/lib/mysql/mysql.sock
php yii migrate/to m161108_042108_create_admin_table
cd ..
ls
cd /
cd etc
ls
cd mysqld
cd mysql
whereis mysql
cd /usr/share/mysql
ls
cd
ls
git add .
git commit -m "the first time conf for db fails, now try again"
mysql -u root -p
php yii migrate/to m161108_042108_create_admin_table
cd
ls
init
yii init
./init
php yii migrate/to m161108_042108_create_admin_table
cd
git add .
git commit -m "ran a init for a try, no diff while can see"
php yii migrate/to m161108_042108_create_admin_table
mysql -u root -p
mysql_upgrade -u root -p
php yii migrate/to m161108_042108_create_admin_table
mysql -u root -p password
mysql -u root
mysql -u root -p
mysql -u root -p password
php yii migrate/to m161108_042108_create_admin_table
git add .
git commit -m "add validation key in dev conf, which is abc, meaningless"
yii migrate
php yii migrate
git add .
git commit -m ".."
php yii migrate
php yii migrate/to m161108_042108_create_admin_table
mysql -u root -p
php yii migrate/to m161108_042108_create_admin_table
php yii migrate/to
git add .
git commit -m "the very working conf file is under /common/config/main-local.php"
php yii migrate
git add .
git commit -m "change the wrong conf file into the original status"
yii migrate
php yii migrate
mysql -u root -p
php yii migrate
php yii migrate down
php yii migrate/down
mysql -u root -p
php yii migrate/down 2
mysql -u root -p
php yii migrate
mysql -u root -p
create table admin select * from user;
mysql -u root -p
select * from user;
mysql -u root -p
cd
ls
php yii migrate
php yii migrate/down
mysql -u root -p
php yii migrate/down 2
php yii migrate;
mysql -u root -p
git add .
git commit -m "backend login successful now"
git push origin dev
ls
cd backend/
ls
cd views/
ls
cd s
cd site/
ls
cd /etc/nginx
ls
cd conf.d/
LS
ls
vi yii.conf
ls
vi yii-test.conf 
cd
php yii migrate
php yii migrate/create
php yii migrate/create_news_table
php yii migrate/create create_news_table
php yii migrate
mysql -u root -p
ls
php yii migrate/down
mysql -u root -p
php yii migrate/up
mysql -u root -p
cd /
ls
cd /etc/nginx
ls
cd conf.d/
ls
vi yii.conf
reboot
mysql -u root -p
php composer.phar require --prefer-dist yiisoft/yii2-debug
composer require --prefer-dist yiisoft/yii2-debug
ls
vi composer.json
cd /etc/nginx/conf.d
ls
vi yii-test.conf
cd
vi composer.json 
composer update
composer require --prefer-dist yiisoft/yii2-debug
mysql -u root -p
vi /etc/nginx/conf.d/yii-test.conf 
mysql -u root -p
vi /etc/nginx/conf.d/yii-test.conf 
vi /etc/nginx/conf.d/yii.conf 
mysql -u root -p
ls
git add .
git commit -m "post fails, before change the frontend text"
git push origin dev
ls
cd ..
ls
cd advanced
git pull
cd
ls
cd ..
cd
ls
cd
git branch
git push origin dev
ls
pwd
cd ..
ls
cd advanced
git pull
pwd
cd /etc/nginx
ls
cd conf.d/
ls
vi yii.conf 
cd
git add .
git commit -m "something left"
git push origin dev
cd ..
cd advanced
git pull
pwd
git pull
git branch
cd
git branch
ls
git add .
git commit -m "frontend static content is done"
git push origin dev
cd ..
cd advanced
git pull
git add .
git commit -m "updated the frontend"
git push origin dev
cd ..
cd advanced
git pull
git add .
git commit -m "beian"
\git branch
cd ..
cd
git add .
git commit -m "beian"
git push origin dev
git checkout
git checkout master
git branch
git merge dev
cd ..
cd advanced
git pull
cd 
git add .
git checkout dev
git branch
git add .
git commit -m "beian"
git push origin dev
git add .
git commit -m "update the erweima"
git push origin dev
chmod 0600 /usr/share/nginx/html/advanced-test/.ssh/id_rsa
git push origin dev
cd ..
cd advanced
git pull
mysql -u root -p
cd
yii migration
php yii migration
php yii migrate
php yii migrate/create
php yii migrate/create create_news_column_table
php yii migrate/up
mysql -u root -p
cd
composer require kucha/ueditor "*"
mysql -u root -p
git add .
git commit -m "static frontend"
git push origin dev
cd
cd ..
cd advanced
git pull
cd
pwd
git add .
git commit -m "update the frontend"
git push origin dev
cd ..
cd advanced
git pull
mysql -u root -p
cd
git add .
git commit -m "before gii"
git push origin dev
cd
cd upload
cd /web
ls
cd backend
lsa
ls
cd web
ls -a
ls -l
chmod 777 upload
ls -l
cd upload/
ls -l
chmod 777 image
ls -l
cd image/
ls
ls -l
cd ..
ls -l
pwd
ls
cd image/
ls
 rm -rf 20170103/
ls
ls -l
cd backend/
ls -l
chmod 777 views
ls -l
chmod 755 views
ls -l
mysql -u root -p
cd
git add .
git commit -m "temp"
git push origin dev
cd ..
cd advanced
git pull
mysql -u root -p
cd
yii migrate/down
php yii migrate/down
php yii migrate/down 2
php yii migrate/up
mysql -u root -p
cd
php yii migrate/down 2
php yii migrate/up 2
mysql -u root -p
cd
php yii migrate/down
php yii migrate/down 2
php yii migrate/down 3
php yii migrate/down 2
php yii migrate/up 2
mysql -u root -p
cd ..
ls
cd
pwd
git add .
git commit -m "finished backend news update, then turn to the frontend"
git push origin dev
mysql -u root -p
ls
php yii migrate/up
php yii migrate/up 1
php yii migrate
php yii migrate/redo
php yii migrate
php yii migrate/up
php yii migrate/down
php yii migrate/to 161116_080032
php yii migrate/create add_summary_column_for_news_table;
php yii migrate
mysql -u root -p
cd
php yii migrate/create add_column_id_for_news_table;
yii migrate/up
php yii migrate/up
mysql -u root -p
cd
php yii migrate/create drop_column_column_for_news_tables;
php yii migrate/up
use advanced;
mysql -u root -p
cd
git add .
git commit -m "finished the news function"
git push origin dev
cd ..
ls
cd advanced
cd ..
cd advanced
git pull
mysql -u root -p
cd /root
ls
ls -l
ls -a
git log
cd
git log
cd ..
cd advanced
git log
cd
git add .
git commit -m "sql1045"
git push origin dev
cd
cd ..
cd advanced
git pull
mysql -u root -p
cd
git add .
git commit -m "sql problem"
git push origin dev
cd ..
cd advanced
git merge dev
git branch
cd
git checkout master
git merge dev
git checkout dev
cd ..
cd advanced
git pull
cd
cd ..
cd advanced
git log
git reset --hard 
git reset --hard 56ccc9ee88292e9c8f37ca634d93e50e426c202f
ls
cd frontend/
cd web/
ls
vi index.php
pwd
cd
cd frontend/
cd web/
vi index.php 
pwd
vi index.php 
vi /root/.mysql_secret
cd
git add .
git commit -m "sql problem"
git push origin dev
git checkout master
git merge dev
git checkout dev
cd ..
cd advanced
git pull
cd ..
cd advanced
ls
cd common/
ls
cd config/
ls
vi main.php
vi main-local.php 
pwd
git add .
git commit -m "fixed some bugs for news function"
git push origin dev
git checkout master
git merge dev
git checkout dev
cd
cd ..
cd advanced
git pull
cd
git checkout
git checkout master
git pull
git merge dev
git checkout dev
git pull
cd ..
cd advanced
git pull
cd
git branch
git log
git push origin dev
git checkout master
git merge dev
git pull
git merge dev
git checkout dev
cd ..
cd advanced
git pull
git bracnh
git branch
git log
cd
git log
git checkout master
git log
git branch
git merge dev
git log
git branch
git pull
git checkout dev
git log
cd ..
cd advanced
git pull
ls
vi composer.json 
php composer.phar require kucha/ueditor "*"
composer dump-autoload
composer
composer update
composer install
cd
git add .
git commit -m "fix the bug for article"
git push origin dev
cd ..
cd advanced
git merge dev
cd
git branch
git checkout master
git pull
git merge dev
git checkout dev
git branch
cd ..
cd advanced
git pull
cd
git add .
git commit -m "fix the bugs for article"
git push origin dev
git checkout master
git merge dev
git checkout dev
cd ..
cd advanced
git pull
cd
git add .
git commit -m "frontend update"
git push origin dev
git checkout master
git pull
git merge dev
git checkout dev
cd ..
cd advanced
git pull
git pull\
git pull
git log
cd
git log
cd
git add .
git commit -m "set the favicon"
git push origin dev
cd ..
cd advanced
git pull
git add .
git commit -m "finished the contact function"
git pushi origin dev
git push origin dev
cd ..
cd advanced
git pull
ls
cd vendor/
ls
cd yiisoft/
ls
cd yii2
ls
cd captcha/
ls
vi CaptchaAction.php 
vi CaptchaValidator.php 
cd ..
pwd
ls
cd frontend/
ls
cd config/
ls
vi main.php 
ls -a
ls -l
cd ..
ls -l
cd runtime/
ls -l
chmod 777 debug
ls -l
cd ..
cd advanced
ls
cd backend/
ls
cd models/
ls
cd ..
cd common/
ls
cd models/
ls
vi PostNewsForm.php 
cd ..
cd backend/
ls
cd views/
ls
cd news/
ls
vi newsUpdate.php 
vi post.php 
cd ..
cd controllers/
ls
cd NewsController.php 
vi NewsController.php 
cd 
cd ..
cd advanced
ls
cd backend/
ls
mkdir upload
ls
cd upload/
cd
cd backend/
ls
cd
ls
cd backend/
ls
cd web
ls
cd ..
ls
cd ..
ls
cd backend/
ls
ls -l
cd web/
ls
cd upload/
ls
ls -l
cd ..
cd
cd ..
cd advanced
ls
cd backend/
cd web/
ls
ls -l
cd upload/
mkdir image
ls
ls -l
pwd
cd image/
ls
ls -l
cd ..
ls -l
cd ..
ls -l
cd
cd backend/
ls
cdc web/
ls
cd web/
ls
ls -l
cd upload/
ls -l
cd image/
ls
cd 20170215/
ls
pwd
 cd ..
cd ..
chmod 777 upload
ls -l
cd upload/
ls -l
chmod 777 image
ls -l
cd 
cd ..
cd advanced
ls
cd backend/
cd web/
ls
chmod 777 upload
cd upload/
chmod 777 image
pwd
cd image/
ls
cd 20170217
ls -l
cd ..
ls -l
cd
cd ..
ls
cd ..
ls
cd etc/
ls
cd nginx
ls
cd conf.d/
ls
vi yii.conf 
vi yii-test.conf 
vi yii.conf 
cd
ls
cd backend/
ls
cd web/
ls
cd upload/
ls
cd image/
ls
cd 20170215
ls
cd ..
cd 20170217
ls
cd ..
ls
rm 20170215 -r
ls
rm 20170217 -r
ls
cd ..
pwd
cd
cd ..
cd advanced
cd backend/
cd web/
cd upload/
ls
cd image/
ls
rm 20170215 20170217 -r
ls
cd ..
ls
cd ..
ls -l
cd upload/
ls -l
