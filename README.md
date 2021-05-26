# SLVtask

## Requirements
  - docker
  - docker-compose

## Process to run
  - ``` sudo docker-compose up --build ```
  - Open http://localhost:8080/ in browser.
  - Check the box and upload the data file. You will receive a alert for confirmation.
  - Uncheck the box and upload the data file to update the existing data. You will receive a alert for confirmation.

## Check data in MySQL

  Run the following commands to see the data saved in the database.

  - ``` docker exec -it mysql8-container bash ```
  - ``` mysql -u root -p ``` 
  - Enter the password: 'secret'
  - ``` use slv-table; ```
  - ``` select * from dataitems; ```
