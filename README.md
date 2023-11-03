# Kamagru Full Stack Web Application
## Description
This is a full stack web application that allows users to take pictures with their webcam and add stickers to them. The user can then upload the picture to the website and view it in the gallery. The user can also delete their pictures from the gallery. The application is built using PHP, HTML, CSS, and JavaScript. The application uses a MySQL database to store user information and pictures. Enjoy!

## Docker
This application is built using Docker. The docker-compose.yml file will create three containers: one for the web server, one for the database, and one for the phpmyadmin interface. The web server container is built using the Dockerfile in the root directory. The database container is built using the Dockerfile in the database directory. The phpmyadmin container is built using the Dockerfile in the phpmyadmin directory. The web server container is linked to the database container and the phpmyadmin container. The database container is linked to the phpmyadmin container. The phpmyadmin container is linked to the database container.

## Installation

```
    docker-compose up -d
```

## Usage
```
    http://localhost
```

## Author
* **Adem Hatay** - [website](https://ademhatay.com)
