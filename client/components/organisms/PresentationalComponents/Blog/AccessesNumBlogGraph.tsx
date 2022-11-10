/** @jsxImportSource @emotion/react */
import { css } from '@emotion/react';
import ReactEcharts from 'echarts-for-react';
import { MouseEvent } from 'react';
import ReloadButton from '../../../atoms/Button/ReloadButton';

type AccessesNumBlogGraphProps = {
  dates: string[];
  values: number[];
  onReload: (e: MouseEvent<HTMLButtonElement>) => void;
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

const AccessesNumBlogGraph = ({ dates, values, onReload }: AccessesNumBlogGraphProps) => {
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

  return (
    <>
      <ReloadButton onClick={onReload} />
      <ReactEcharts
        css={css`
          margin-top: 0.5rem;
        `}
        option={option}
      />
    </>
  );
};

export default AccessesNumBlogGraph;
