# Lumen Statistics Summary API
This project is an assignment done for Clipboard Health job application

## Setup Instructions
P.S. If cloning from the github repo make sure you switch to `git checkout NA/clipboard-statistics-summary-assignment` after cloning.

1. Copy `.env.dist` to `.env` for example: `mv .env.dist .env`.
2. Make sure you have compose installed and run the following command on the host `composer install`.
3. Make sure you have docker-compose installed and run `docker-compose build --no-cache`.
4. Finally run this command `docker-compose up -d`.

## Testing
Once the container has been published run `docker ps` and grab the containers id then run the following command:
`docker exec {container_id} vendor/bin/phpunit --testdox`

## How to test the system
You can use postman or curl to perform these operation

### Fetch a valid token
The first step you need to do is to login to the service and get a valid token to use in all subsequent requests:
Endpoint: `POST /api/login`
Params: `username=nabil` and `password=supersecret`

You will get a token in the response copy it because you will need it for all the other requests.

### API Endpoints:
For all the of the following endpoints you need to make an HTTP request and provide your Bearer Token in the `Authorization: Bearer {token}` HTTP header.
1. An API to add a new record to the dataset. `GET /api/add`
`
curl --location --request POST 'http://localhost:8000/api/add' \
    --header 'Authorization: Bearer {token}' \
    --form 'name="nabil"' \
    --form 'salary="80000"' \
    --form 'currency="USD"' \
    --form 'department="Engineering"' \
    --form 'on_contract="1"' \
    --form 'sub_department="Backend"'
`
2. An API to delete a record to the dataset. `DELETE /api/delete/{id}`
`curl --location --request DELETE 'http://localhost:8000/api/delete/7' --header 'Authorization: Bearer {token}'`

3. An API to fetch SS for salary over the entire dataset.  `GET /api/fetch/all`
`curl --location --request GET 'http://localhost:8000/api/fetch/all' --header 'Authorization: Bearer {token}}'`

4. An API to fetch SS for salary for records which satisfy "on_contract": "true". `GET /api/fetch/contracted`
`curl --location --request GET 'http://localhost:8000/api/fetch/contracted' --header 'Authorization: Bearer {token}}'`

5. An API to fetch SS for salary for each department. `GET /api/fetch/department/{department}`
`curl --location --request GET 'http://localhost:8000/api/fetch/department/Banking' --header 'Authorization: Bearer {token}'`

6. An API to fetch SS for salary for each department and sub department. `GET /api/fetch/department/{department}/{sub_department}`
`curl --location --request GET 'http://localhost:8000/api/fetch/department/Banking/Loan' --header 'Authorization: Bearer {token}}'`