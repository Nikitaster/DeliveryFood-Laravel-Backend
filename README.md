# DeliveryFood-Laravel-Backend

* [Installation](#installation)
* [Create superuser](#createSuperuser)
* [Setting S3 busket](#s3Setting)
* [Setting SMTP](#smtpSetting)

## Installation<a name="installation"></a>
1. Clone this repository
2. Run (It will take some time): 
```bash
docker-compose up --build
```
3. It's working on 0.0.0.0 or localhost


## Create superuser<a name="createSuperuser"></a>
1. Register on the site. 
2. In terminal run: 
```bash
docker-compose run database -U postgres -h database --db=DeliveryFoodDB

Input the password 'postgres'
```
3. Run this sql script:
```sql
UPDATE accounts SET role_id = (SELECT id FROM roles WHERE name = 'admin') 
  WHERE user_id = (SELECT id FROM users WHERE email = 'YOUR_EMAIL@mail.ru');
```

## Setting S3 busket<a name="s3Setting"></a>
I used my scaleway S3 busket. If you would like to customize it, do: 
1. Open the config file: */app/config/filesystems.php*
2. Find the 'scaleway' disk
3. Change it with your s3 parameters

## Setting SMTP<a name="smtpSetting"></a>
1. The default settings is my mailtrap.io (it is using for tests)
2. If you would like to use your smtp driver, open */app/.env.example* file and change this settings: 
```php
MAIL_MAILER=smtp
MAIL_HOST=YOUR_HOST
MAIL_PORT=YOUR_PORT
MAIL_USERNAME=YOUR_USERNAME
MAIL_PASSWORD=YOUR_PASSWORD
MAIL_ENCRYPTION=tls
```
3. Run: 
```bash
docker-compose restart
```


