
# Electronic Notice Board

## Overview

This project is a simple web-based Electronic Notice Board designed to allow users to post and view announcements. The current version is built primarily using HTML, CSS, and JavaScript for the frontend. 

## Project Status

Initially, I attempted to implement PHP for server-side processing, particularly for handling forms and managing user data. However, I plan to transition to using Java with Spring Boot to enhance the security features of the application, particularly for the login and signup functionalities.

## Upcoming Features

- **Login and Signup Security:** I intend to replace the current PHP-based authentication with a more robust solution using Spring Boot. This will provide better security for user credentials and ensure data integrity.

- **Admin Dashboard:** An admin panel will be developed, allowing administrators to manage announcements, view user activity, and monitor the system’s performance. The dashboard will offer various controls and analytics to ensure effective management of the notice board.

## Technologies Used

- **Frontend:** HTML, CSS, JavaScript
- **Backend:** PHP (to be replaced with Java Spring Boot)
- **Database:** MySQL (planned integration with Spring Boot)

## How to Run

1. **Clone the repository:**

   git clone https://github.com/rushinga/electronic-notice-board.git
   

2. **Navigate to the project directory:**
   
   cd electronic-notice-board


3. **Start the PHP server (current implementation):**

   php -S localhost:8000


4. **Access the application:**
   Open a browser and go to `http://localhost:8000`.

## Future Plans

- **Spring Boot Integration:** Implementing Spring Boot for the backend to handle login, signup, and user session management.
- **Role-Based Access Control:** Establishing user roles (admin, user) for more granular access control.
- **Improved User Experience:** Enhancing the UI and UX to make the notice board more interactive and user-friendly.

## Contribution

Feel free to contribute by forking the repository, making changes, and submitting a pull request. Any suggestions for improving the system, especially regarding the integration with Spring Boot, are welcome!

## License

This project is open-source and available under the [MIT License](LICENSE).
