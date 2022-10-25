/** @jsxImportSource @emotion/react */
import { css, SerializedStyles } from '@emotion/react';
import { ChangeEvent } from 'react';

type TextAreaProps = {
  value: string;
  style?: SerializedStyles;
  onChange: (e: ChangeEvent<HTMLTextAreaElement>) => void;
};

const TextArea = ({ value, style, onChange }: TextAreaProps) => {
  return (
    <textarea
      css={css`
        display: block;
        min-height: 15rem;
        padding: 1rem;
        line-height: 1.5;
        ${style}
      `}
      value={value}
      onChange={onChange}
    ></textarea>
  );
};

export default TextArea;
