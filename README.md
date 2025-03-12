## Simple Ads

## Setup Instructions
### Clone the repository to your local machine:

```bash
git clone https://github.com/Edward-Zn/simple-ads.git
cd simple-ads
```

Or with SSH
```bash
git clone git@github.com:Edward-Zn/simple-ads.git
cd simple-ads
```
### Build the Docker containers:

```bash
docker-compose up --build
```
This will build the application container, MySQL container, and phpMyAdmin container.

### Running the Application
Once the containers are built, you can access the application by visiting:

- Laravel Application: http://localhost:8080
- phpMyAdmin (for database management): http://localhost:8081 (user: root, pass: root)

### Building the Docker Image
If you need to rebuild the Docker image, run the following command:

```bash
docker-compose build
```
This will rebuild the Docker images for the application.

### Testing
To test the application:

Open your browser and navigate to http://localhost:8080.
Use the form to create ads with a name, description, price, and images.
Check the ads displayed on the main page and ensure the images are properly uploaded and displayed.

---

#### Notes:
If you need to restart the containers, you can run:

```bash
docker-compose restart
```
If you encounter any issues with MySQL connection, make sure the database container is running by checking:

```bash
docker ps
```
Docker environment settings are in the .env file
Local environment can be set in .env.local file
