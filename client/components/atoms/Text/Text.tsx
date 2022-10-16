import { CSSProperties } from 'react';
import { color } from '../../../styles/color';

type TextProps = {
  children: React.ReactNode;
  style?: CSSProperties;
};

const Text = ({ children, style }: TextProps) => {
  return (
    <p
      style={{
        fontSize: '1rem',
        margin: 0,
        color: color.black,
        ...style,
      }}
    >
      {children}
    </p>
  );
};

export default Text;
