<h2>Dashboard</h2>

<!-- menampilkan tren obat terakhir-->
<div class="center" id="dashboard">
    <!-- Overall Information -->
    <div class="row">
        <div id="overall" style="display:flex; justify-content: center;flex-direction:column; align-items:center;">
            <h3>Overall Reviews</h3>
            <div id="overallChartDiv" style="height:40vh; width:40vw; display:flex; justify-content: center;">
                <canvas id="overallChart"></canvas>
            </div>
            <div id="totalReview"></div>
        </div>

        <!-- The Most Reviewed Product -->
        <div id="mostReviewed" style="display:flex; justify-content: center; flex-direction:column; align-items:center;">
            <h3>The Most Reviewed Product</h3>
            <div id="mostReviewedInfo">
                Most Reviewed Product (ID <span id="mostReviewedId"></span>): <br><strong id="mostReviewedPercentage" class="larger-font"></strong> Recommends
            </div>
        </div>

        <!-- Top 3 Products -->
        <div id="top3Products" style="display:flex; justify-content: center;flex-direction:column; align-items:center;">
            <h3>Top 3 Products</h3>
            <div id="top3ProductsInfo" style="height:40vh; width:40vw; display:flex; justify-content: center;">
                <canvas id="top3ProductsChart"></canvas>
            </div>
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
    // const mostReviewedChartCtx = document.getElementById('mostReviewedChart').getContext('2d');
    // const mostReviewedChart = new Chart(mostReviewedChartCtx, {
    //     type: 'doughnut',
    //     data: {
    //         labels: ['Recommend', 'Do Not Recommend'],
    //         datasets: [{
    //             data: [summary.the_most_reviewed.percentage.number, summary.the_most_reviewed.count - summary.the_most_reviewed.percentage.number],
    //             backgroundColor: ['#36A2EB', '#FF6384'],
    //         }],
    //     },
    //     options: {
    //         responsive: true,
    //         maintainAspectRatio: true
    //     },
    // });

    // Most Reviewed Details
    document.getElementById('mostReviewedPercentage').innerText = `${summary.the_most_reviewed.percentage.percentage.toFixed(2)}%`;
    document.getElementById('mostReviewedId').innerText = `${summary.the_most_reviewed.id}`;
    // document.getElementById('mostReviewedDetails').innerText = `Most Reviewed Product (ID ${summary.the_most_reviewed.id}): ${summary.the_most_reviewed.percentage.percentage.toFixed(2)}% Recommends`;
    // Top 3 Products Chart
    const top3ProductsChartCtx = document.getElementById('top3ProductsChart').getContext('2d');
    const top3ProductsChart = new Chart(top3ProductsChartCtx, {
        type: 'bar',
        data: {
            labels: summary.top3_products.map(product => `ID ${product.id}`),
            datasets: [{
                label: '% Recommends (%)',
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