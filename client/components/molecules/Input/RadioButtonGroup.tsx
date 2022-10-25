/** @jsxImportSource @emotion/react */
import { css, SerializedStyles } from '@emotion/react';
import RadioButton from '../../atoms/Input/RadioButton';

type Value = {
  label: string;
  value: any;
};

type RadioButtonGroupProps = {
  values: Value[];
  state: any;
  name: string;
  style?: SerializedStyles;
  setState: (state: string) => void;
};

const RadioButtonGroup = ({ values, state, name, style, setState }: RadioButtonGroupProps) => {
  return (
    <div css={style}>
      {values.map((item, index) => (
        <label
          key={index}
          css={css`
            display: flex;
            column-gap: 0.25rem;
          `}
        >
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
