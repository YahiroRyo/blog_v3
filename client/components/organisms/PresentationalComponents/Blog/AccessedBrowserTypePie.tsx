/** @jsxImportSource @emotion/react */
import { MouseEvent } from 'react';
import ReactEcharts from 'echarts-for-react';
import { AccessedBrowserType } from '../../../../types/Blog/AccessedBrowserType';
import ReloadButton from '../../../atoms/Button/ReloadButton';
import { css } from '@emotion/react';

type AccessedBrowserTypePieProps = {
  accessedBrowserType: AccessedBrowserType[];
  onReload: (e: MouseEvent<HTMLButtonElement>) => void;
};

const AccessedBrowserTypePie = ({ accessedBrowserType, onReload }: AccessedBrowserTypePieProps) => {
  console.log(accessedBrowserType);

  const option = {
    title: {
      text: '30日前から今日までのアクセスしたユーザーのブラウザの種類',
      left: 'center',
    },
    tooltip: {
      trigger: 'item',
      formatter: '{a} <br/> {b} : {c} ({d}%)',
    },
    legend: {
      orient: 'vertical',
      left: 'left',
    },
    series: [
      {
        name: 'Access From',
        type: 'pie',
        data: accessedBrowserType,
        emphasis: {
          itemStyle: {
            shadowBlur: 10,
            shadowOffsetX: 0,
            shadowColor: 'rgba(0, 0, 0, 0.5)',
          },
        },
      },
    ],
  };

  return (
    <div
      css={css`
        margin: 2rem 0;
      `}
    >
      <ReloadButton onClick={onReload} />
      <ReactEcharts
        style={{ height: '500px' }}
        css={css`
          margin-top: 1rem;
        `}
        option={option}
      />
    </div>
  );
};

export default AccessedBrowserTypePie;
