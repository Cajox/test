# Citrus catalog script
Citrus catalog script

Installation instruction:

  - composer install
  - create config/db.php and change DB settings
  - set up domain document root to /public folder
  - import citruscatalog.sql
  
  DATABASE Contains:
  users{ id, firstname, lastname, email, password, role, active, created_at, updated_at }
  items{ id, product_title, image, description, company_id, created_at, updated_at }
  companies{ id, company_name, created_at, updated_at }
  comments{ id, item_id, user_id, text, name, email, active, created_at, updated_at }
  
Developed by Jovan Miljković
"# test" 
