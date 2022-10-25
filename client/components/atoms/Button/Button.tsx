/** @jsxImportSource @emotion/react */
import { css, SerializedStyles } from '@emotion/react';
import { MouseEvent } from 'react';
import { color } from '../../../styles/color';

type ButtonProps = {
  type: 'button' | 'submit' | 'reset' | undefined;
  children: React.ReactNode;
  style?: SerializedStyles;
  onClick?: (e: MouseEvent<HTMLButtonElement>) => void;
};

const Button = ({ type, children, style, onClick }: ButtonProps) => {
  return (
    <button
      css={css`
        font-size: 1rem;
        padding: 1.25rem 3rem;
        border-radius: 3rem;
        border: 0;
        background-color: ${color.black};
        color: ${color.white};
        &:hover {
          cursor: pointer;
        }
        ${style}
      `}
      onClick={onClick}
      type={type}
    >
      {children}
    </button>
  );
};

export default Button;
