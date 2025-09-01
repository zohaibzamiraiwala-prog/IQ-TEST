<?php
// results.php - Results Page
session_start();
include 'db.php';
 
if (!isset($_SESSION['questions']) || !isset($_POST['answer'])) {
    header('Location: quiz.php');
    exit;
}
 
$questions = $_SESSION['questions'];
$answers = $_POST['answer'];
$correct = 0;
$total = count($questions);
 
foreach ($questions as $q) {
    $id = $q['id'];
    if (isset($answers[$id]) && $answers[$id] === $q['correct_answer']) {
        $correct++;
    }
}
 
// Simple IQ calculation: 80 + (correct / total) * 40 (range ~80-120)
$iq = 80 + ($correct / $total) * 40;
$iq = round($iq);
 
// Feedback based on score
if ($iq >= 110) {
    $feedback = "Excellent! You have strong cognitive abilities. Focus on challenging puzzles to maintain sharpness.";
} elseif ($iq >= 90) {
    $feedback = "Good job! You have average to above-average skills. Practice numerical problems for improvement.";
} else {
    $feedback = "Room for growth! Work on pattern recognition and logical exercises to boost your score.";
}
 
unset($_SESSION['questions']); // Clear session
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IQ Results</title>
    <style>
        /* Internal CSS - Vibrant, motivational design with charts-like elements, animations */
        body { font-family: 'Verdana', sans-serif; margin: 0; padding: 0; background: linear-gradient(135deg, #fff3e0, #ffe0b2); color: #333; }
        .container { max-width: 800px; margin: 0 auto; padding: 40px 20px; text-align: center; }
        h2 { font-size: 2.5em; color: #ef6c00; animation: bounceIn 1s; }
        .score { font-size: 3em; color: #388e3c; margin: 20px 0; }
        p { font-size: 1.2em; line-height: 1.6; }
        .btn { display: inline-block; margin: 10px; padding: 12px 25px; background: #f57f17; color: white; text-decoration: none; border-radius: 5px; transition: background 0.3s; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .btn:hover { background: #ef6c00; }
        @keyframes bounceIn { 0% { transform: scale(0.9); opacity: 0; } 50% { transform: scale(1.05); } 100% { transform: scale(1); opacity: 1; } }
        /* Responsive */
        @media (max-width: 768px) { h2 { font-size: 2em; } .score { font-size: 2.5em; } p { font-size: 1em; } .btn { padding: 10px 20px; font-size: 1em; } }
    </style>
    <script>
        // Internal JS for share functionality
        function shareResults() {
            const text = `My IQ score is <?php echo $iq; ?>! Check out this IQ test.`;
            navigator.clipboard.writeText(text).then(() => alert('Results copied to clipboard!'));
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>Your IQ Test Results</h2>
        <div class="score"><?php echo $iq; ?></div>
        <p>Correct Answers: <?php echo $correct; ?> out of <?php echo $total; ?></p>
        <p><?php echo $feedback; ?></p>
        <button class="btn" onclick="location.href='quiz.php'">Retake Test</button>
        <button class="btn" onclick="shareResults()">Share Results</button>
    </div>
</body>
</html>
