# Bank Account Opening Form Project Using PHP
1. Islamic Banks (Even ID) 
2. Conventional Banks (ODD ID)

## Course Title
Web and Internet Programming (CSE471.2)

## Faculty Name
A. K. M. Ahsanul Haque, Assistant Professor, Department of Computer Science & Engineering, Southeast University

## Presented by
Name: Raisul Islam, ID: 2023000010059, Batch: 16 (Diploma), Department of Computer Science & Engineering, Southeast University

## Task Overview
This project is a web application designed to facilitate the opening of bank accounts. It includes two types of account creation forms: one for Islamic Banks (which require even Customer IDs) and another for Conventional Banks (which require odd Customer IDs). The application is built using PHP, HTML, CSS, JavaScript, and MySQL.

## Features

### Common Fields for Both Types of Accounts
#### Part 1: Customer Information
1. **Customer ID**: Automatically generated as an even number for Islamic Banks and an odd number for Conventional Banks.
2. **Date**: Field for selecting the date.
3. **Customer Photo**: Upload option for a square-sized photo.
4. **Account Number**: Field for entering the account number.
5. **Branch Name**: Field for entering the branch name.
6. **Full Name**: Field for entering the customer's full name in block letters.
7. **Account Type**: Radio buttons to select between Savings or Current accounts.
8. **Initial Deposit Amount**: Field for entering the initial deposit amount.
9. **Mobile Number**: Field for entering the customer's mobile number.
10. **Email ID**: Field for entering the customer's email address.
11. **Date of Birth**: Field for entering the date of birth.
12. **Father's Name**: Field for entering father's name.
13. **Mother's Name**: Field for entering mother's name.
14. **Nationality**: Field for entering nationality.
15. **Present Address**: Field for entering present address.
16. **Permanent Address**: Field for entering permanent address.
17. **National ID Number**: Field for entering national ID number.
18. **Monthly Income**: Field for entering monthly income.
19. **Interest Percentage**: This field is not displayed on the Islamic Bank account page.

#### Part 2: Nominee Information
1. **Nominee Name**: Field for entering the nominee's name.
2. **Nominee Photo**: Upload option for a square-sized photo of the nominee.
3. **Nominee Address**: Field for entering the nominee's address.
4. **Percentage**: Field to specify the percentage allocated to the nominee.
5. **Relationship with Nominee**: Field to specify the relationship with the nominee.
6. **Nominee Date of Birth**: Field for entering the nominee's date of birth.
7. **Nominee National ID Number**: Field for entering nominee's national ID number.

### Homepage Features
- A clean and attractive homepage with buttons to access both types of account creation forms.
- A search feature that allows users to search by Customer ID and display account holder details.

## Technologies Used
- PHP
- HTML
- CSS
- JavaScript
- MySQL

## Installation and Setup
To set up this project on your local machine or server, follow these steps:
1. Copy the directories to your root directory.
2. Run the SQL query (database_query.sql) in your database to create the database, tables, and columns.
3. Update the database information in (/includes/db_connection.php).
4. Finally, visit your home directory in your browser.

## Screenshot of Bank Account Opening Form
![Index Page](/Screenshots/Index_page.png)

![Account Creation Form Screenshot](/Screenshots/Account_creation_page1.png)

![Account Creation Form Screenshot](/Screenshots/Account_creation_page2.png)

![Customer Search Page](/Screenshots/Customer_search_page_using_ID.png)

![Customer Search Result Page](/Screenshots/Search_result_customer_with_ID.png)
