import * as React from 'react';
import Chart from 'react-apexcharts';
type ChartProps = React.ComponentProps<typeof Chart>;
const chartData: ChartProps = {
    type: 'area',
    height: 70,
    options: {
        chart: {
            sparkline: {
                enabled: true
            }
        },
        dataLabels: {
            enabled: false
        },
        colors: ['#4680ff'],
        fill: {
            type: 'solid',
            opacity: 0.4
        },
        stroke: {
            curve: 'smooth',
            width: 3
        },
        yaxis: {
            min: 0,
            max: 30
        },
        tooltip: {
            theme: 'dark',
            fixed: {
                enabled: false
            },
            x: {
                show: false
            },
            y: {
                title: {
                    formatter: (seriesName: string) => 'Activity'
                }
            },
            marker: {
                show: false
            }
        }
    },
    series: [
        {
            name: 'series1',
            data: [20, 10, 18, 12, 25, 10, 20]
        }
    ]
};
export default chartData;
