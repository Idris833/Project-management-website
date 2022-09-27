INSERT INTO User ( username, email, first_name, last_name, is_manager)VALUES( "JKumar", "jack@gmail.com", "jack", "kumar", false);
INSERT INTO User ( username, email, first_name, last_name, is_manager)VALUES( "hhmidouch", "hamza@gmail.com", "hamza", "hmidouch", false);
INSERT INTO User ( username, email, first_name, last_name, is_manager)VALUES( "JDoe", "john@gmail.com", "John", "Doe", false);
INSERT INTO User ( username, email, first_name, last_name, is_manager)VALUES( "hAkka", "hatim@gmail.com", "hatim", "Akka", false);
INSERT INTO User ( username, email, first_name, last_name, is_manager)VALUES( "ADhamma", "arjun@gmail.com", "Arjun", "Dhamma", false);
INSERT INTO User ( username, email, first_name, last_name, is_manager)VALUES( "ASharma", "angelina@gmail.com", "Angelina", "sharma", false);
INSERT INTO User ( username, email, first_name, last_name, is_manager)VALUES( "pparker", "peter@gmail.com", "Peter", "Parker", true);
INSERT INTO User ( username, email, first_name, last_name, is_manager)VALUES( "pdriver", "peter2@gmail.com", "peter", "Driver", true);
INSERT INTO User ( username, email, first_name, last_name, is_manager)VALUES( "soloman", "solo@gmail.com", "Han", "Solo", false);

INSERT INTO `Employee`(`uid`) VALUES(1);
INSERT INTO `Employee`(`uid`) VALUES(2);
INSERT INTO `Employee`(`uid`) VALUES(3);
INSERT INTO `Employee`(`uid`) VALUES(4);
INSERT INTO `Employee`(`uid`) VALUES(5);
INSERT INTO `Employee`(`uid`) VALUES(6);
INSERT INTO `Employee`(`uid`) VALUES(9);

INSERT INTO `Team`(`team_name`) VALUES("Team 1");
INSERT INTO `Team`(`team_name`) VALUES("Team 2");

INSERT INTO `Role`(`role_name`) VALUES("IT");
INSERT INTO `Role`(`role_name`) VALUES("Media Buyer");
INSERT INTO `Role`(`role_name`) VALUES("Salesman");

INSERT INTO `Team_Member`(`eid`,`tid`,`rid`) VALUES(1,1,1); -- emp 1 team 1 role IT 
INSERT INTO `Team_Member`(`eid`,`tid`,`rid`) VALUES(2,1,2);
INSERT INTO `Team_Member`(`eid`,`tid`,`rid`) VALUES(3,1,3);
INSERT INTO `Team_Member`(`eid`,`tid`,`rid`) VALUES(4,2,1);
INSERT INTO `Team_Member`(`eid`,`tid`,`rid`) VALUES(5,2,1);
INSERT INTO `Team_Member`(`eid`,`tid`,`rid`) VALUES(6,2,1);


INSERT INTO `Project`(`project_name`,`description`,`start_date`,`end_date`,`is_external`)
             VALUES("project 1","Our first project","2021-10-12","2021-11-12",0);

INSERT INTO `Project`(`project_name`,`description`,`start_date`,`end_date`,`is_external`)
             VALUES("project 2","A project for a client","2021-11-10","2022-03-24",1);

INSERT INTO `Manager`(`uid`,`pid`) VALUES(7,1);
INSERT INTO `Manager`(`uid`,`pid`) VALUES(8,2);


INSERT INTO `Task`(`task_name`,`project_id`,`description`,`start_date`,`end_date`)
             VALUES("task 1",1,"do something",'2021-10-12','2021-10-14');
INSERT INTO `Task`(`task_name`,`project_id`,`description`,`start_date`,`end_date`)
             VALUES("task 2",1,"do something else",'2021-10-13','2021-11-5');
INSERT INTO `Task`(`task_name`,`project_id`,`description`,`start_date`,`end_date`)
             VALUES("task 3",1,"do something else",'2021-10-20','2021-11-6');
INSERT INTO `Task`(`task_name`,`project_id`,`description`,`start_date`,`end_date`)
             VALUES("task 4",1,"do something else",'2021-10-13','2021-11-12');


INSERT INTO `Task`(`task_name`,`project_id`,`description`,`start_date`,`end_date`)
             VALUES("task 1",2,"do something",'2021-11-12','2022-01-14');
INSERT INTO `Task`(`task_name`,`project_id`,`description`,`start_date`,`end_date`)
             VALUES("task 2",2,"do something else",'2021-12-12','2022-01-16');
INSERT INTO `Task`(`task_name`,`project_id`,`description`,`start_date`,`end_date`)
             VALUES("task 3",2,"do something else",'2021-11-12','2022-02-15');
INSERT INTO `Task`(`task_name`,`project_id`,`description`,`start_date`,`end_date`)
             VALUES("task 4",2,"do something else",'2021-01-12','2022-03-24');
INSERT INTO `Task`(`task_name`,`project_id`,`description`,`start_date`,`end_date`)
             VALUES("task 5 (unassigned)",2,"do something else",'2021-01-12','2022-03-24');


INSERT INTO `assigned`(`eid`,`rid`,`task_id`) VALUES(1,1,1);
INSERT INTO `assigned`(`eid`,`rid`,`task_id`) VALUES(2,2,2);
INSERT INTO `assigned`(`eid`,`rid`,`task_id`) VALUES(3,3,3);
INSERT INTO `assigned`(`eid`,`rid`,`task_id`) VALUES(4,1,4);
INSERT INTO `assigned`(`eid`,`rid`,`task_id`) VALUES(5,1,5);
INSERT INTO `assigned`(`eid`,`rid`,`task_id`) VALUES(6,1,6);
INSERT INTO `assigned`(`eid`,`rid`,`task_id`) VALUES(1,1,7);
INSERT INTO `assigned`(`eid`,`rid`,`task_id`) VALUES(2,2,8);



INSERT INTO `Third_Party`(`company_name`,`address`,`description`,`client`,`partner`)
             VALUES("google","Mountain view, california","create AI map",true,true);
INSERT INTO `Third_Party`(`company_name`,`address`,`description`,`client`,`partner`)
             VALUES("microsoft","Redmond, Washington","create offline ms office",true,false);
INSERT INTO `Third_Party`(`company_name`,`address`,`description`,`client`,`partner`)
             VALUES("facebook","Melno park, california","create market place for instagram",false, true);

INSERT INTO `helps_or_requests`(`tpid`, `pid`, `description` ) VALUES(2,  2, "help for client for external project");
INSERT INTO `helps_or_requests`(`tpid`, `pid`, `description`) VALUES(3,  1, "help for a partner for internal project");
INSERT INTO `helps_or_requests`(`tpid`, `pid`, `description`) VALUES(1, 2, "partner and client for external project");






