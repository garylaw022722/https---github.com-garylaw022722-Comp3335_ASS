drop database if exists comp3335;
create database if not exists comp3335;
use comp3335;
Drop table if exists Account ;
create table Account(
    user_id varchar(20) Primary Key,
    password varchar(256) not null,
    salt varchar(128) not null, 
    create_on timestamp  default CURRENT_TIMESTAMP,
    updated_on timestamp default CURRENT_TIMESTAMP,
    created_By varchar(20) not null,
    acType  varchar(40) not null,
    internal_uid  varchar(40) not null,
    freeze VARCHAR(1)  DEFAULT 'F',
    check(freeze  in ('F', 'T'))

);

Drop table if exists Employee;
create table Employee(
    user_id varchar(20) Primary Key,
    Dept_id int(10) not null,
    firstName varchar(15) not null,
    lastName varchar(15) not null,
    BOD  VARCHAR(344) not null,
    salary VARCHAR(344) null,
    gender varchar(2) default 'F',
    address varchar(344) not null,
    ID_Card_No varchar(344) not null,
    tel  varchar(344) not null,
    check(gender in ('F', 'M', 'NA'))
);

Drop table if exists Department;
create table Department(
	Dept_id int(10)  AUTO_INCREMENT,
    deptName varchar(50) not null,
    Primary Key(Dept_id)
);

Drop table if exists Product;
create table Product(
    pid int(10)  Primary Key  AUTO_INCREMENT,
    pName varchar(20)  not null,
    price decimal(10,2) not null,
    description  varchar(200) null,
    create_by  varchar(20) not null,
    codeVal  varchar(16)  not null,
    issueDate  date not null
);


Drop table if exists Orders;
create table Orders(
    ord_id int(10)  not null,
    pid  int(10)  not null,
    quantity int(10) not null,
    totalPrice decimal(10,2) not null, 
    orderAt timestamp default CURRENT_TIMESTAMP,
    email varchar(20) not null,
    Primary Key(ord_id,pid)
);

 Drop table  if exists Customer;
 create table Customer(
    email varchar(20) Primary Key,
    CompanyName varchar(40) not null,
    tel varchar(8)  not null
 );
 
 
 Drop table if exists Project;
 create table Project(
	project_id  int(10) not null,
    title varchar(50) not null,
    team_id int(10) not  null,
    task_id int(10)  null,
    createAt timestamp  default CURRENT_TIMESTAMP,
    Primary Key(project_id,team_id)
 );


 Drop table if exists Team;
 create table  Team(
    team_id int(10)  not null,
    user_id varchar(20)  not null,
    project_id int(10) not null,
    Primary Key (team_id ,user_id)
 );

 Drop table if exists Task;
 create table Task(
    task_id int(10) AUTO_INCREMENT Primary Key,
    project_id int(10) not null,
    assigner  varchar(20) null,
    assignee  varchar(20) null,
    details varchar(255) not null,
    status  char(1) default 'F',
    start_Date date  null,
    end_Date date null,
    check(status in('F','T'))
 );
 
insert into Department(deptName) values("IT Department");
insert into Department(deptName) values("Human Resources Department");
insert into Department(deptName) values("Sales Department");

 
 

insert into Project (Project_id ,title,team_id) values(1,"City Mapper Apps",1);
insert into Project (Project_id ,title,team_id) values(2,"Fan e-commerce",2);
insert into Task (task_id, project_id, assigner, assignee, details) values(1, 1, "MSA1234585", "Mandy2882", "UI Design");
insert into Task (task_id, project_id, assigner, assignee, details) values(2, 2, "jo324423", "ko332256", "Business Model Development");
insert into Team values(1, "MSA1234585", 1);
insert into Team values(2, "jo324423", 2);

