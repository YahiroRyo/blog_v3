/** @jsxImportSource @emotion/react */
import { SerializedStyles } from '@emotion/react';
import { ChangeEvent } from 'react';

type RadioButtonProps = {
  name: string;
  value: string;
  checked?: boolean;
  style?: SerializedStyles;
  onChange: (e: ChangeEvent<HTMLInputElement>) => void;
};

const RadioButton = ({ name, value, style, checked, onChange }: RadioButtonProps) => {
  return <input type='radio' name={name} value={value} css={style} checked={checked} onChange={onChange} />;
};

export default RadioButton;
