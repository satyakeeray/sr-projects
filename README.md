# SR Projects – WordPress Custom Plugin (Machine Test)

This plugin was built as part of a machine test interview.  
It adds a custom post type called **Projects**, custom fields ( by ACF plugin ), and provides frontend + AJAX + REST API functionality to fetch and display active projects.

---

## 🚀 Features

- Registers a **Custom Post Type: Projects**
- Adds custom fields ( Implement By ACF plugin ):
  - Client Name (text)
  - Project Status (Active / Completed)
  - Budget (number)
- Frontend display using **shortcode**
- AJAX button to load **Active Projects**
- REST API endpoint enabled for Projects
- Secure AJAX requests using **nonce verification**
- Proper use of **WordPress hooks (actions & filters)**
- Basic sanitization & validation

---

## 📁 Plugin Structure

```text
sr-projects/
├── assets/
│ └── js/
│ └── sr-projects.js
├── includes/
│ ├── ajax.php
│ ├── custom-post-type.php
│ ├── load-assets.php
│ ├── rest-api.php
│ └── shortcodes.php
├── index.php
├── sr-projects.php
└── README.md
```

---

## ⚙️ Installation

1. Upload the ZIP file to:
wp-content/plugins/

2. Extract the folder
3. Go to **WordPress Admin → Plugins**
4. Activate **SR Projects**

---

## 🧩 Custom Post Type

- Post Type: `projects`
- REST Enabled:
/wp-json/sr-projects/v1/projects


---

## 🏷️ Custom Fields

- Client Name  
- Project Status (Active / Completed)  
- Budget  

---

## 🧾 Shortcode Usage

Use this shortcode on any page:

[sr_projects]


This will render:
- A button: **Load Active Projects**
- A container to display results

---

## 🔁 AJAX (Load Active Projects)

- Button triggers AJAX request
- Filters projects where:
project_status = Active

- Secure nonce verification
- Returns JSON response
- Data is rendered dynamically using JavaScript

---

## 🌐 REST API

Projects are available in REST API:

/wp-json/wp/v2/projects


Explore all routes:

/wp-json


---

## 🔐 Security

- Nonce verification in AJAX
- Direct file access blocked using:
  ```php
  if ( ! defined('ABSPATH') ) exit;
Input sanitized before processing

🛠️ Tech Stack
WordPress Plugin API
Custom Post Type
AJAX (wp_ajax, wp_ajax_nopriv)
REST API
jQuery

PHP

🧪 Machine Test Coverage

Environment Setup	✅ Done
Custom Plugin + CPT	✅ Done
Custom Fields	✅ Done
Hooks (actions/filters)	✅ Done
AJAX Load Active Projects	✅ Done
REST API Enabled	✅ Done
Security (Nonce + Sanitization)	✅ Done