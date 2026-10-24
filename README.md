# Student Manager — Midterm Laboratory Examination

Name: Judy Ann Flores
Subject: Web-Based Programming
School: School of Information Technology Education, Universidad de Dagupan

A Laravel 12 app where logged-in users can add, view, edit, and delete students.
Each student belongs to a course. Users can edit or delete only the students they created.
The student list is also available to outside apps through a token-protected API (Laravel Sanctum).

## Requirements
- PHP 8.2+
- Composer
- MySQL (e.g., XAMPP)
- Node.js 18+ and npm (only needed to rebuild the styles)

## How to run the project
1. Clone the repository and open the folder:
   ```
   git clone https://github.com/JudyAPF/lab-exam-flores.git
   cd lab-exam-flores
   ```
2. Install the PHP packages:
   ```
   composer install
   ```
3. Create the `.env` file and the app key:
   ```
   copy .env.example .env
   php artisan key:generate
   ```
4. Set the database in `.env`:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=lab-exam-flores
   DB_USERNAME=root
   DB_PASSWORD=
   ```
5. Create the tables and sample data (answer "Yes" if asked to create the database):
   ```
   php artisan migrate --seed
   ```
6. Start the server and open http://127.0.0.1:8000
   ```
   php artisan serve
   ```
7. (Optional) Rebuild the CSS. The compiled Tailwind files are already in `public/build`,
   so this is only needed after changing the styles:
   ```
   npm install
   npm run build
   ```
   While editing styles, run `npm run dev` in a second terminal to see changes right away.

## Styling
The pages are styled with Tailwind CSS v4 (through Vite). The color palette is defined in
`resources/css/app.css`, so each color can be used as a Tailwind class (for example `bg-lucky-point`):

| Color       | Hex       | Used for                                  |
|-------------|-----------|-------------------------------------------|
| Lucky Point | `#121561` | Navbar, headings, text, primary buttons   |
| Ship Cove   | `#6b7abc` | Avatars, labels, borders, hover states    |
| Cornflower  | `#92bfe7` | Accents, badges, focus rings              |
| Mystic      | `#edf0f5` | Page background, dividers                 |

Red is used only for validation errors and Delete buttons.

## Test accounts
| Name            | Email            | Password    |
|-----------------|------------------|-------------|
| Judy Ann Flores | jflores@example.com | password123 |
| Hannah Keziah Roa  | hroa@example.com | password123 |

## API
| Method | URL                  | Auth         | Description                            |
|--------|----------------------|--------------|----------------------------------------|
| POST   | `/api/tokens/create` | none         | Send email + password, get a token     |
| GET    | `/api/students`      | Bearer token | Students with their courses (401 without a token) |

Example (PowerShell):
```
curl.exe -X POST http://127.0.0.1:8000/api/tokens/create -d "email=jflores@example.com" -d "password=password123"
curl.exe http://127.0.0.1:8000/api/students -H "Authorization: Bearer YOUR_TOKEN"
```
