# FootScore

A simple PHP web app for viewing football fixtures and buying match tickets.

## Features
- Browse football fixtures (with team logos)
- View tickets and store items
- Checkout page with form
- Responsive UI using HTML/CSS

## Tech Stack
- PHP
- MySQL
- HTML / CSS

## Clone the repository
  ```bash
  git clone https://github.com/lawadeolokunE/FootScore-Project.git
  cd FootScoreProject

  brew services start mysql@8.4
  mysql -u root -p
  ```
Passwoord is 'root'
  
  ```bash
  CREATE DATABASE FootScore;
  EXIT;

  mysql -u root -p FootScore < FootScore.sql
  ```
To See Database working:
  ```bash
  USE FootScore;
  SHOW TABLES;
  SELECT * FROM Fixtures LIMIT 5;
  ```

Start PHP Server:
  ```bash
  php -S localhost:3000
  ```

Then open http://localhost:3000/
