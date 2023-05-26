# TYP - Track Your Progress

Application Track Your Progress is focused on providing the best experience in tracking progress of weight lifters around the world. Create excersise groups and store the weights of every training in one app.

## Installation

1. Make sure you have the `Docker` installed and running on your system
2. Build docker images by running `docker-compose build`
3. In the root folder create `config.php` which consists database credentials:

```
<?php

const USERNAME = '';
const PASSWORD = '';
const HOST = '';
const DATABASE = '';
const PORT = '';
```

4. You are ready to go! Run `docker-compose up` to start the server

## Project structure

# Frontend

Frontend part of the application includes PHP, CSS and JavaScript files as well as SVG assets. All frontend files are located in the `public` directory.

- Assets: Directory that contains static images
- Components: Directory that contains shared PHP elements across frontend project like Header
- Src: Directory that contains CSS and JavaScript files
- Views: That's where all PHP views are located. Every file is named like the route where it renders, so `login.php` will render at `/login`

# Backend

Whole backend part except Routing, Database and Index is located under the src directory in root.

- Controllers: Place where controllers for roots are located
- Models: That's where data models are stored
- Repository: All magic around interactions with database is located here
