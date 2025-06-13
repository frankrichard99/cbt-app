
console.log(test_labels)
document.addEventListener("DOMContentLoaded", function() {
    var ctx = document.getElementById('performanceChart').getContext('2d');
    var performanceChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: test_labels,
            datasets: [{
                label: 'Scores',
                data: test_scores,
                backgroundColor: ['Teal', 'Gold', 'Purple', 'Brown', 'Light Blue'],
                barThickness: 150
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true, // Start the y-axis at 0
                    max: 100 // Set the maximum value of the y-axis to 100
                }
            }
        }
    });
});