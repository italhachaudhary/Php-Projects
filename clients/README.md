<h1>PHP and MySQL with CRUD Operations: Create, Read, Update, Delete</h1>
First of All Create a Database named <strong>curd</strong>
<br><br>
1-<img src="db.png">

Paste the following Command in SQL section. It will Create a database table. 

CREATE TABLE clients (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR (100) NOT NULL,
    email VARCHAR (200) NOT NULL UNIQUE,
    phone VARCHAR(20) NULL,
    address VARCHAR(200) NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);
<br><br>
2-<img src="sql.png">
<br><br>
<h1>Sample Output<h1>
Client Adding Page
<br>
1-<img src="create.png">
<br><br>
Clients Details Page
<br>
2-<img src="Index.png">
<br><br>
Update Clients Details Page
<br>
3-<img src="update.png">

