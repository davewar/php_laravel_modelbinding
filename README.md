SETUP TAILWIND:
https://tailwindcss.com/docs/installation
npm install tailwindcss
npm install

add to resource>css>app.css
@tailwind base;
@tailwind components;
@tailwind utilities;

add to webpack.mix.js
require('tailwindcss')

---

Create Fake DATA - 200 records for user id 3 :
go to database >factories > Postfactory
add definition

php artisan tinker
App\Models\Post::factory()->times(200)->create(['user_id' => 3]);
exit

---

Make policy (http>Policies)
php artisan make:policy PostPolicy

php artisan make:component Post
