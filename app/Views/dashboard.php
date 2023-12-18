<h2>Dashboard</h2>
<p>Ini halaman dashboard</p>

<!-- menampilkan tren obat terakhir-->
<div id="dashboard">
    <!-- Overall Information -->
    <div id="overall">
        <h2>Overall Reviews</h2>
        <div id="overallChartDiv" style="height:40vh; width:80vw">
            <canvas id="overallChart"></canvas>
        </div>
        <div id="totalReview"></div>
    </div>

    <!-- The Most Reviewed Product -->
    <div id="mostReviewed">
        <h2>The Most Reviewed Product</h2>
        <div id="mostReviewedInfo" style=" height:40vh; width:80vw">
            <canvas id="mostReviewedChart"></canvas>
            <div id="mostReviewedDetails"></div>
        </div>
    </div>

    <!-- Top 3 Products -->
    <div id="top3Products">
        <h2>Top 3 Products</h2>
        <div id="top3ProductsInfo" style="height:40vh; width:80vw">
            <canvas id="top3ProductsChart"></canvas>
        </div>
    </div>
</div>

<script>
    // Sample data (replace this with actual data)
    const summary = <?php echo json_encode($summary); ?>;

    // Overall Chart
    const overallChartCtx = document.getElementById('overallChart').getContext('2d');
    const overallChart = new Chart(overallChartCtx, {
        type: 'pie',
        data: {
            labels: ['Recommend', 'Do Not Recommend'],
            datasets: [{
                data: [summary.overall.recommend, summary.overall['do not recommend']],
                backgroundColor: ['#36A2EB', '#FF6384'],
            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: true
        },
    });

    // Total Review
    document.getElementById('totalReview').innerText = `Total Reviews: ${summary.overall.total_review}`;

    // Most Reviewed Chart
    const mostReviewedChartCtx = document.getElementById('mostReviewedChart').getContext('2d');
    const mostReviewedChart = new Chart(mostReviewedChartCtx, {
        type: 'doughnut',
        data: {
            labels: ['Recommend', 'Do Not Recommend'],
            datasets: [{
                data: [summary.the_most_reviewed.percentage.number, summary.the_most_reviewed.count - summary.the_most_reviewed.percentage.number],
                backgroundColor: ['#36A2EB', '#FF6384'],
            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: true
        },
    });

    // Most Reviewed Details
    document.getElementById('mostReviewedDetails').innerText = `Most Reviewed Product (ID ${summary.the_most_reviewed.id}): ${summary.the_most_reviewed.percentage.percentage}% Recommends`;

    // Top 3 Products Chart
    const top3ProductsChartCtx = document.getElementById('top3ProductsChart').getContext('2d');
    const top3ProductsChart = new Chart(top3ProductsChartCtx, {
        type: 'bar',
        data: {
            labels: summary.top3_products.map(product => `ID ${product.id}`),
            datasets: [{
                label: 'Percentage Recommends',
                data: summary.top3_products.map(product => product.percentage.percentage),
                backgroundColor: ['#36A2EB', '#36A2EB', '#36A2EB'], // You can customize colors
            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: true
        },
    });
</script>