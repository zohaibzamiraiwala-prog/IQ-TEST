<?php
// index.php - Homepage
session_start(); // Start session if needed, though not used here
include 'db.php'; // Include DB connection if needed, but not for homepage
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IQ Test Platform</title>
    <style>
        /* Internal CSS - Professional, modern, amazing design with gradients, shadows, animations */
        body { font-family: 'Arial', sans-serif; margin: 0; padding: 0; background: linear-gradient(135deg, #f0f4f8, #d9e2ec); color: #333; }
        .container { max-width: 1200px; margin: 0 auto; padding: 20px; }
        header { text-align: center; padding: 50px 0; background: #007bff; color: white; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        h1 { font-size: 2.5em; margin: 0; animation: fadeIn 1s ease-in; }
        p { font-size: 1.2em; line-height: 1.6; margin: 20px 0; }
        .btn { display: inline-block; padding: 15px 30px; background: #28a745; color: white; text-decoration: none; border-radius: 5px; font-size: 1.2em; transition: background 0.3s, transform 0.3s; box-shadow: 0 2px 4px rgba(0,0,0,0.2); }
        .btn:hover { background: #218838; transform: scale(1.05); }
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
        /* Responsive design */
        @media (max-width: 768px) { h1 { font-size: 2em; } p { font-size: 1em; } .btn { font-size: 1em; padding: 10px 20px; } }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Welcome to the Online IQ Test Platform</h1>
            <p>IQ testing measures cognitive abilities like logical reasoning, pattern recognition, and problem-solving. It's a fun way to challenge your mind and get insights into your strengths. This test is designed for entertainment and self-assessment purposes.</p>
            <button class="btn" onclick="location.href='quiz.php'">Start Test</button>
        </div>
    </header>
</body>
</html>
