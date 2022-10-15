import { CSSProperties } from 'react';
import Input from '../../atoms/Input/Input';
import Label from '../../atoms/Text/Label';

type InputProps = {
  label: string;
  value: string;
  style?: CSSProperties;
  setValue: (value: string) => void;
};

const InputGroup = ({ label, value, setValue, style }: InputProps) => {
  return (
    <div style={style}>
      <Label>{label}</Label>
      <Input
        style={{ marginTop: '0.25rem', width: '100%' }}
        type='text'
        value={value}
        onChange={(e) => setValue(e.target.value)}
      />
    </div>
  );
};

export default InputGroup;
