
use comp3335;
create Role if not exists 'HR_Dept_Staff';
Grant select,update,insert  on comp3335.Employee to 'HR_Dept_Staff';


#IT department

# IT_Dept_Staff
create Role if not exists 'IT_Dept_Staff';
create view itData as select firstName, lastName, user_id, deptName from Department inner join Employee using (Dept_id)  ;
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









#Sales Manager
create Role  'Sales_Dept_Staff' ;
Grant select,insert,update on comp3335.Orders to 'Sales_Dept_Staff';
Grant select,insert,update on comp3335.Product to 'Sales_Dept_Staff';
Grant select,insert,update on comp3335.Customer to 'Sales_Dept_Staff';



