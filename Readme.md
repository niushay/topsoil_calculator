A PHP class that calculates the number of bags of topsoil needed to surface a back garden.<br />
 

  - Topsoil bag cost: £72 (inc VAT)<br />
    

  **Bag quantity calculation:**
    

  * `metres squared * 0.025 = X`
  * `X * 1.4 = Y`
  * `Round Y up to the nearest 1 = your number of bags`

   **Example:** 110 * 0.025 = 2.75 * 1.4 = 3.85 = 4 Bags of Top Soil

**How to install the project:**
* `git clone https://github.com/niushay/topsoil_calculator.git`
* Create a new database in your local machine
* Change the database configuration constants in `/services/Database.php`
* To install dependencies: `composer install ` 
* To serve the project: `php -S 127.0.0.1:8000`
