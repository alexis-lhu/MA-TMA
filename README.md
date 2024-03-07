# Site Upload File

This repository contains a simple website for uploading files, developed by Melvin Malagowski and Bastien Passet. Users can upload files through a form, and the uploaded files are stored in the 'uploaded' directory.

## Getting Started

To use this application, follow these steps:

1. Clone the repository to your local machine:

    ```bash
    git clone https://github.com/your-username/repository-name.git
    ```

2. Open the index.html file in a web browser to access the file upload interface.

## Usage

1. Click on the "Afficher le formulaire" button to display the file upload form.

2. Fill in the required information, including Name, Surname, and choose a file to upload.

3. Click the "Upload" button to submit the form.

## File Upload Process

The PHP script (upload.php) handles the file upload process. Here's a brief overview:

- The uploaded files are stored in the 'uploaded' directory.

- The script verifies the file's extension and MIME type for security purposes.

- If the file meets the allowed criteria, it is renamed to include the user's name and surname.

- The file is then moved to the 'uploaded' directory.

- Upon successful upload, users are redirected to 'redirect.html'.

## Directory Structure

- **style**: Contains the CSS file for styling the website.

- **image**: Includes an example image used on the website.

- **php**: Contains the PHP script responsible for handling file uploads.

- **uploaded**: This directory will store the uploaded files.

## Important Notes

- Ensure that the 'uploaded' directory has the necessary write permissions for the web server.

- Only files with extensions 'pdf', 'jpg', 'jpeg', 'png', and 'gif' are allowed for upload.

- The PHP script performs security checks to prevent unauthorized file uploads.

Feel free to explore, use this project! If you encounter any issues or have suggestions, please create an issue or pull request.

Happy uploading! 🚀
