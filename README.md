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

---

## 📂 Database Structure
**users**
- id, name, email, password, active_company_id

**companies**
- id, user_id, name, address, industry, timestamps

---

### Authentication
- `POST /register` – Register new user
- `POST /login` – Login user
- `POST /logout` – Logout

### Companies
- `GET /companies` – List user’s companies
- `POST /companies` – Create company
- `PUT /companies/{id}` – Update company
- `DELETE /companies/{id}` – Delete company
- `POST /companies/{id}/switch` – Switch active company

---

## ⚙️ Setup Instructions
1. Clone repo:
   git clone https://github.com/sanjeevkumarjha123/multi-tenant.git
   cd multi-tenant
