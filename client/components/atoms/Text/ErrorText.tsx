/** @jsxImportSource @emotion/react */
import { css } from '@emotion/react';
import { color } from '../../../styles/color';

type ErrorTextProps = {
  children: React.ReactNode;
};

const ErrorText = ({ children }: ErrorTextProps) => {
  return (
    <p
      css={css`
        color: ${color.danger};
        font-size: 1rem;
        font-weight: bold;
      `}
    >
      {children}
    </p>
  );
};

export default ErrorText;
