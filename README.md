# TekTN

TekTN is a free, open‑access e‑learning website. Students can browse and study all uploaded course materials—videos, PDFs, Quizzes with Ai assitance without needing live instructors.

## Features

* **Free Access**: All content is publicly available—no login or payment required.
* **MVC Architecture**: Clear separation of concerns for easier maintenance and scalability.

## Project Structure

```text
TekTN/
├── config/
│   └── database.php       # Database connection and credentials
├── controller/            # Request handlers and business logic
├── model/                 # Data models and database queries
└── view/
    ├── assets/            # Static resources: icons, images, PDFs, demo video
    ├── pages/             # Page templates
    │   ├── courses
    │   ├── login
    │   ├── dashboard
    │   └── ...
    ├── global/            # Shared CSS and JS assets
    │   ├── styles
    │   └── scripts
    └── index.php          #main page
              

```

## Setup & Installation

1. **Clone the repository**

   ```bash
   git clone https://github.com/KlaiAhmed/TekTN.git
   cd TekTN
   ```
2. **Configure the database**

   * Open `config/database.php`.
   * Update host, database name, username, and password.
3. **Serve the application**

   * Place the project folder in your web server’s document root (e.g., `htdocs` for XAMPP).
   * Visit http://localhost/tektn/view/ in your browser.

## Demo

[![Watch the demo](view/assets/thubnail.png)](https://vimeo.com/1081090287?share=copy)



## License

This project is open source under the MIT License.
