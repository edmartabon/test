# Installation
## Steps how to install the application

#### 1. Copy the .env.example
```sh
cp .env.example .env
```

#### 2. Install docker and run this command
```sh
docker-compose up -d
```

#### 3. Install packages
```sh
docker-compose run composer install
```

#### 4. Done. You can now visit the application
```
http://localhost
```

If you having trouble on storage permission just run this command.
```sh
sudo chmod -R 777 storage
```

Notes:
You must be on the root folder to run all this commands.