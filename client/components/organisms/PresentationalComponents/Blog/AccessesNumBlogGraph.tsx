import ReactEcharts from 'echarts-for-react';

type AccessesNumBlogGraphProps = {
  dates: string[];
  values: number[];
};

const AccessesNumBlogGraph = ({ dates, values }: AccessesNumBlogGraphProps) => {
  const option = {
    xAxis: {
      type: 'category',
      data: dates,
    },
    yAxis: {
      type: 'value',
    },
    series: [
      {
        data: values,
        type: 'line',
      },
    ],
  };

  return <ReactEcharts option={option} />;
};

export default AccessesNumBlogGraph;
