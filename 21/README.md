# College Club Website

A comprehensive website for managing a college club, featuring user authentication, event management, member profiles, and more.

## Features

- User authentication (login/register)
- Event management
- Member profiles
- Photo gallery
- Contact form
- Responsive design

## Requirements

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Web server (Apache/Nginx)

## Installation

1. Clone the repository to your web server directory:
```bash
git clone [repository-url]
```

2. Create a MySQL database and import the database structure:
```bash
mysql -u root -p < database.sql
```

3. Configure the database connection:
   - Open `includes/config.php`
   - Update the database credentials:
     ```php
     define('DB_SERVER', 'localhost');
     define('DB_USERNAME', 'your_username');
     define('DB_PASSWORD', 'your_password');
     define('DB_NAME', 'college_club');
     ```

4. Set up the web server:
   - For Apache, ensure mod_rewrite is enabled
   - Point the document root to the project directory
   - Ensure the web server has write permissions for the `images` directory

5. Access the website through your web browser:
```
http://localhost/college-club
```

## Directory Structure

```
college-club/
├── css/
│   └── style.css
├── js/
│   └── main.js
├── images/
├── includes/
│   └── config.php
├── index.php
├── login.php
├── register.php
├── logout.php
├── events.php
├── members.php
├── gallery.php
├── contact.php
├── database.sql
└── README.md
```

## Security Features

- Password hashing using PHP's password_hash()
- Prepared statements for database queries
- Input validation and sanitization
- Session management
- CSRF protection

## Contributing

1. Fork the repository
2. Create your feature branch
3. Commit your changes
4. Push to the branch
5. Create a new Pull Request

## License

This project is licensed under the MIT License - see the LICENSE file for details.

## Support

For support, please email support@collegeclub.com or create an issue in the repository. 