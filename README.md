# HTML Docs Manager (Laravel + Filament)

## Goal of the App
This application is built to **store and manage HTML-based documentation** generated from interactions with online LLMs (Large Language Models).  
When solving complex tasks with LLMs, conversations often involve **trial and error**. Once a task is completed, repeating the same steps later can be tedious and violate the "Don't Repeat Yourself (DRY)" principle.

With this app, you can:
- Ask your LLM to generate a **concise HTML document** of the final, working steps (excluding failed attempts).
- Upload that HTML file to this application for future reference.
- Edit and manage your documents easily.

---

## Description
- **Backend**: Laravel + Filament (Admin panel)  
- **Main Resources**:
  1. `Problem` – Stores the HTML documentation.
  2. `Tag` – Categorizes problems.
  3. `Comment` – Currently disabled (can be enabled later).
- **Authorization**:  
  - Admin users can manage all resources, roles, and permissions.  
  - Members (default role) can only view `Problem` and `Tag`.  

### Seeder Details
After cloning the repository:
```bash
php artisan migrate:fresh --seed
```
This will seed the following:
1. Permissions  
2. Roles  
3. Users  
4. Problems  
5. Tags  
6. Comments  

An **admin user** will be created:  
- **Email**: `admin@admin.com`  
- **Password**: `12341234`  

### Themes
The [Hasnayeen Themes package](https://github.com/Hasnayeen/themes) is installed.  
- Accessible only to **Admin** users.

---

## How It Works
1. Work with your LLM to complete a personal task (e.g., *installing Zsh in Ubuntu with autocomplete*).
2. Once complete, ask your LLM to generate **downloadable HTML documentation** using this prompt:

   ```
   make docs for complete working step by step concise in HTML format, make file downloadable, for code snippet if present add clipboard svg to copy the code block, text color white, and background for code snippet should be black
   ```

   - Adjust the prompt as needed (for extra links or formatting).
   - Download the generated HTML file.

3. Log in to the app (as Member or Admin).  
4. Go to **Problems** → **Create New Problem**.  
5. Upload the HTML file using the **HTML file upload** option.  
6. Edit the HTML directly in the built-in text editor if needed (add links, tweak styles, etc.).  
7. Save the problem.  
8. Navigate to **Dashboard** or **My Data** to view your uploaded problems.  
9. Click on a problem to view its **HTML document** rendered on the frontend.

---

## Suggestions for Customization
- **Seeder Optimization**:  
  - You can skip seeding example `Problem`, `Tag`, `User`, or `Comment` data if not needed.
- **Enable Comments**:  
  - Currently, frontend comments are not implemented.  
  - You can enable commenting by assigning **Comment** permissions to the `Member` role and building the frontend UI.
- **Theme Customization**:  
  - Modify or extend the Hasnayeen Theme package for additional styling.

---

## Installation
```bash
git clone <your-repository-url>
cd <your-project-folder>
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate:fresh --seed
php artisan serve
```
- Visit `http://localhost:8000`  
- Login with the **admin** credentials above.

---

## Default Roles
| Role     | Permissions                                           |
|----------|-------------------------------------------------------|
| Admin    | Full access (Users, Roles, Permissions, Problems, Tags) |
| Member   | Can only view `Problem` and `Tag`                     |

---

## License
This project is licensed under the MIT License.
