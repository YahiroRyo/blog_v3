import { ChangeEvent, CSSProperties } from 'react';

type InputProps = {
  type: string;
  value: string;
  style?: CSSProperties;
  onChange: (e: ChangeEvent<HTMLInputElement>) => void;
};

const Input = ({ type, value, style, onChange }: InputProps) => {
  return <input style={{ display: 'block', ...style }} type={type} value={value} onChange={onChange} />;
};

export default Input;
