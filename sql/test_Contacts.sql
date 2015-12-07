/* 
	test_Contacts db table - stores 
	contacts made via contact_us.php in a database table 
	for safe keeping!
	11/25/2015
*/
drop table if exists test_Contacts;
create table test_Contacts
( ContactID int unsigned not null auto_increment primary key,
Name varchar(50),
Email varchar(80),
Comments text,
DateAdded datetime
);	