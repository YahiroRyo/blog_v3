import ReactEcharts from 'echarts-for-react';

type AccessesNumBlogGraphProps = {
  dates: string[];
  values: number[];
};

type TooltipFormatter = {
  componentType: 'series';
  seriesType: string;
  seriesIndex: number;
  seriesName: string;
  name: string;
  dataIndex: number;
  data: Object;
  value: any[];
  encode: Object;
  dimensionNames: Array<String>;
  dimensionIndex: number;
  color: string;
  percent: number;
};

const AccessesNumBlogGraph = ({ dates, values }: AccessesNumBlogGraphProps) => {
  const option = {
    title: {
      text: '30日前から今日までの閲覧数履歴',
    },
    tooltip: {
      trigger: 'axis',
      formatter: (params: TooltipFormatter[]) => {
        const param = params[0];
        const date = new Date(param.name);
        return date.getFullYear() + '/' + (date.getMonth() + 1) + '/' + date.getDate() + '<br/>' + param.value;
      },
    },
    legend: {
      data: ['閲覧数'],
    },
    grid: {
      left: '3%',
      right: '4%',
      bottom: '4%',
      containLabel: true,
    },
    xAxis: {
      type: 'category',
      boundaryGap: false,
      data: dates,
    },
    yAxis: {
      type: 'value',
    },
    series: [
      {
        name: '閲覧数',
        statck: 'Total',
        data: values,
        type: 'line',
      },
    ],
  };

  return <ReactEcharts option={option} />;
};

export default AccessesNumBlogGraph;
