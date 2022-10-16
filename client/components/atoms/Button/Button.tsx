import { CSSProperties } from 'react';
import { color } from '../../../styles/color';

type ButtonProps = {
  type: 'button' | 'submit' | 'reset' | undefined;
  style?: CSSProperties;
  children: React.ReactNode;
};

const Button = ({ type, children, style }: ButtonProps) => {
  return (
    <button
      style={{
        fontSize: '1rem',
        padding: '1.25rem 3rem',
        borderRadius: '3rem',
        border: 0,
        backgroundColor: color.black,
        color: color.white,
        ...style,
      }}
      type={type}
    >
      {children}
    </button>
  );
};

export default Button;
