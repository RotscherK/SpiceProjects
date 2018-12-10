# SpiceProjects, Web Engeneering Project Autumn Semester 2018

### Introduction
#### Overview

The goal is to create a web-based software that lists several continuing education programmes of diverse universities and universities of applied sciences. The web-platform act as a portal to these diverse continuing education programmes and you can assume that you act as a specialised/virtual company running this portal. Your business model is to sell every course entry to the universities and universities of applied sciences like a directory. The overall goal is to provide an overview of the programmes including links to the details pages of the related university and university of applied sciences. (Similarly as the company fachhochschulen.net)

#### Contributors

- Nicola Niklaus
- Timothy Applewhite
- Roger Kaufmann

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

#### Wireframes
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

![Access concept](https://github.com/RotscherK/SpiceProjects/blob/master/AccessConcept.png "Access rights concept")  

The advertisement and provider administrators can only edit the entries where they are listed as the administrator. The site administrator has complete access to all entries and has no restrictions at all.

#### Database Model

![Database Model](https://github.com/RotscherK/SpiceProjects/blob/master/DatabaseModel.jpg "Database Model")  

#### Use Case Diagram

- Login
- Logout
- PW reset
- Modify Profile
- Search functionality
- Create/Edit/Delete forms for schools, courses and users
- Book advertising
- Optional: Register

#### Deployment Diagram

#### Domain Model

### Implementation

#### Classes

#### Database

#### Applied techniques and APIs
Tesr
