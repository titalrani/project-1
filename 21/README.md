# College Club Website

This is a demo website for a college club, featuring a "Contact Us" form that stores user messages in an SQLite database.

## Project Structure
- `index.html`: The main HTML file for the website.
- `styles.css`: Contains the CSS styles for the website.
- `script.js`: JavaScript file for dynamic functionality.
- `submit_contact.php`: Handles form submissions and stores data in an SQLite database.
- `college_club.db`: SQLite database file.
- `test.php`: A test file to verify PHP server configuration.

## Features
- A "Contact Us" form that allows users to submit their name, email, and message.
- Messages are stored in an SQLite database (`college_club.db`).
- Dynamic event listing using JavaScript.

## Requirements
- PHP 8.2 or higher
- SQLite 3
- A web browser

## How to Run
1. Navigate to the project directory:
   ```bash
   cd 20
   ```
2. Start the PHP built-in server:
   ```bash
   php -S localhost:8000
   ```
3. Open your browser and go to:
   ```
   http://localhost:8000
   ```

## Testing PHP Configuration
To verify that PHP is correctly configured:
1. Open the `test.php` file in your browser:
   ```
   http://localhost:8000/test.php
   ```
2. You should see the PHP info page.

## Troubleshooting
- If the "Contact Us" form does not work, ensure the PHP server is running and the `submit_contact.php` file has the correct permissions.
- If you encounter an HTTP 405 or 501 error, ensure you are using the PHP built-in server or a properly configured web server.

## License
This project is for demonstration purposes only.