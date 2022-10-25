/** @jsxImportSource @emotion/react */
import { css, SerializedStyles } from '@emotion/react';
import { ChangeEvent } from 'react';

type InputProps = {
  type: string;
  value: string;
  style?: SerializedStyles;
  onChange: (e: ChangeEvent<HTMLInputElement>) => void;
};

const Input = ({ type, value, style, onChange }: InputProps) => {
  return (
    <input
      css={css`
        padding: 0.25rem 0.5rem;
        ${style}
      `}
      type={type}
      value={value}
      onChange={onChange}
    />
  );
};

export default Input;
