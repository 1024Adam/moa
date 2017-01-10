# MOA (Meal Organization Application)

This application is designed to be an easy and effective way to
manage recipes, replacing the need for having an old fashioned cookbook.

Furthermore, this application has a "grocery list"-like component to it, 
allowing users to compose weekly grocery lists based on what meals they
plan to make during that week.

## Structure

The application is coded in PHP (5.6.28), using a MySQL database. The
file structure is composed as follows:

| Directory        | Description                                                        |
|------------------|--------------------------------------------------------------------|
| **./classes/**   | PHP Classes                                                        |
| **./db/**        | Database structure sample file                                     |
| **./public/**    | All files that are publicly visible (core HTML, JS, CSS)           |
| **./templates/** | All files that contain major PHP, or are templates for other files |

## Setup

1. Configure MySQL database, with sample database structure file
... Setup username/password and replace accordingly in ./classes/Database.php
2. Clone git repository to location of your choice (a place to point the server to)
3. Navigate to ./public/index.php :)

## Special Features

### Database Class
This application uses a outside Database php class for all interactions with the database.
Details about the creator of this class can be found **[here](https://github.com/jakebesworth)**

### FPDF File Generation
This application makes use of the PDF generation tool known as FPDF (./classes/fpdf181/).
Details about this tool, and how to use it can be found **[here](http://www.fpdf.org/)**
