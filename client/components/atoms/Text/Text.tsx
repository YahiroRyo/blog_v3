/** @jsxImportSource @emotion/react */

import { css, SerializedStyles } from '@emotion/react';
import { color } from '../../../styles/color';

type TextProps = {
  children?: React.ReactNode;
  style?: SerializedStyles;
};

const Text = ({ children, style }: TextProps) => {
  return (
    <p
      css={css`
        font-size: 1rem;
        margin: 0;
        color: ${color.black};
        ${style}
      `}
    >
      {children}
    </p>
  );
};

export default Text;
