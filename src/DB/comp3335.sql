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
    internal_uid  varchar(40) not null
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

 
 
insert into Employee values("MSA1234585", 1,"Gary","Law" ,"2002-02-23",10000,"M","SHP","S1919388","1282828");
insert into Employee values("Mandy2882", 1,"Mandy","Wong" ,"1902-02-23",10000,"M","SHP","Z1919388","1212828");
insert into Employee values("jo324423", 1,"Jo","Ng" ,"1999-02-23",4000,"M","SHP","Y1155968","2525989");
insert into Employee values("ko332256", 1,"Jacky","Chan" ,"1999-08-26",2000,"M","SHP","Y5566889","9090556");
insert into Project (Project_id ,title,team_id) values(1,"City Mapper Apps",1);
insert into Project (Project_id ,title,team_id) values(2,"Fan e-commerce",2);
insert into Task (task_id, project_id, assigner, assignee, details) values(1, 1, "MSA1234585", "Mandy2882", "UI Design");
insert into Task (task_id, project_id, assigner, assignee, details) values(2, 2, "jo324423", "ko332256", "Business Model Development");
insert into Team values(1, "MSA1234585", 1);
insert into Team values(2, "jo324423", 2);


INSERT INTO Employee VALUES
('Gary123', 1, 'sasakn', 'snasak', 'Vih07nW8vR2exNM68kuTsfSAf//RCDS0uSl7dLN7NHz6A/1g0QWDqIfB56cpqOH/j13J+hojVSyECLgtu+8jL61LabrDZuIftQhHfHK/PtMsZx01NhZeekZTI6eGzkIxnB3NIgb7nqaMcer7Iw56kxs93yEuDsYBcZsXp3e5bFKDzFYsVkYv82vwvEM43qFGNCOoPctethRFOQwd1M4n5yLZewY4JROzkqDUbVFtA/9jCm26+6K1E298TJkSzpbXH4GyCVLeAqVjBaq7/su6rFw8qYCqmw32tth76CBEWT4f971QvmI600y3YWFLWtqzCplBPrzf1A0ilPaUHWfzWg==', 'I22v3Z0lvqhJJlu8GiXddSaVY5a0iwB+TyUfsDmBLpM/Yut2J5ALuSy/KD14pusIgIhiL+bBwG+s4/FzSQdXcw21UvTFZA36eSRkemV+oMpmo+8m4SZ75gX72xrYOhy144AOFsMbS0gO3bWC/yDC7xgdyA4j2sdLqn32lqCEgk599Qdtd01n67umIkWorONWU03sAAnF5WGqfI99E1UY+LOlLx49ett9n19Th7DMZrjzH30hHSSxIsbtA0A3S8o6c0H3tAJUqyylckr/ccbLW/K0U9f3vLKyDZqjTPD+V+OKQSnHTbBVPvYUD17YKPJ2rz0KeS7aqpMkx/z9a3AisQ==', 'F', 'jLGBgoo89lRLKKXqWD1bixvL7dP2pXoSmncQuisjpb9oZdNkr48L+aBfEVh+OT2GXPxY6VupeFnqFOEjxh3UiGMASYJ6MJNgh0DgkuuCXRTYbn/vpW8Xfpzlh5FQ7VRjqeSV2gHXLU4+0FtnfsYTRZEPln/DQ9CBf+jqHX5P1c9GQYXjpO6mGZIbeaJSKZZxo9jlgEDcBOdvOss4e6nJSwbfg6YN/p2RJT0PBmVECH+5xr939zhdjKv9JGduDH8BdiLixWjsMyFRcV/j+ImK+x74jwkBbpGZUpmzp9Vu1pmwQGFI4x1r9uWJwicXortrtHLr8Ftl7n7Uj6fsc6BrTA==', '2h3LFSmZfEBb2gcEw0PqbDCdAPDuWyd8QeHsh/odsnYXqDeYwC2AUX6w80FoLhag2qf+JU8RhTMmUDoogPvegtmtCOfBGeA2QEDdYVexaXP8Nz9jB+7EUQdqkWaDFqNosboBijM3mATCNsNAUcTa8JycNLmlcuEMLeqTFTJ7a9Yd3++9Y3MRWP/JQv5rhzZ8U4ZDtmhJZxRYrMWfaZzT8MRp9kaiBem5MhQ2KlFfVixI8peyBpNgmn8WfuMZY1/lIprGNVElAosx6bk9J9JnAfuKT6Q+Mxf6dOWH9O51Lr0mt0wjMN69MxnrYiHOBApEhnSZQm2yE8UMQ1TUsjDdYQ==', 'dH3ozCEEFl76sLh4npfccrzeBiveEqfV/FLPiuYeswvoNcvdgNf6t/ilLjc9lrKQ4cAk/AKuqluLPvNnOd/m+iEE/HnoENtnzeVud2yplmW4Jktqj4qhesyhTHlklRQaqiC2+YOZIM+lzbYw3Nh+KCvZ6Tm8Rr3DGUPGNfQlCadoaEs+NvAuwerw6p8NLRcBy0ZehS9GznbP5Fxr85Eb0n3OYmOfHWJ91RuKYThmIla4RjBp8FJ6ejE5n6WHDWrqdIstRdYEu7NG6cWrm64wNe+lk+CKKRve9Enx3+DU09zAH0iWEdJ8BK0snMJsWWQIBzXByAXXd5iXCE5O3EALXQ==');


