1) 

	1.1) git clone https://github.com/AmineLbaoussy/nextMedia.git
    
	1.2) 
	   1.2.1) create database name
	   1.2.2) config .env 
	1.3) composer install
	
    1.4) php artisan migrate
    1.5) php artisan db:seed

    1.6)  php artisan serve
	 
	open url  http://127.0.0.1:8000/
	
	
	
2)Cli
 //category//
 2.1) create  a category from the command line
      -   php artisan create:category
	  
 3.2) delete a category from the command line
      -   php artisan delete:category
	  
 2.3) create a product from the command line
      -   php artisan create:product
	  
 3.4) delete a product from the command line
      -   php artisan delete:product