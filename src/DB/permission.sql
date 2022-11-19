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

