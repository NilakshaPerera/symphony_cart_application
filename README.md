<p align="center">Symfony Assessment</p>

# Symfony Cart Application

This application is built based on a powerful PHP frameowrk, Symfony. 
This solution demonstrates a simple shopping cart developped with the aid of the PHP session.
Actions such as add items to the cart, delete an item from the cart are purely handled with the PHP session.

# Setting up the application into your local machine

1. Have PHP v.7.2 installed in your dev machine. 
2. Clone the source into a folder in your htdocs folder in your XAMPP, MAMPP setup. 
3. Obtain the "symphony.sql" file in the "database" folder in the solution. Create a database called "symphony" and import the "symphony.sql" file.
4. Access the ".env" file and modify the connection string line according to your MySQL server setup.
    - DATABASE_URL=mysql://{ USERNAME }:{ PASSWORD }@127.0.0.1:3306/symphony?serverVersion={ MySQL SERVER VERSION }
    - Following is the formed connection string based on my XAMPP configuration
    - DATABASE_URL=mysql://root:@127.0.0.1:3306/symphony?serverVersion=mariadb-10.4.11
5. This solution uses GULP to compile SCSS and Javascript. Open the command line and change the directory to the root folder of the solution, execute "npm install" command. This will download the required packages and create a folder named "node_modules" in your root directory of your source code.
6. Execute "composer update" to download Symfony related backages into the solution. This command will create a "vendor" folder and will copy all the packages in it. 
7. For the above two instructions, you need to have Node and Composer installed in your computer.
8. Run XAMPP, start Apache and MySQL services. 
9. Open your web browser and navigate into the public folder of the cloned sourcecode followed by http://localhost/ .
10. Open a commandline in the root folder of the solution and run "gulp" command to start up SCSS and Javascript compilation service inthe solution. You are required to do any CSS and javascript changes within the source files you find in the "resources" folder in the root directory.


# Assumptions made during the development of this app

- Users may only enter data in English language
- Session data is not stored in the database untill a user checks out from the shopping cart.
- Checkout data will be stored in the database along with the user data inserted on checkout.
- This does not have user registrations, logins.
- The checkout doesnt require real card details.
- Coupon codes for this applicaiton is hardcoded in the "coupon" table in the database. Initially, bellow coupon codes are available in the database. Feel free to change, add values and see the outcome :)
    - COUPON2
    - 15DISCOUNT