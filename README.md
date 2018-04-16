# LEDC

### Description 
The site is built for London Economic Development Corporation (LEDC). LEDC is committed to attracting talent and matching the right people to the right jobs. The purpose of this campaign is to help bring awareness to young professionals and technology companies about why London is a destination city. The website is using php/Mysql as backend framework, enabling customized Content Management System. The CMS let users have fully control of the website content, making the website content be dynamic. For frontend, the site is using `gulp-sass` to compile css from scss, making it easier to edit and do version control of the website. 

### Feature

+ Customized Content Management System
    - User management
    	1. Create User
    	2. Edit User
    	3. Delete User
    - Content management
    	1. Career 
    	2. Lifestyle
    	3. Company info
    - Statistic
    	1. Google chart
    - Email to new user
    	Notice: If the email feature is not working, please check the URL of anchor tag is changed based on current project name (localhost:8888/project_name_folder/admin/login.php) in file: /admin/cms_user_functions.php at line 19.

### Test Environment

- `git clone git@github.com:jaoueis/fwyllie_ledc.git` to **htdocs** directory under MAMP/WAMP/XAMPP. 
- Open Terminal/GitBash.
- Go to **fwyllie_ledc** directory in Terminal/GitBash.
- Run `npm install` in Terminal/GitBash.
- After the dev dependencies are installed, open MAMP/WAMP/XAMPP and start the server and phpmyadmin.
- Go to myPHPadmin panel first to import the database file stored in **db** folder.


### Test Instruction
- Fire up the project in MAMP/WAMP/XAMP. 
- You can browse on the front page or go CMS by entering URL `http://localhost:8888/fwyllie_ledc/admin/login.php`
- The initial admin username is `admin` and password is `admin`.
- Then make sure everything is working. 