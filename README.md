# SIKMA
## Sistem Informasi Keuangan MAhasiswa
A simple finance tracker for students

| NRP | Name |
| --- | --- |
| 5025221074 | Muhammad Reza Octavianto |
| 5025221081 | Ralfazza Rajariandhana |



### To use this project
From the github repo webpage click code then 'Open in GitHub Desktop', let the app open and find the proper location you want to put it. Open the terminal on the project directory.
1. <code>composer update</code>
2. <code>cp .env.example .env</code>
3. create  <code>database.sqlite</code> file in the database directory
4. <code>php artisan key:generate</code> 
5. <code>php artisan migrate:fresh --seed</code> 
6. <code>npm install</code> 
7. <code>npm run dev</code> 

### Features
- history of your purchases with filteration based on categories
- modify an entry's category, value, and date, even to delete an entry
- custom user preset for your most frequent purchases

### Modal
