import { ChangeEvent, CSSProperties } from 'react';

type RadioButtonProps = {
  name: string;
  value: string;
  checked?: boolean;
  style?: CSSProperties;
  onChange: (e: ChangeEvent<HTMLInputElement>) => void;
};

const RadioButton = ({ name, value, style, checked, onChange }: RadioButtonProps) => {
  return <input type='radio' name={name} value={value} style={style} checked={checked} onChange={onChange} />;
};

export default RadioButton;
