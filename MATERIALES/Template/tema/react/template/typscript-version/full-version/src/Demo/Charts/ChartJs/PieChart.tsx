import * as React from 'react';
import { ChartData, Pie } from 'react-chartjs-2';
import * as chartjs from 'chart.js';
const PieChart = () => {
    const data: ChartData<chartjs.ChartData> = (canvas) => {
        let bar = (canvas as HTMLCanvasElement).getContext('2d');
        if (!bar) return {};
        let theme_g1 = bar.createLinearGradient(100, 0, 300, 0);
        theme_g1.addColorStop(0, '#11c15b');
        theme_g1.addColorStop(1, '#11c15b');
        let theme_g2 = bar.createLinearGradient(100, 0, 300, 0);
        theme_g2.addColorStop(0, '#0e9e4a');
        theme_g2.addColorStop(1, '#0e9e4a');
        return {
            labels: ['Data 1', 'Data 2', 'Data 3'],
            datasets: [
                {
                    data: [30, 30, 40],
                    backgroundColor: [theme_g1, theme_g2, '#4680ff'],
                    hoverBackgroundColor: [theme_g1, theme_g2, '#4680ff']
                }
            ]
        };
    };
    return (
        <Pie
            data={data}
            height={300}
            options={{
                maintainAspectRatio: false
            }}
        />
    );
};
export default PieChart;
