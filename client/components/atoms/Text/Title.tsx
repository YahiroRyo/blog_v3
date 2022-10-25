/** @jsxImportSource @emotion/react */
import { css, SerializedStyles } from '@emotion/react';
import { color } from '../../../styles/color';

type TitleProps = {
  children: React.ReactNode;
  style?: SerializedStyles;
};

const Title = ({ children, style }: TitleProps) => {
  return (
    <h1
      css={css`
        font-size: 1.5rem;
        color: ${color.black};
        line-height: 1.75;
        margin: 0;
        ${style}
      `}
    >
      {children}
    </h1>
  );
};

export default Title;
