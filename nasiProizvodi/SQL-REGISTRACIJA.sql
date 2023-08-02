CREATE TABLE `apoteka`.`registracija` 
( `id` INT NOT NULL AUTO_INCREMENT ,
 `username` VARCHAR(100) NOT NULL ,
 `lozinka` INT(32) NOT NULL , 
 `email` VARCHAR(40) NOT NULL ,
  PRIMARY KEY (`id`)) ENGINE = InnoDB;
  
CREATE TABLE `apoteka`.`login` 
( `user_id` INT NOT NULL , `username` VARCHAR(200) NOT NULL , 
`lozinka` VARCHAR(15000) NOT NULL ) ENGINE = InnoDB; 

CREATE TABLE products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  link VARCHAR(300) NOT NULL,
  cena INT NOT NULL,
  dostupnost INT NOT NULL
);
-- ALTER TABLE login ADD FOREIGN KEY (username) REFERENCES registracija(username);
