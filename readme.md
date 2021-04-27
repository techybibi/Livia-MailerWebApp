
Livia - Mailer Open Source App
===================================
Livia is an  open source bulk mailing web application developed using PHP Codeigniter. Livia support AWS SES SMTP and all other kinds of SMTP services. To avoid spaming report, users can set the delay between the mails.

*********************
Installation Steps
*********************
1. Create a Database and a user in you hosting panel.
2. Go to application->config->database.php
		Enter your Database Name, Username & Password
		
		'hostname' => 'localhost',
		'username' => 'root',
		'password' => '',
		'database' => 'liviaci_db',
		'dbdriver' => 'mysqli',
		
3. Now Go to 	application->config->config.php
		Search for *$config['base_url']*
		Enter your domain name. (If the files are in directory enter the directory path also)
		
		$config['base_url'] = 'domainname.com';
		----------------------------
		$config['base_url'] = 'domainname.com/directory';
		
4. Go to PHPMYADMIN
		Rename the file *liviaci_db.sql* to *you_db_name.sql*
		Finally import it.


Note
---------
This is a just a beta release. You can try it and report the issues. Also requesting you to have feedbacks and reviews for future upgrades.
