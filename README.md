# https---github.com-garylaw022722-Comp3335_ASS

This project aimed to develop a docker-compose stack to set up a LAMP stack.
Our sample system is a database for a sales company.
There are 9 tables and 5 roles in our system.


#Step:
1. Open Terminal (For windows, please open Bash), change the directory to the source code.
2. Enter command "docker swarm init" in order to initialize a swarm for docker
3. Enter command "./startApp.sh" to run the bash code for the docker container
4. The system will ask you to input mysql password (freely defined).
5. Wait for the container creation. It takes about 1-2 minutes.
6. Open browser and try the system! The urls are as follow:
    User Interface (website): localhost:9000
    DBMS (phpMyAdmin) : localhost:9001
    You can also use MySQL workbench for the DBMS connection.
    The port for connection in MySQL is 3302.
   
    the database password is stored in data.txt
   
