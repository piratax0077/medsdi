import * as React from 'react';
import Chart from 'react-apexcharts';
type ChartProps = React.ComponentProps<typeof Chart>;
const chartData: ChartProps = {
    type: 'area',
    height: 100,
    options: {
        chart: {
            sparkline: {
                enabled: true
            }
        },
        colors: ['#4680ff'],
        stroke: {
            curve: 'smooth',
            width: 2
        },
        tooltip: {
            fixed: {
                enabled: false
            },
            x: {
                show: false
            },
            y: {
                title: {
                    formatter: (seriesName: string) => ''
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
            data: [0, 20, 10, 45, 30, 55, 20, 30, 0]
        }
    ]
};
export default chartData;
