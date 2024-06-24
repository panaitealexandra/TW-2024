<?php
include 'config.php';

if (!isset($_GET['form_id'])) {
    die("Invalid Form ID.");
}

$form_id = $_GET['form_id'];

// Preia datele feedback-ului în funcție de form_id și emotions din tabela feedback_counts
$query = "SELECT emotion, count FROM feedback_counts WHERE form_id = ?";
$stmt = $conn->prepare($query);

if ($stmt === false) {
    die("Error preparing the statement: " . htmlspecialchars($conn->error));
}

$stmt->bind_param('i', $form_id);
$stmt->execute();
$result = $stmt->get_result();

$data = [];
$totalFeedbacks = 0;
while ($row = $result->fetch_assoc()) {
    $data[$row['emotion']] = $row['count'];
    $totalFeedbacks += $row['count'];
}

$stmt->close();
$conn->close();

// Calculăm procentajele
$percentages = [];
foreach ($data as $emotion => $count) {
    $percent = ($count / $totalFeedbacks) * 100;
    $percentages[$emotion] = round($percent, 2); // Rotunjim procentul la două zecimale
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Feedback Statistics</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
       body {
            font-family: Arial, sans-serif;
            background-color:rgb(255, 229, 232);
            margin: 0;
            padding: 0;
        }

        button {
            cursor: pointer;
        }
        button {
            margin-top: 20px;
            margin-bottom: 20px;
            background-color: rgb(211, 188, 233);
            border: none;
            border-radius: 10px;
            height: 6vh;
        }
        button:hover {
            background-color: rgb(186, 157, 210);
            transform: scale(1.05);
        }

        .container {
            width: 60%;
            margin: auto;
            text-align: center;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .chart-container {
            width: 50%;
            margin: auto;
            text-align: center;
            padding: 20px;
        }

        @media screen and (max-width: 1024px) {
    .container {
        width: 50%; /* Ajustează lățimea pentru laptopuri */
    }
    .chart-container {
        width: 50%; /* Ajustează lățimea pentru laptopuri */
    }
}

@media screen and (max-width: 768px) {
    .container {
        width: 40%; /* Ajustează lățimea pentru tablete */
    }
    .chart-container {
        width: 40%; /* Ajustează lățimea pentru tablete */
    }
}

@media screen and (max-width: 480px) {
    .container {
        width: 30%; /* Ajustează lățimea pentru telefoane */
    }
    .chart-container {
        width: 30%; /* Ajustează lățimea pentru telefoane */
    }
}
    </style>
</head>
<body>
    <h1 style="text-align: center;">Feedback Statistics</h1>

    <div class="chart-container">
        <canvas id="feedbackChart" height="auto" width="auto"></canvas>
    </div>

    <div style="text-align: center; margin-top: 20px;">
        <h2>Feedback Breakdown</h2>
        <ul>
            <?php foreach ($percentages as $emotion => $percentage): ?>
                <li><strong><?php echo $emotion; ?>:</strong> <?php echo $percentage; ?>%</li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div style="text-align: center; margin-top: 20px;">
        <button onclick="exportData('html')">Export as HTML</button>
        <button onclick="exportData('csv')">Export as CSV</button>
        <button onclick="exportData('json')">Export as JSON</button>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const data = <?php echo json_encode($percentages); ?>;
            const emotions = Object.keys(data);
            const percentages = Object.values(data);

            const ctx = document.getElementById('feedbackChart').getContext('2d');
            const feedbackChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: emotions,
                    datasets: [{
                        label: 'Feedback Percentages',
                        data: percentages,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(255, 206, 86, 0.5)',
                            'rgba(75, 192, 192, 0.5)',
                            'rgba(153, 102, 255, 0.5)',
                            'rgba(255, 159, 64, 0.5)'
                        ],
                        hoverOffset: 4
                    }]
                },
                options: {
                    plugins: {
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    let label = context.label || '';
                                    if (label) {
                                        label += ': ';
                                    }
                                    label += context.raw.toFixed(2) + '%';
                                    return label;
                                }
                            }
                        },
                        legend: {
                            position: 'bottom',
                        }
                    }
                }
            });
        });

        function exportData(format) {
            const data = <?php echo json_encode($percentages); ?>;
            let content;
            let filename;

            if (format === 'html') {
                content = '<html><body><h1>Feedback Statistics</h1><ul>';
                for (const [emotion, percentage] of Object.entries(data)) {
                    content += `<li><strong>${emotion}:</strong> ${percentage}%</li>`;
                }
                content += '</ul></body></html>';
                filename = 'feedback_statistics.html';
            } else if (format === 'csv') {
                content = 'Emotion,Percentage\n';
                for (const [emotion, percentage] of Object.entries(data)) {
                    content += `${emotion},${percentage}\n`;
                }
                filename = 'feedback_statistics.csv';
            } else if (format === 'json') {
                content = JSON.stringify(data, null, 2);
                filename = 'feedback_statistics.json';
            }

            const blob = new Blob([content], { type: 'text/plain' });
            const link = document.createElement('a');
            link.href = URL.createObjectURL(blob);
            link.download = filename;
            link.click();
        }
    </script>
</body>
</html>
