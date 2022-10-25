/** @jsxImportSource @emotion/react */
import { css } from '@emotion/react';
import { color } from '../../../styles/color';

type LergeTitleProps = {
  children: React.ReactNode;
};

const LergeTitle = ({ children }: LergeTitleProps) => {
  return (
    <p
      css={css`
        color: ${color.black};
        font-weight: bold;
        font-size: 2rem;
        margin: 0;
      `}
    >
      {children}
    </p>
  );
};

export default LergeTitle;
