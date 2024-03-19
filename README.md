# Installation guide for esn backend team

Firstly, you need install on local machine these soft :

##### 1. git bash
* Win: https://git-scm.com/downloads
* Linux (terminal): `sudo apt-get install git`

##### 2. docker
* win: https://docs.docker.com/docker-for-windows/install/
* Linux: https://docs.docker.com/install/linux/docker-ce/ubuntu/

##### 3. docker-compose
* installation : https://docs.docker.com/compose/install/

## After installing all soft you can start.

**Clone files from giving repository.**

**Create new `.env` file from `env.example` and set credentials**

**Open CMD/Terminal under root (on linux `sudo su`) user and run:**
```
docker compose build
``` 
_Note : First time it will take more time, you should not run it everytime before starting work._

**Then run following command:**
```
docker compose up
```
_Note: You have to run this command everytime before starting work_

**The next thing you should do after installing Lumen is set your application key to a random string. Typically, this string should be 32 characters long. The key can be set in the .env environment file.**

**Run following commands (on CMD/Terminal under root) from new tab step by step:**
```
docker compose exec esn_backend composer install

docker compose exec esn_backend chown www-data -R storage/logs

docker compose exec esn_backend chown www-data -R storage/app

docker compose exec esn_backend ln -s /var/www/html/storage/app/public /var/www/html/public/storage

docker compose exec esn_backend php artisan voyager:install --with-dummy

docker compose exec esn_backend php artisan passport:install
```

**For getting some real data (optional):**
```
docker compose exec esn_backend php artisan db:seed --class=CustomizedDataSeeder
```

**You can specify the tables you wish to generate using (for generating migrate files by taking from table):**
```
docker compose exec esn_backend php artisan migrate:generate --tables="table1,table2,table3,table4,table5"
```

**You can generate seed files using below command.After executing this command move the place of this custom seed files names from DatabaseSeeder.php to CustomizedDataSeeder.php:**
```
docker compose exec esn_backend php artisan iseed my_table,another_table --classnameprefix=Customized
```

Now you can open the project from this link : http://localhost:8000/

### We have finished installation ) happy coding...

*PS : For php artisan commands use (under root) `docker compose exec esn_backend php artisan <your-command>`* 
