
-- What tasks in which project are assigned to each employee and the role? 
--+
-- finding the username of employees who have a task along with the project they work in, also includes those who are not assigned a task (LEFT JOIN)
SELECT project_name, task_name, username, role_name FROM User
INNER JOIN Employee
      ON User.uid = Employee.uid
INNER JOIN assigned
      ON assigned.eid = Employee.eid
INNER JOIN Role
      ON assigned.rid = Role.rid
INNER JOIN Task
      ON Task.task_id = assigned.task_id
INNER JOIN Project
      ON Project.pid = Task.project_id;

SELECT username, project_name, task_name, role_name FROM User
LEFT JOIN Employee
      ON User.uid = Employee.uid
LEFT JOIN assigned
      ON assigned.eid = Employee.eid
LEFT JOIN Role
      ON assigned.rid = Role.rid
LEFT JOIN Task
      ON Task.task_id = assigned.task_id
LEFT JOIN Project
      ON Project.pid = Task.project_id;

-- finding the tasks that have not been assigned yet (LEFT JOIN)
SELECT task_name FROM Task
LEFT JOIN assigned
     ON Task.task_id = assigned.task_id
WHERE assigned.task_id IS NULL;

-- how many tasks in each project?
SELECT project_name, COUNT(*) AS number_of_tasks
FROM Project
INNER JOIN Task
      ON Project.pid = Task.project_id
GROUP BY Project.pid; 

-- how many tasks are assigned to each employee
SELECT username, COUNT(assigned.task_id) AS number_of_tasks
FROM User
LEFT JOIN Employee
      ON User.uid = Employee.uid
LEFT JOIN assigned
      ON assigned.eid = Employee.eid
GROUP BY User.uid;



-- Table with each team member's username and his role in the team
SELECT username, team_name,role_name FROM User
INNER JOIN Employee
      ON User.uid = Employee.uid
INNER JOIN Team_Member
      ON Team_Member.eid = Employee.eid
INNER JOIN Role
      ON Role.rid = Team_Member.rid
INNER JOIN Team
      ON Team.tid = Team_Member.tid;


-- Table with User's username and his team and his role, also shows employees not in a team and not in a role
SELECT username, role_name, team_name FROM User
LEFT JOIN Employee
      ON User.uid = Employee.uid
LEFT JOIN Team_Member
      ON Team_Member.eid = Employee.eid
LEFT JOIN Role
      ON Role.rid = Team_Member.rid
LEFT JOIN Team
      ON Team.tid = Team_Member.tid;

-- How many members in each role
SELECT role_name, COUNT(*) AS number_of_members  FROM Team_Member
INNER JOIN Role
      ON Role.rid = Team_Member.rid
GROUP BY Role.rid;

SELECT role_name, COUNT(*) AS number_of_members  FROM Team_Member
INNER JOIN Role
      ON Role.rid = Team_Member.rid
GROUP BY Role.rid
HAVING Role.rid=1;

-- How many members in each team
SELECT team_name, COUNT(*) AS number_of_members 
FROM Team_Member
INNER JOIN Team
      ON Team_Member.tid = Team.tid
GROUP BY team_name;

-- how many employees in a specific team
SELECT team_name, COUNT(*) AS number_of_members 
FROM Team_Member
INNER JOIN Team
      ON Team_Member.tid = Team.tid
GROUP BY Team.tid
HAVING Team.tid = 1;

-- Each project and who manages it
SELECT project_name, username FROM Project
INNER JOIN  Manager
      ON Manager.pid = Project.pid
INNER JOIN User 
      ON User.uid = Manager.uid;


-- Which third parties participate in each project
SELECT company_name, project_name, client, partner 
FROM Third_Party
INNER JOIN helps_or_requests
      ON Third_Party.tpid = helps_or_requests.tpid
INNER JOIN Project
      ON Project.pid = helps_or_requests.pid;


-- How many thirdparties in each project
SELECT project_name, 
        COUNT(client IS TRUE) AS number_of_clients,
        COUNT(partner IS TRUE) AS number_of_partners
FROM Third_Party
INNER JOIN helps_or_requests
      ON Third_Party.tpid = helps_or_requests.tpid
INNER JOIN Project
      ON Project.pid = helps_or_requests.pid
GROUP BY Project.pid;


-- The duration of each project
SELECT project_name, DATEDIFF(end_date, start_date) AS project_duration_in_days FROM Project;


-- The duration of each task
SELECT project_name,task_name, DATEDIFF(Task.end_date, Task.start_date) AS task_duration_in_days FROM Task
INNER JOIN Project 
      ON Project.pid = Task.project_id;


-- The sum of the tasks' duration in each project
SELECT project_name,SUM(DATEDIFF(Task.end_date, Task.start_date)) AS duration_of_tasks_in_project FROM Task
INNER JOIN Project 
      ON Project.pid = Task.project_id
GROUP BY Project.pid;

