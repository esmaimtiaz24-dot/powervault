# POWERVAULT Full-Stack Website (XAMPP)

## Included
- PHP + MySQL storefront with animated responsive design
- 6 initial editable products; all prices start unset
- Cart and checkout with COD, Easypaisa and JazzCash
- 3% discount for Easypaisa/JazzCash
- WhatsApp prefilled order handoff
- PHP mail() email attempt (local XAMPP generally needs SMTP setup)
- Separate admin login/dashboard
- Product CRUD, inventory adjustment, orders, TCS tracking fields, expenses and profit/loss view
- JSON product API and XML catalog export
- Customer registration/login and order history

## Install on Windows/XAMPP
1. Copy the `POWERVAULT_Website` folder to `C:\\xampp\\htdocs\\powervault` (rename the folder to `powervault`).
2. Start Apache and MySQL from XAMPP Control Panel.
3. Open `http://localhost/powervault/setup.php`. The setup creates `powervault_db`, tables, six starter products and an admin account.
4. Storefront: `http://localhost/powervault/`
5. Admin: `http://localhost/powervault/admin/login.php`
6. Admin email: `admin@powervault.pk`
7. Initial development password: `Admin@12345`
8. Delete `setup.php` after setup and change the admin password before production use.
9. If setup fails, open phpMyAdmin, import `database.sql`, then retry.

## Database configuration
Edit `config.php` if your MySQL username/password/database differs. Defaults are XAMPP's common local defaults (`root`, blank password). Do not use these defaults on a live server.

## Hero image
`assets/images/powervault-hero.svg` is a locally bundled vector placeholder so the site works immediately. Replace it with your supplied product image at `assets/images/powervault-hero.jpg`, then change the `<img src>` in `index.php` to that file. The original uploaded photo was not available as a mounted file when this ZIP was assembled, so it is not embedded in this archive.

## Payments and notifications
- Easypaisa: 03273822228
- JazzCash: 03074364067
- WhatsApp: 03273822228
- Support: Supportpowervault@gmail.com
- Courier: TCS (manual tracking fields; no live TCS API booking)
- Online payment selection applies a 3% discount; payment is not automatically verified.
- WhatsApp opens a prefilled message and the user must press Send.
- PHP `mail()` attempts notification delivery. Configure SMTP/PHPMailer for reliable email delivery.

## Important limitations
This is a runnable starter application, not a certified production payment platform. Before public deployment, implement a proper password-change page, SMTP configuration, rate limiting, backups, server hardening, and verify all integrations. Financial figures are only as complete as the cost and expense data entered by the administrator.