# permission--------------------------------------------


use comp3335;
create Role if not exists 'HR_Dept_Staff';
Grant select,update,insert  on comp3335.Employee to 'HR_Dept_Staff';
Grant select on comp3335.Department to 'HR_Dept_Staff';

#IT department

# IT_Dept_Staff
create Role if not exists 'IT_Dept_Staff';
create view itData as select firstName ,lastName, user_id , deptName from  Department inner join Employee using (Dept_id)  ;
create view showAC_Id as Select user_id from Account ;
grant select on showAC_Id to 'HR_Dept_Staff';

Grant select on itData to 'IT_Dept_Staff';
Grant select on comp3335.Project to 'IT_Dept_Staff';
Grant select on comp3335.Team    to 'IT_Dept_Staff';
Grant select on comp3335.Task    to 'IT_Dept_Staff';

# 'IT_Direct_Manager' 
create Role  'IT_Direct_Manager' ;
Grant insert,update,delete on comp3335.Project to 'IT_Direct_Manager';
Grant insert,update,delete on comp3335.Team to 'IT_Direct_Manager';
Grant insert,update,delete on comp3335.Task to 'IT_Direct_Manager';


#Admin
create Role  'Admin' ;
Grant select,insert,update on comp3335.Account to 'Admin';
Grant All PRIVILEGES on comp3335.* to 'Admin' with Grant Option;
REVOKE Create ,DELETE,DROP  on *.* from 'Admin';


DELIMITER //
 create  PROCEDURE createUser(in userRole varchar(150) , in userId varchar(20) ,in pwd varchar(256)) 
 BEGIN

    SET @userCreate = CONCAT('CREATE USER "',UserId,'"@"%" IDENTIFIED BY "',pwd,'" ');
		 PREPARE  createUser_cmd FROM @userCreate;
		 execute  createUser_cmd;
     
	SET @grantRole  =  CONCAT('grant  "',userRole,'"  to "' ,UserId,'"@"%"');
		PREPARE grantUsr_cmd FROM @grantRole ;
		execute  grantUsr_cmd;
        
	SET @setRole =concat('set default role "',userRole, '" to "' ,UserId,'"@"%"' );
       PREPARE setRole_Cmd FROM  @setRole ;
	   execute setRole_Cmd;

 END //


GRANT EXECUTE ON PROCEDURE createUser TO 'Admin';

 create  PROCEDURE Disable_USR_Account( in userId varchar(20)) 
 BEGIN
    SET @disableAccount= CONCAT('Alter USER  "',UserId,'"@"%"  ACCOUNT LOCK');
		 PREPARE  disableAccountCmd FROM @disableAccount;
		 execute disableAccountCmd;
		
     
	SET @RevokeUserAccount =  CONCAT(' revoke all  privileges  on *.* From  "' ,UserId,'"@"%"');
		PREPARE RevokeUserCmd FROM @RevokeUserAccount ;
		execute  RevokeUserCmd;
	

 END //
 GRANT EXECUTE ON PROCEDURE Disable_USR_Account TO 'Admin';




#Sales Manager
create Role  'Sales_Dept_Staff' ;
Grant select,insert,update on comp3335.Orders to 'Sales_Dept_Staff';
Grant select,insert,update on comp3335.Product to 'Sales_Dept_Staff';
Grant select,insert,update on comp3335.Customer to 'Sales_Dept_Staff';



INSERT INTO Account (user_id, password, salt, create_on, updated_on, created_By, acType, internal_uid) VALUES
('Alice123', 'fa14fe2c14aee437ac0186be0a2ce3b9a31f9ca93d94c2493d2d94f1223f493e', '85ka1/VUq1RluO98AdG3Yw==', '2022-11-18 14:21:27', '2022-11-18 14:21:27', 'HXA', 'Admin', 'Alice123@%');

create user 'Alice123'@'%'  identified by '123';
grant 'Admin' to 'Alice123'@'%';
set default role 'Admin' to 'Alice123'@'%';

