/** @jsxImportSource @emotion/react */
import { css } from '@emotion/react';
import { color } from '../../../styles/color';

type LabelProps = {
  children: React.ReactNode;
};

const Label = ({ children }: LabelProps) => {
  return (
    <>
      <label
        css={css`
          color: ${color.black};
          font-size: 1rem;
        `}
      >
        {children}
      </label>
      <br />
    </>
  );
};

export default Label;
