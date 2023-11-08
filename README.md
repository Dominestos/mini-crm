Mini-CRM
---
> [!info]- Description
Mini CRM is a small application, a crm-system with an administrator panel. There are 2 tables in the admin panel: companies and employees. both are implemented according to CRUD and have one-to-many relationships (companies to employees).

## Implementation details:

1. Authorization and registration:  
	- User authorization, registration, validation processes are implemented using laravel breeze;  
1. Users:  
	- each user has roles,;  
	- only user with admin role can enter admin panel;  
	- the project has a sider responsible for creating a single user with the admin role;  
1. Migrations:  
	- Migrations are created for Companies(companies) and their employees(employees). One-to-many relationship (company - employees). For each migration a different model is defined;  
1. CRUD:  
	- for companies and their employees there are created their own controllers realizing resource routes;  
	- the basic logic of controller methods is realized with the help of services;  
	- the main processes of updating tables are realized with the help of AJAX (record creation, record updating);  
1. Frontend:  
	- implemented using Admin LTE, Bootstrap, jQuery;  
	- display of tables is realized with the help of Datatables;  
1. Validation:  
	- All validation takes place in Request classes where validation rules are defined to handle data;  
	- Error output is also implemented via AJAX;  
1. Extras:  
	- added multilingualism on the site - language change is done using a session  
	- added logic of exporting information to excel using datatables;  
