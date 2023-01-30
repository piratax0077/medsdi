import * as React from 'react';
import Chart from 'react-apexcharts';
type ChartProps = React.ComponentProps<typeof Chart>;
const chartData: ChartProps = {
    type: 'area',
    height: 145,
    options: {
        chart: {
            width: '100%',
            sparkline: {
                enabled: true
            }
        },
        colors: ['#4680ff'],
        fill: {
            type: 'gradient',
            gradient: {
                shadeIntensity: 1,
                opacityFrom: 0.8,
                opacityTo: 0.4,
                stops: [0, 80, 100]
            }
        },
        stroke: {
            curve: 'smooth',
            width: 2
        },
        yaxis: {
            min: 0,
            max: 100
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
                    formatter: function (seriesName: string) {
                        return '$';
                    }
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
            data: [40, 60, 35, 55, 35, 75, 50]
        }
    ]
};
export default chartData;
