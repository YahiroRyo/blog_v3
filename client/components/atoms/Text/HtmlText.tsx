import { CSSProperties } from 'react';
import { color } from '../../../styles/color';

type HtmlTextProps = {
  html: string;
  style?: CSSProperties;
};

const HtmlText = ({ html, style }: HtmlTextProps) => {
  return (
    <p
      className='markdown-body'
      style={{
        fontSize: '1rem',
        margin: 0,
        color: color.black,
        ...style,
      }}
      dangerouslySetInnerHTML={{ __html: html }}
    ></p>
  );
};

export default HtmlText;
