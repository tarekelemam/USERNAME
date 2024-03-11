# Electronic Log sheet
#### Video Demo:  https://youtu.be/JToJTx9RbN0
#### Description:

I have created a PHP file that uses JavaScript to retrieve a list of RFID numbers, dates, times, and entrance/exit information from a MySQL database. The system is designed to track who enters and exits a library by reading RFID tags.

When a user taps their RFID tag, the PHP file adds their information to the database, including their RFID number, the date and time of their entry or exit, and whether it is an entrance or exit. If the user has already entered the library that day, the system marks their most recent entry as an exit.

To provide more information about users, the system retrieves their names, last names, pictures, and expiration dates from the main SQL database that contains a list of all users. This information is linked to the RFID number, making it easier to identify individuals based on their RFID tag.

Overall, this system allows the library to track and monitor user activity, and provides a more efficient and secure way to manage entry and exit.