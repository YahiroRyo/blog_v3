/** @jsxImportSource @emotion/react */
import { css, SerializedStyles } from '@emotion/react';
import { color } from '../../../styles/color';

type HtmlTextProps = {
  html: string;
  style?: SerializedStyles;
};

const HtmlText = ({ html, style }: HtmlTextProps) => {
  return (
    <p
      className='markdown-body'
      css={css`
        font-size: 1rem;
        margin: 0;
        color: ${color.black};
        ${style}
      `}
      dangerouslySetInnerHTML={{ __html: html }}
    ></p>
  );
};

export default HtmlText;
