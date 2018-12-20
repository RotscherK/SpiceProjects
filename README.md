# SpiceProjects, Web Engeneering Project Autumn Semester 2018
### Table of Content

- [Introduction](#introduction)
  - [Overview](#overview)
  - [Contributors](#contributors)
  - [Requirements](#requirements)
  - [Optional Requirements](#optional-requirements)
- [Conception](#conception)
  - [Wireframes (Mockups)](#wireframes-mockups)
    - [Website Structure](#website-structure)
  - [Access concept](#access-concept)
  - [Database Model](#database-model)
  - [Use Case Diagram](#use-case-diagram)
  - [Deployment Diagram](#deployment-diagram)
- [Implementation](#implementation)
  - [Classes](#classes)
  - [Implementation of the Access concept](#implementation-of-the-access-concept)
  - [Database](#database)
  - [Applied techniques and APIs](#applied-techniques-and-apis)

### Introduction
#### Overview

The goal is to create a web-based software that lists several continuing education programmes of diverse universities and universities of applied sciences. The web-platform act as a portal to these diverse continuing education programmes and you can assume that you act as a specialised/virtual company running this portal. Your business model is to sell every course entry to the universities and universities of applied sciences like a directory. The overall goal is to provide an overview of the programmes including links to the details pages of the related university and university of applied sciences. (Similarly as the company fachhochschulen.net)

#### Contributors

- Nicola Niklaus
  - Advertisement Section, Amazon S3 image upload
- Timothy Applewhite
  - Provider / User Section, Access concept
- Roger Kaufmann
  - Program Section, Design/Layout, PDF creation, Database connection

#### Requirements
Following, the verbal requirements from your virtual customer to the web application are listed:
1. Authentication
   * Login using email as username and a password
   * User can logout
   * If the password is forgotten, it should be possible to get a new one using email.
   * The password must be securely stored
2. Content management
   * User can create, update and delete courses, schools using the provided forms.
3. Administration
   * User can be created, updated and deleted
5. Notification
   * If the start date of a course has been expired, the system should send an email to the course
administrator.
6. Search functionality
   * The website provides a search function so that user can search for courses with specific criteria
6. Charging
   * The customer (university and university of applied sciences) should be charged for every entry, based on a package or subscription by sending an email containing an invoice attached as pdf.
7. Gui
   * Please create and apply an adequate cooperate identity and design.
   * Responsive

#### Optional Requirements

1. Advertisement
   * It may be possible to book advertising on the web page.
2. Authentification
   * Remember me function
3. Google Maps integration
   * Location of school is shown via google maps
4. Export function  
   * Courses can be exported as PDF 

### Conception

#### Wireframes (Mockups)

Before we started the design of the web page, our ideas were captured and visualized in these mockup sketches done with the tool Balsamiq. As the content of the web page of rather serious manner, we decided to keep the design simple and uniform. The home page is shown in the mockup below and contains a list of all available continuing educational programs.

![Wireframe (Mockups)](https://github.com/RotscherK/SpiceProjects/blob/master/Mockup_ProgramList.png "Homepage mockup")

The home page as shown above can be accessed without having to login to the application. If new programs, providers, users or advertisements need to be created, a login is required. The end-user experiences the login in a very standard way and is displayed in the mockup below. In addition, the option stands to mark the remember me check box and stay logged in for the next 30 days. 

![Wireframe (Mockups)](https://github.com/RotscherK/SpiceProjects/blob/master/Mockup_Login.png "Login window mockup")

As new programs, provider, users and advertisements need to be created or existing ones modified constantly, we again here decided to provide a uniform way to do this. Given that the user has sufficient permissions to do so, the creation of new or altering of existing objects will be handled in a window as depicted in the image below. For more information on the access rights of the users, please check the chapter Access Content of this file.

![Wireframe (Mockups)](https://github.com/RotscherK/SpiceProjects/blob/master/Mockup_ProviderEdit.png "Create/Edit provider window mockup")



##### Website Structure
Index (Search the latest programs)
- Program
    - Program List
    - Program View
- Administration
    - Login
        - Password forgotten
    - Program (List)
        - Create
        - Edit
        - Delete
    - Provider (List)
        - Create
        - Edit
        - Delete
    - User (List)
        - Create
        - Edit
        - Delete
    - Advertisement (List)
        - Create
        - Edit
        - Delete
        
#### Access concept

The following access concept has been designed for the three types of administrators on the web page:

- Site Administrator
- Provider Administrator
- Advertisement Administrator

![Access concept](https://github.com/RotscherK/SpiceProjects/blob/master/AccessRightsConcept.png "Access rights concept")  

Depicted in the table above is the access concept for these administrators. The advertisement and provider administrators can only edit the entries where they are listed as the administrator. The site administrator has complete access to all entries and has no restrictions at all.

#### Database Model

A PostgreSQL database was created in order to store all data used in the application. The design of database is displayed in the image below:

![Database Model](https://github.com/RotscherK/SpiceProjects/blob/master/Database_Model.png "Database Model")  

In addition, a short description on the purpose of each table is provided here:

- authoken: administrative table handling the remember me for 30 days functionality and the password reset.
- user: All information on the user is stored including the type of administrator he/she is (site admin / provider / advertisement)
- advertisement: All advertisement details are stored and the id of the responsible user.
- provider: Information on each provider including the responsible user.
- program: All program details are saved in this table including the corresponding category and provider id.
- category: For each a program category an entry is created.

#### Use Case Diagram

Based on the previously defined requirements, the use case diagram was created. The following diagram illustrates the use cases.

![Use Case Diagram](https://github.com/RotscherK/SpiceProjects/blob/master/UCM.jpg "Use Case Diagram")

The majority of the use cases have already been described roughly in the requirements section. In this section, the individual use cases are explained more detailed.

   - **Login Site Administrator:** Login for a currently logged-out user with the role of a overall site administrator. The     login is granted using the email and password as credentials and the site administrator is allowed to all of the use cases afterwards.
   - **Login Provider Administrator:** Login for a currently logged-out user with the role of a provider administrator. The login is granted using the email and password as credentials and the provider administrator has permission to manage his programs and his provider entry.
   - **Login Advertisement Administrator:** Login for a currently logged-out user with the role of a advertisement administrator. The login is granted using the email and password as credentials and the advertisement administrator has permission to manage his advertisements.
   - **Login User Administrator:** Login for a currently logged-out user with the role of a user administrator. The login is granted using the email and password as credentials and the user administrator has permission to manage users.
   - **Logout:** Logged-in users can logout, what terminates the current session.
   - **Reset Password:** If forgotten, users have the possibility to reset their password.
   - **Search Programs:** A non-logged in user has access to the programs and can search them.
   - **Manage Provider:** Logged-in site administrators and provider administrators have access to the provider area.
       - **Create Provider:** Logged-in site administrators can create new providers. These providers appear on the website and can be searched.
       - **Edit Provider:** Logged-in site administrators and provider administrators can edit entries (providers) regarding to their attributes.
       - **Delete Provider:** Logged-in site administrators can fully delete entries (providers) from the database.
   - **Manage Program:** Logged-in site administrators and provider administrators have access to the program area.
       - **Create Program:** Logged-in site administrators can create new programs and set a provider administrator for that program. These programs appear on the website and can be searched.
       - **Edit Program:** Logged-in site administrators and provider administrators can edit entries (programs) regarding to their attributes.
       - **Delete Program:** Logged-in site administrators and provider administrators can fully delete entries (programs) from the database.
   - **Manage Advertisement:** Logged-in site administrators and advertisement administrators have access to the advertisement area.
       - **Create Advertisement:** Logged-in site administrators and advertisement administrators can create new advertisements. These advertisements appear on the website and can be searched. Additionally, they are shown on the side of the page. 
       - **Edit Advertisement:** Logged-in site administrators and advertisement administrators can edit entries (advertisements) regarding to their attributes.
       - **Delete Advertisement:** Logged-in site administrators and advertisement administrators can fully delete entries (advertisements) from the database.
   - **Manage User:** Logged-in site administrators have access to the user area.
       - **Create User:** Logged-in site administrators can create new users and their password. These users appear on the website and can be searched.
       - **Edit User:** Logged-in site administrators can edit entries (users) regarding to their attributes.
       - **Delete User:** Logged-in site administrators can fully delete entries (users) from the database.

#### Deployment Diagram

The simple deployment of the application is shown in the following deployment diagram.

![Deployment Diagram](https://github.com/RotscherK/SpiceProjects/blob/master/Deployment.jpg "Deployment Diagram")

The PostgreSQL database and the code of the application are both stored on a Heroku webserver. In the beginning, it was planned to store the images for the advertisements on the database of the Heroku webserver aswell. However, due to some difficulties with that matter, it was decided to use the S3 storage module of the Amazone Web Services (AWS). The advertisement images are stored in this S3 bucket with the URL stored in the PostgreSQL database on Heroku. 

### Implementation

#### Classes

For the implementation of the web application, the hands-on project provided the lecturer of the course, Andreas Martin was a big help. It can be found in the following GitHub repository: https://github.com/andreasmartin/WE-CRM . The concepts in that project were taken and adjusted/extended/reduced to fulfil the needs of our project. The structure contains several directories which contain files for individual purposes. These are described here:

- amazon: All configuration files required for the upload of images to the Amazon S3 storage
- config: Gets information such as credentials from the secret .ENV file
- controller: Controller files for the connection between logic and view
- dao: Database operations for each specific table
- database: Responsible for the database connection
- domain: Domain objects with getters and setters for all attributes
- files: Temporary stores images just before the upload into the Amazon S3 bucket
- http: HTTPHeader and the different kinds of status messages (e.g. 404)
- router: Requests within the application are routed to the required location
- scheduler: Handles the invoicing and checks programs for expiration date
- service: Service layer for the different domain objects
- validator: Validate the user input before sending it to the database
- view: All views which are displayed to the end-user

#### Implementation of the Access concept

For the implementation of the access concept, after the login the database is checks what kind of an admin the user is and adds the corresponding boolean value to the session. This is displayed in the image below.

![Implementation of the Access concept](https://github.com/RotscherK/SpiceProjects/blob/master/AccessConcept_Session.png "Adding the admin type to the session after the login")

Logically, there are certain sites which should be accessable for all admin types. An example is the page where programs can be edited. Therefore, before the routing takes place, the session values are checked. This code snippet from the file index.php is depicted below.

![Implementation of the Access concept](https://github.com/RotscherK/SpiceProjects/blob/master/AccessConcept_RouterCheck.png "Checking the user admin type before access")

In order to prevent accessing the session directly from different areas, a function was created in the file AuthController.php. As shown below it return the value 1-3 depending on the type of admin the user is.

![Implementation of the Access concept](https://github.com/RotscherK/SpiceProjects/blob/master/AccessConcept_AuthController.png "Returning values 1-3 based on the user admin type")

As already mentioned, with the exception of the site admin, users should only be able to edit their programs / providers / advertisements where they are listed as the administrator. For the others, the edit / delete functionality should not even be displayed to the user. An example screenshot from the implementation is shown below. Now the question arises, if the user is able to edit another program if the ID is known? The answer is no, because an additional check is made by validator.

![Implementation of the Access concept](https://github.com/RotscherK/SpiceProjects/blob/master/AccessConcept_EditDelete.png "Only display the edit / delete functionalities where the user is authorized")

#### Database

The following code was used to create the database according to the model defined in the chapter Database Model: [SQLDDL.sql](https://github.com/RotscherK/SpiceProjects/blob/master/SQLDDL.sql "SQLDDL")

#### Applied techniques and APIs

- HyPDF: The HyPDF API is used to generate PDFs containing program or invoicing information
- SendGrid: For the password reset functionality as well as the invoicing emails are sent. This is done with the SendGrid API
- Amazon AWS S3: The advertisement images are stored in the Amazon S3 storage and only a link is kept in our own database

