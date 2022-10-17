import { CSSProperties } from 'react';
import RadioButton from '../../atoms/Input/RadioButton';

type Value = {
  label: string;
  value: any;
};

type RadioButtonGroupProps = {
  values: Value[];
  state: any;
  name: string;
  style?: CSSProperties;
  setState: (state: string) => void;
};

const RadioButtonGroup = ({ values, state, name, style, setState }: RadioButtonGroupProps) => {
  return (
    <div style={style}>
      {values.map((item, index) => (
        <label key={index} style={{ display: 'flex', columnGap: '.25rem' }}>
          <RadioButton
            name={name}
            value={item.value}
            checked={item.value === state}
            onChange={(e) => {
              setState(e.target.value);
            }}
          />
          {item.label}
        </label>
      ))}
    </div>
  );
};

export default RadioButtonGroup;
