# Teaching System

## Requirements
- PHP
  - php-mysql
  - php-xdebug
- Git
- Composer
- MySQL
- Docker for running MySQL
- NodeJS
- NVM for handling multiple nodejs versions (optional)
- VS code/Zed IDE
- DBeaver(or any other DB client)

## Setup the environment

- Clone the repository with
```
  git clone https://github.com/avallelisboa/TeachingSystem/
```
- Download the dependencies executing the command
```
  composer install
```
- Setup the docker container for the DB running this command
```
  docker compose up
```
## Docker main commands
- Listing all active containers
```
  docker ps
```
- Listing all containers
```
  docker ps -a
```
- Starting a container
```
  sudo docker start {{CONTAINER_NAME}}
```
- Stopping a container
```
  sudo docker stop {{CONTAINER_NAME}}
```
## Git main commands
- Look at pending changes
```
  git status
```
- Add file to commit
```
  git add {{file_name}}
```
- Add all files excpet the one that are list in .gitignore
```
  git add .
```
- Make a commit
```
  git commit -m "Enter a message here indicating the implemented changes."
```
