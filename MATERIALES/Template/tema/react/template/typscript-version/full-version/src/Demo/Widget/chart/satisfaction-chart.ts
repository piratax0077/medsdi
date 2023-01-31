import * as React from 'react';
import Chart from 'react-apexcharts';
type ChartProps = React.ComponentProps<typeof Chart>;
const chartData: ChartProps = {
    height: 260,
    type: 'pie',
    options: {
        labels: ['extremely Satisfied', 'Satisfied', 'Poor', 'Very Poor'],
        legend: {
            show: true,
            offsetY: 50
        },
        dataLabels: {
            enabled: true,
            dropShadow: {
                enabled: false
            }
        },
        theme: {
            monochrome: {
                enabled: true,
                color: '#4680ff'
            }
        },
        responsive: [
            {
                breakpoint: 768,
                options: {
                    chart: {
                        height: 320
                    },
                    legend: {
                        position: 'bottom',
                        offsetY: 0
                    }
                }
            }
        ]
    },
    series: [66, 50, 40, 30]
};
export default chartData;
