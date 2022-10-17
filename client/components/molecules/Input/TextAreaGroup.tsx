import { CSSProperties } from 'react';
import TextArea from '../../atoms/Input/TextArea';
import Label from '../../atoms/Text/Label';

type TextAreaGroupProps = {
  label: string;
  value: string;
  style?: CSSProperties;
  setValue: (value: string) => void;
};

const TextAreaGroup = ({ label, value, setValue, style }: TextAreaGroupProps) => {
  return (
    <div style={style}>
      <Label>{label}</Label>
      <TextArea
        style={{ marginTop: '0.5rem', width: '100%' }}
        value={value}
        onChange={(e) => setValue(e.target.value)}
      />
    </div>
  );
};

export default TextAreaGroup;
