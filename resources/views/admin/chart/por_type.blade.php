<canvas id="doughnut" width="200" height="200"></canvas>
<script>
$(function () {

    var config = {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [
                    {{ $por_type['居住'] }},
                    {{ $por_type['变更'] }},
                    {{ $por_type['日照'] }},
                    {{ $por_type['空'] }},
                ],
                backgroundColor: [
                    'rgb(54, 162, 235)',
                    'rgb(255, 99, 132)',
                    'rgb(255, 205, 86)',
                    'rgb(139,0,139)',
                ]
            }],
            labels: [
                '居住',
                '变更',
                '日照',
                '无信息',
            ]
        },
        options: {
            maintainAspectRatio: false
        }
    };

    var ctx = document.getElementById('doughnut').getContext('2d');
    new Chart(ctx, config);
});
</script>