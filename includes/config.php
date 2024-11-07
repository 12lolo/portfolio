<?php
return [
    'smtp_host' => 'smtp.hostinger.com',
    'smtp_user' => 'info@sennevisser.me', // Your Hostinger email address
    'smtp_pass' => getenv('SMTP_PASS'), // Use the environment variable
    'smtp_port' => 465, // Hostinger uses port 465 for SSL
    'from_email' => 'info@sennevisser.me', // Your Hostinger email address
    'from_name' => 'Senne_Visser', // Your name or website name
    'to_email' => 'sennevisser@outlook.com' // Where you want to receive the emails
];