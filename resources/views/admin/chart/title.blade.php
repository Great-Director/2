<canvas id="doughnut" width="200" height="200"></canvas>
<script>
$(function () {

    var config = {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [
                    {{ $title['高级工程师'] }},
                    {{ $title['工程师'] }},
                    {{ $title['助理工程师'] }},
                    {{ $title['会计师'] }},
                    {{ $title['会计从业资格证'] }},
                    {{ $title['人力资源师三级'] }},
                    {{ $title['无'] }},
                ],
                backgroundColor: [
                    'rgb(54, 162, 235)',
                    'rgb(255, 99, 132)',
                    'rgb(255, 205, 86)',
                    'rgb(139,0,139)',
                    'rgb(0,0,255)',
                    'rgb(0,255,255)',
                    'rgb(112,128,144)',
                ]
            }],
            labels: [
                '高级工程师',
                '工程师',
                '助理工程师',
                '会计师',
                '会计从业资格证',
                '人力资源师三级',
                '无'
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