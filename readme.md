## Env setup

Install Silverstripe with composer:
`composer create-project silverstripe/installer`

Build the container:
`docker compose up -d`

Update the .env and _ss_environment.php files with the correct database settings. These files should have the same settings.

Bash into the running sql image and create the database set in the .env and _ss_environment.php files:
`docker exec -it <image id> /bin/bash`

<!-- Add the domain to the `etc/hosts` file. -->

For details about the Docker setup, see the info:
 - (here)[https://www.silverstripe.org/blog/construct-a-better-development-environment-with-docker/]
 - and (here)[https://hub.docker.com/r/brettt89/silverstripe-web/].


# Useful commands
<!-- You can replace container_id with custom names... -->

## Commands
- `docker run` -> creates a container from an image (if not present locally it pulls from remote)
- `docker stop <container_id>` -> stops the container
- `docker start <container_id>` -> starts the container of an existing container
- `docker ps` -> Check all containers running
- `docker ps -a` -> Check all containers running and not running
- `docker rm <container_id>` -> removes the container
- `docker rmi <image_id>` -> removes the image

## Debugging
- `docker logs <container_id>` -> logs of the container
- `docker exec -it <container_id> /bin/bash` -> enter bash in the container

## Parameters
- `-d `-> detach mode which means you can run the container in the background
- `-p` <localport>:<containerport> -> port mapping to allow access to the container
- `-f` -> force remove the container if it exists
- `--name <name>` -> name of the container

## Versions
`<image>:<version>`

### Docker compose
The idea of docker compose is to create a docker-compose.yml file and then run it.

Inside the docker-compose.yml file you can define the images, ports, volumes, and other parameters.

It creates a docker network and then creates the containers. This way you can have multiple containers running in the same network.

## Docker compose commands
- `docker-compose -f <filename> up` -> starts the containers
- `docker-compose down` -> stops the containers
- `docker-compose build` -> builds the containers
- `docker-compose run <container_name>` -> runs the container
- `docker-compose logs <container_name>` -> logs of the container
