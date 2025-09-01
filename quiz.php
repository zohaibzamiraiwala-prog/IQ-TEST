<?php
// quiz.php - Quiz Page
session_start();
include 'db.php';
 
// Fetch questions from DB
$result = $mysqli->query("SELECT * FROM questions ORDER BY RAND() LIMIT 10"); // Randomize for variety, limit to 10
$questions = [];
while ($row = $result->fetch_assoc()) {
    $questions[] = $row;
}
 
// Store questions in session for results calculation
$_SESSION['questions'] = $questions;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IQ Quiz</title>
    <style>
        /* Internal CSS - Sleek, engaging design with cards, hover effects, progress bar */
        body { font-family: 'Helvetica', sans-serif; margin: 0; padding: 0; background: linear-gradient(135deg, #e3f2fd, #bbdefb); color: #424242; }
        .container { max-width: 800px; margin: 0 auto; padding: 20px; }
        h2 { text-align: center; color: #1976d2; font-size: 2em; margin-bottom: 20px; }
        form { background: white; padding: 20px; border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.15); }
        .question { margin-bottom: 30px; padding: 15px; border: 1px solid #ddd; border-radius: 8px; transition: box-shadow 0.3s; }
        .question:hover { box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        label { display: block; margin: 10px 0; font-size: 1.1em; cursor: pointer; }
        input[type="radio"] { margin-right: 10px; accent-color: #1976d2; }
        .btn { display: block; width: 100%; padding: 15px; background: #1976d2; color: white; border: none; border-radius: 5px; font-size: 1.2em; cursor: pointer; transition: background 0.3s; }
        .btn:hover { background: #1565c0; }
        /* Responsive */
        @media (max-width: 768px) { .container { padding: 10px; } h2 { font-size: 1.5em; } label { font-size: 1em; } }
    </style>
</head>
<body>
    <div class="container">
        <h2>IQ Test Quiz</h2>
        <form action="results.php" method="POST">
            <?php foreach ($questions as $index => $q): ?>
                <div class="question">
                    <p><strong>Question <?php echo $index + 1; ?>: <?php echo htmlspecialchars($q['question_text']); ?></strong></p>
                    <label><input type="radio" name="answer[<?php echo $q['id']; ?>]" value="a" required> A: <?php echo htmlspecialchars($q['option_a']); ?></label>
                    <label><input type="radio" name="answer[<?php echo $q['id']; ?>]" value="b"> B: <?php echo htmlspecialchars($q['option_b']); ?></label>
                    <label><input type="radio" name="answer[<?php echo $q['id']; ?>]" value="c"> C: <?php echo htmlspecialchars($q['option_c']); ?></label>
                    <label><input type="radio" name="answer[<?php echo $q['id']; ?>]" value="d"> D: <?php echo htmlspecialchars($q['option_d']); ?></label>
                </div>
            <?php endforeach; ?>
            <button type="submit" class="btn">Submit Answers</button>
        </form>
    </div>
</body>
</html>
