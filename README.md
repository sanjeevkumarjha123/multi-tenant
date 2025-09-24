# Multi-Tenant SaaS (Laravel)

This is a minimal **Multi-Tenant SaaS** built with Laravel.  
Each user can create, manage, and switch between multiple companies under their profile.

---

## 🚀 Features
- User Authentication (Laravel Breeze/Fortify)
- Manage multiple companies per user
- Switch active company
- Scoped data per active company
- MySQL database with clean schema
- Form validation with proper error messages
- SweetAlert success/error notifications


---

## 📂 Database Structure
**users**
- id, name, email, password, active_company_id

**companies**
- id, user_id, name, address, industry, timestamps

---

### Authentication
- `POST /register` – Register new user
    ![Register Page](register.png)
- `POST /login` – Login user
    ![Login Page](login.png)
- `POST /logout` – Logout

### Companies
- `GET /companies` – List user’s companies
    ![User Company Listing](companyList.png)
- `POST /companies` – Create company
    ![Company Create](companyCreate.png)
- `PUT /companies/{id}` – Update company
    ![Company Update](companyUpdate.png)
- `DELETE /companies/{id}` – Delete company
- `POST /companies/{id}/switch` – Switch active company
    ![Company Swiktch](companySwitch.png)
---

## ⚙️ Setup Instructions
1. Clone repo:
   git clone https://github.com/sanjeevkumarjha123/multi-tenant.git <br>
   cd multi-tenant
2. Install Dependencies

   composer install<br>
   npm install
3. Environment Setup

   Copy .env.example to .env

   <b>Update your .env file with correct values:</b>

    APP_NAME="MultiTenant"
    APP_ENV=local<br>
    APP_KEY=<br>
    APP_DEBUG=true<br>
    APP_URL=http://127.0.0.1:8000

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1<br>
    DB_PORT=3306<br>
    DB_DATABASE=your database name<br>
    DB_USERNAME=root<br>
    DB_PASSWORD=

5. Run Database Migrations

    php artisan migrate

6. Clear & Optimize Cache

    php artisan config:clear<br>
    php artisan cache:clear<br>
    php artisan route:clear<br>
    php artisan view:clear<br>
    php artisan optimize

7. Build Frontend Assets

    For development:

    npm run dev


    For production:

    npm run build

8. Serve the Application
    php artisan serve


    Visit: http://127.0.0.1:8000


