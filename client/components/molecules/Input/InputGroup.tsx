import { CSSProperties } from 'react';
import Input from '../../atoms/Input/Input';
import Label from '../../atoms/Text/Label';

type InputProps = {
  label: string;
  value: string;
  type: string;
  style?: CSSProperties;
  setValue: (value: string) => void;
};

const InputGroup = ({ label, value, type, setValue, style }: InputProps) => {
  return (
    <div style={style}>
      <Label>{label}</Label>
      <Input
        style={{ marginTop: '0.5rem', width: '100%' }}
        type={type}
        value={value}
        onChange={(e) => setValue(e.target.value)}
      />
    </div>
  );
};

export default InputGroup;
